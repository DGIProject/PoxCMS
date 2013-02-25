<?php
include "function.php";
echo $_SESSION['pseudo'];
if ($_SESSION['pseudo'] != NULL)
{
    echo '<script type="text/javascript">window.location="admin.php"</script>';
}
if (isset($_POST['ident_utilisateur']) AND isset($_POST['pass_utilisateur']))
{
    $result =  ident($_POST['ident_utilisateur'], $_POST['pass_utilisateur']);
}
else
{

}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>page d'administration - Connection</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/unicorn.login.css" />
    </head>
    <body>
    <div id="logo">
        <img src="img/logo.png" alt="" />
    </div>
        <div id="loginbox">
            <form id="loginform" class="form-vertical" method="POST" action="">
                <p>Entrez vos identifiants et mots de passe pour continuer</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" name="ident_utilisateur" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="pass_utilisateur" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <?php if ($result != null)
                { ?>
                <div class="alert alert-error">
                    <?php
                    echo $result;
                    ?>
                </div><?php }?>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
                </div>

            </form>
            <form id="recoverform" action="#" class="form-vertical">
                <p>Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link" id="to-login">&lt; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Recover" /></span>
                </div>
            </form>

        </div>

            <script src="js/jquery.min.js"></script>
            <script src="js/unicorn.login.js"></script>


</body>
</html>
