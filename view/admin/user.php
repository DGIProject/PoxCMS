<!DOCTYPE html>
<html>
<head>
    <title>PoxCMS - Admin</title>
    <base href="http://loquii.alwaysdata.net/other/PoxCMS/">

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="view/admin/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="view/admin/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="view/admin/css/uniform.css"/>
    <link rel="stylesheet" href="view/admin/css/select2.css"/>
    <link rel="stylesheet" href="view/admin/css/unicorn.main.css"/>
    <link rel="stylesheet" href="view/admin/css/unicorn.grey.css" class="skin-color"/>
    <link rel="stylesheet" href="view/admin/css/jquery.gritter.css">
</head>
<body>
<div id="header">
    <h1><a href="admin/admin">PoxCMS Admin</a></h1>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <li class="btn btn-inverse"><a href="admin/profile"><i class="icon icon-user"></i> <span class="text">Profil</span></a></li>
        <li class="btn btn-inverse"><a href="admin/message"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important"><?php echo $numberMessages; ?></span></a></li>
        <li class="btn btn-inverse"><a href="admin/logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>
<div id="sidebar">
    <a href="admin/admin" class="visible-phone"><i class="icon icon-home"></i> Acceuil</a>
    <ul>
        <li><a href="admin/admin"><i class="icon icon-home"></i> Acceuil</a></li>
        <?php
        foreach($listSites as $site)
        {
            echo '<li><a href="admin/site/edit/' . $site['id'] . '">' . $site['name'] . '</a></li>
                  <li><a href="admin/' . $site['id'] . '/menu"><i class="icon icon-edit"></i> Menu</a></li>
                  <li class="submenu">
                    <a href="#"><i class="icon icon-file"></i> Page</a>
                    <ul>
                        <li><a href="admin/' . $site['id'] . '/page/new"><i class="icon icon-plus"></i> Ajouter un page</a></li>
                        <li><a href="admin/' . $site['id'] . '/page"><i class="icon icon-eye-open"></i> Voir toutes les pages</a></li>
                    </ul>
                  </li>
                  <li><a href="admin/' . $site['id'] . '/template/list"><i class="icon icon-th-list"></i> Style</a></li>
                  <li><a href="admin/' . $site['id'] . '/user"><i class="icon icon-user"></i> Utilisateurs</a></li>';
        }?>
    </ul>
</div>
<div id="content">
    <div id="content-header">
        <h1>Dashboard</h1>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Dashboard</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php
                if($_GET['a'] == 'showEditUser')
                {
                    $infoUser = getInfoUser($_GET['userId']);

                    echo '<div class="widget-box">
                            <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                                <h5>Editer un utilisateur</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form method="post" action="admin/' . $siteId . '/user/saveedit/' . $_GET['userId'] . '" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Pseudo</label>
                                        <div class="controls">
                                            <input type="text" name="username" disabled="" value="' . $infoUser['username'] . '">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Mail</label>
                                        <div class="controls">
                                            <input type="text" name="email" value="' . $infoUser['email'] . '">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Password</label>
                                        <div class="controls">
                                            <input type="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                </form>
                            </div>
                          </div>';
                }
                else
                {?>
                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Utilisateurs</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Pseudo</th>
                                    <th>Email</th>
                                    <th>Catégorie</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($listUsers as $user)
                                {
                                    echo '<tr><td>' . $user['username'] . '</td><td>' . $user['email'] . '</td><td>' . $user['category'] . '</td><td><a href="admin/' . $siteId . '/user/edit/' . $user['id'] . '" class="btn btn-info"><i class="icon icon-edit"></i></a> <a href="admin/' . $siteId . '/user/delete/' . $user['id'] . '" class="btn btn-danger"><i class="icon icon-remove"></i></a></tr>';
                                }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    if($resultAddUser != NULL)
                    {
                        echo $resultAddUser;
                    }?>
                    <div class="widget-box">
                        <div class="widget-title">
                        <span class="icon">
                            <i class="icon-align-justify"></i>
                        </span>
                            <h5>Ajouter un utilisateur</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form method="post" action="admin/<?php echo $siteId; ?>/user/add" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Pseudo</label>
                                    <div class="controls">
                                        <input type="text" name="username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mail</label>
                                    <div class="controls">
                                        <input type="text" name="email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mot de passe</label>
                                    <div class="controls">
                                        <input type="password" name="password1">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Confirmation du mot de passe</label>
                                    <div class="controls">
                                        <input type="password" name="password2">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php
                }?>
            </div>
        </div>
    </div>
</div>

<script src="view/admin/js/jquery.min.js"></script>
<script src="view/admin/js/jquery.ui.custom.js"></script>
<script src="view/admin/js/bootstrap.min.js"></script>
<script src="view/admin/js/jquery.uniform.js"></script>
<script src="view/admin/js/select2.min.js"></script>
<script src="view/admin/js/jquery.dataTables.min.js"></script>
<script src="view/admin/js/unicorn.js"></script>
<script src="view/admin/js/unicorn.tables.js"></script>
<script src="view/admin/js/jquery.gritter.min.js"></script>
<script src="view/admin/js/ajax.js"></script>
</body>
</html>