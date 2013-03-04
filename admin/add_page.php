<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 15/09/12
 * Time: 15:23
 * To change this template use File | Settings | File Templates.
 */
session_start();
include "function.php";
if ($_SESSION['pseudo'] != NULL) {
    ?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <title>Ajouter une page - PoxAdmin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/uniform.css"/>
    <link rel="stylesheet" href="../css/select2.css"/>
    <link rel="stylesheet" href="../css/unicorn.main.css"/>
    <link rel="stylesheet" href="../css/jquery.gritter.css"/>
    <link rel="stylesheet" href="../css/unicorn.grey.css" class="skin-color"/>
    <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
    <?php include "interface.php"; ?>
<div id="content">
    <div id="content-header">
        <h1>Dashboard</h1>
        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Pages" href="pages.php"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Dashboard</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                Pour ajouter une page vous devez entrer le titre de la page et ecrire son contenu dans l'editeur de
                texte enrichi.<br/>

                <form class="form-horizontal" method="post"
                      onsubmit="confirmAdding(this.content.value, this.titre.value); return false;">
                    <div class="control-group">
                        <label class="control-label">Titre de la page</label>

                        <div class="controls">
                            <input type="text" name="titre" id="titre">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Contenu de la page</label>

                        <div class="controls">
                            <textarea name="content" class="ckeditor" id="content1">
                                taper votre texte ici et utilisez les outil qui sont a votre dispositions !
                            </textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="créer la page" name="send" id="sendbutton" class="btn btn-primary">
                    </div>
                    <div id="message"></div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.gritter.min.js"></script>
<script src="../js/jquery.peity.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/unicorn.js"></script>
<script src="../js/unicorn.interface.js"></script>
</html>
<?php
} else {
    echo '<script type="text/javascript">window.location="index.php"</script>';
}
