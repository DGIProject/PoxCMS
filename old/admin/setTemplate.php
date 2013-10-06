<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 14/04/13
 * Time: 08:20
 * To change this template use File | Settings | File Templates.
 */
include "function.php";
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/uniform.css"/>
    <link rel="stylesheet" href="../css/select2.css"/>
    <link rel="stylesheet" href="../css/unicorn.main.css"/>
    <link rel="stylesheet" href="../css/jquery.gritter.css"/>
    <link rel="stylesheet" href="../css/unicorn.grey.css" class="skin-color"/>
    <title>Editer une page</title>
    <script type="text/javascript">
        $('select').select2();
        function create_champ(i) {

            var i2 = i + 1;

            if (i<=10)
            {
                document.getElementById('lines1').innerHTML += '<br>Element ' + i2 + ' :<input type="text" name="element_' + i2 + '">';
                document.getElementById('controlLine').innerHTML = '<span id="controlLine"><input type="button" class="btn btn-warning" value="Nouvelle line" name="ajout" onclick="create_champ(' + i2 + ')"><input type="hidden" name="numbers" value="' + i2 + '"></span>';
                if (i==10)
                {
                    document.getElementById('controlLine').innerHTML = '';
                }
            }
            else
            {
                document.getElementById('controlLine').innerHTML = '';
            }

        }
    </script>
</head>
<body>
<?php include "interface.php"; ?>
<div id="content">
    <div id="content-header">
        <h1>Dashboard</h1>

        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Pages" href="pages.php"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files" href="filemanagment.php"><i
                    class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Creer un menu</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php
                if (testMenu())
                {
                    if (changeTemplate($_GET['id']))
                    {
                        echo '<script type="text/javascript">window.location="index.php"</script>';
                        }
                }
                else
                {?>
                <form class="form-horizontal" method="post" action="save_menu.php?id=<?php echo $_GET['id']?>" name="addmenu" id="newmenu">
                    <div class="control-group">
                        <label class="control-label">Nom Attribué au menu (non visible)</label>
                        <div class="controls">
                            <input type="text" name="title_post" id="name" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Position </label>
                        <div class="controls">
                            <select name="posit" id="positi" style="width: 100px;;">
                                <option>Haut</option>
                                <option>Droite</option>
                                <option>Gauche</option>
                                <option>Bas</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Elements de menu</label>
                        <div class="controls" id="lines1">
                            <span id="line"> Element 1 :<input type="text" name="element_1" value=""/></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <span id="controlLine"><input type="button" class="btn btn-warning" value="Nouvel element" name="ajout" onclick="create_champ(1)"></span><input type="submit" value="Validate" class="btn btn-primary">
                    </div>
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
<script src="../js/jquery.gritter.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/unicorn.js"></script>
<script src="../js/unicorn.form_common.js"></script>
</body>
</html>