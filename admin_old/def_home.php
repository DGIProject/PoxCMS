<?php

include "function.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pox panel Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/unicorn.main.css"/>
    <link rel="stylesheet" href="../css/unicorn.grey.css" class="skin-color"/>
    <link rel="stylesheet" href="../css/select2.css"/>
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
        <a href="#" class="current">Dashboard</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                Sur cette page vous avez la possibilité de definir quelle sera la page d'accueille de votre site
                internet.
                si dessous ce trouve la liste des page deja créer. il vous suffit de choisir dans la liste la page que
                vous voulez, celle ci s'affichera sur le coté et vous
                pourrez la previsualiser.


                <form action="" method="post" onsubmit="defHomePage(document.getElementById('Selected').value); return false;">
                    <select name="pages_selected" id="Selected">
                        <?php
                        $reponse = get_liste_page();
                        foreach ($reponse as $pagess) {
                            echo '<option>' . $pagess['titre'] . '</option>';
                        }

                        ?>
                    </select>
                    <input type="submit" value="définir la page d'accueil" class="btn btn-primary">
                </form>
                <?php
                if ($_GET['a'] == "def") {
                    def_home_page($_POST['pages_selected']);
                }?>
            </div>
        </div>
    </div>
</div>


<script src="../js/excanvas.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/unicorn.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/ajax.js"></script>
<script>
    $('select').select2();
</script>
</body>
</html>