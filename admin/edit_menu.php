<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 22/12/12
 * Time: 10:54
 * To change this template use File | Settings | File Templates.
 */

include "function.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Lise - PoxAdmin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/uniform.css"/>
    <link rel="stylesheet" href="../css/select2.css"/>
    <link rel="stylesheet" href="../css/unicorn.main.css"/>
    <link rel="stylesheet" href="../css/unicorn.grey.css" class="skin-color"/>
    <link rel="stylesheet" href="../css/jquery.gritter.css">
</head>
<body>
<?php include "interface.php"; ?>

<div id="content">
    <div id="content-header">
        <h1>User List</h1>

        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Pages" href="pages.php"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files" href="filemanagment.php"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">User List</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                cette page vous permet d'editer vos menu :<br> pour que tous fonctionne bien vous devez choisir le menu que vous voulez
                editer avec le titre/decription que vous avez
                entrer lors de sa creation.<br>
                <form name="edit_menu" action="" method="post">
                    <select name="select"><?php

                        $bdd = bdd_conect();
                        $req = $bdd->prepare("SELECT * FROM menu");
                        $req->execute();
                        $rep = $req->fetchAll();
                        foreach ($rep as $done) {
                            if ($done['title'] != NULL) {

                                echo "<option>" . $done['title'] . "</option>";
                            }

                        }
                        ?>
                    </select><br><br>
                    <input type="submit" value="Suivant" name="choosemenu" class="btn"><br>
                    <br>
                </form>
                <?php
                if (isset($_POST['select'])) {

                    $req = $bdd->prepare("SELECT * FROM menu WHERE title=:ti");
                    $req->execute(array(
                        'ti' => $_POST['select']
                    ));
                    $rep = $req->fetch();
                    $id = $rep['id'];
                    $req = $bdd->prepare("SELECT * FROM menu WHERE parrent=:id_current");
                    $req->execute(array(
                        'id_current' => $id
                    ));
                    $rep = $req->fetchAll();

                    ?>
                    <form method="post" action="save_edited_menu.php">
                        <table class="table">
                            <tr>
                                <td><b>Elements</b></td>
                                <?php
                                $i2 = 0;
                                foreach ($rep as $done) {
                                    echo '<td>' . $done['input'] . '</td><input type="hidden" name="input' . $i2 . '" value="' . $done['input'] . '">';
                                    $i2++;
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>pages</b></td>
                                <?php
                                $listepages = get_liste_page();
                                $i = 0;
                                foreach ($rep as $done) {
                                    echo '<td><select name="pageforelement' . $i . '">';
                                    foreach ($listepages as $value) {

                                        echo '<option>' . $value['titre'] . '</option>';

                                    }
                                    echo '</select></td>';
                                    $i++;
                                }

                                ?>
                            </tr>
                        </table>
                        <input type="hidden" name="numberofelemt" value="<?php echo $i; ?>"/>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" name="save" value="entegistrer les page" class="btn btn-primary"/>
                    </form>

                <?php } ?>
            </div>
        </div>
    </div>

</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/unicorn.js"></script>
<script src="../js/unicorn.tables.js"></script>
<script src="../js/jquery.gritter.min.js"></script>
<script src="../js/ajax.js"></script>

</body>
</html>