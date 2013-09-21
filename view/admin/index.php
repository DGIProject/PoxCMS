<!DOCTYPE html>
<html>
<head>
    <title>PoxCMS - Login</title>
    <base href="http://loquii.alwaysdata.net/other/PoxCMS/">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="view/admin/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="view/admin/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="view/admin/css/unicorn.login.css"/>
</head>
<body>
<div id="logo">
    <img src="view/admin/img/logo.png" alt="">
</div>
<div id="loginbox">
    <form id="loginform" class="form-vertical" method="POST" action="admin/login">
        <p>Entrez vos identifiants</p>
        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" name="username" placeholder="Username" value="<?php echo $_POST['username']; ?>"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input type="password" name="password" placeholder="Password"/>
                </div>
            </div>
        </div>
        <?php
        if($resultLogin != NULL)
        {
            echo $resultLogin;
        }?>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link" id="to-recover">Lost password?</a></span>
            <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login"/></span>
        </div>

    </form>
    <form id="recoverform" action="#" class="form-vertical">
        <p>Enter your e-mail address below and we will send you instructions how to recover a password.</p>

        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                    <input type="text" placeholder="E-mail address"/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link" id="to-login">&lt; Back to login</a></span>
            <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Recover"/></span>
        </div>
    </form>

</div>

<script src="view/admin/js/jquery.min.js"></script>
<script src="view/admin/js/unicorn.login.js"></script>
</body>
</html>