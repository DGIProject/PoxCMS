<!DOCTYPE html>
<html lang="en">
<head>
    <title>PoxCMS - Admin</title>
    <base href="http://clangue.net/other/PoxCMS/">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="view/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="view/admin/css/font-awesome.css" />
    <link rel="stylesheet" href="view/admin/css/unicorn-login.css" />
</head>
<body>
<div id="container">
    <div id="logo">
        <img src="view/admin/img/logo.png" alt=""/>
    </div>
    <div id="user">
        <div class="avatar">
            <div class="inner"></div>
            <img src="view/admin/img/demo/av1_1.jpg" />
        </div>
        <div class="text">
            <h4>Hello,<span class="user_name"></span></h4>
        </div>
    </div>
    <div id="loginbox">
        <form id="loginform" method="post" action="owner/login">
            <p>Entrez vots identifiants pour accèder au panel d'administration</p>
            <?php
            if($resultLogin != NULL)
            {
                echo $resultLogin;
            }?>
            <div class="input-group input-sm">
                <span class="input-group-addon"><i class="icon-user"></i></span><input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?php echo $_POST['username']; ?>">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-actions clearfix">
                <div class="pull-right">
                    <a href="#recoverform" class="flip-link to-recover grey">Mot de passe perdu ?</a>
                </div>
                <input type="submit" class="btn btn-block btn-primary btn-default" value="Connection">
            </div>
        </form>
        <form id="recoverform" action="#">
            <p>Entrez votre adresse mail pour récupérer votre mot de passe.</p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="text" name="email" placeholder="Adresse mail">
            </div>
            <div class="form-actions clearfix">
                <div class="pull-left">
                    <a href="#loginform" class="grey flip-link to-login">Cliquez pour vous connecter</a>
                </div>
                <input type="submit" class="btn btn-block btn-inverse" value="Récupérer mes identifiants">
            </div>
        </form>
    </div>
</div>
</body>
</html>