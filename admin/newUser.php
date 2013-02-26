<?php

include 'function.php';
?>
<!DOCTYPE html>
<?php
if ($_GET['add'] == 1) {
    add_user($_POST['username'], $_POST['password1'], $_POST['email']);
}
?>

<html>
<head>
    <title>ajout utilisateur</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/uniform.css"/>
    <link rel="stylesheet" href="css/select2.css"/>
    <link rel="stylesheet" href="css/unicorn.main.css"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color"/>
</head>
<body>
<?php include "interface.php"; ?>
<div id="content">
    <div id="content-header">
        <h1>Nouvel utilisateur</h1>

        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Pages" href="pages.php"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Nouvel Utilisateur</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <form class="form-horizontal" method="post" action="?add=1" name="Newuser" id="NewUser_validate">
                    <div class="control-group">
                        <label class="control-label">Nom d'utilisateur</label>

                        <div class="controls">
                            <input type="text" name="username" id="username">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>

                        <div class="controls">
                            <input type="text" name="email" id="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mot de passe</label>

                        <div class="controls">
                            <input type="password" name="password1" id="password">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Confirmation</label>

                        <div class="controls">
                            <input type="password" name="password2" id="password2">
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Validate" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/jquery.gritter.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/unicorn.js"></script>
<script src="js/unicorn.form_validation.js"></script>
<script src="js/unicorn.interface.js"></script>
<?php  if ($_GET['add'] == 1) {
    ?>
<script type="text/javascript">
    $.gritter.add({
        title:'nouvel utilisateur',
        text:'Nouvel utilisateur a été ajouté avec succé',
        image:'img/valide.png',
        sticky:false
    });
</script>
    <?php }?>

</body>
</html>