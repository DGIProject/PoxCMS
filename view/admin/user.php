<!DOCTYPE html>
<html lang="en">
<head>
    <title>PoxCMS - Admin</title>
    <base href="http://clangue.net/other/PoxCMS/">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="view/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="view/admin/css/font-awesome.css" />
    <link rel="stylesheet" href="view/admin/css/fullcalendar.css" />
    <link rel="stylesheet" href="view/admin/css/jquery.jscrollpane.css" />
    <link rel="stylesheet" href="view/admin/css/select2.css" />
    <link rel="stylesheet" href="view/admin/css/jquery-ui.css" />
    <link rel="stylesheet" href="view/admin/css/unicorn.css" />
    <link rel="stylesheet" href="view/admin/css/unicorn.grey.css" class="skin-color" />
</head>
<body>
<div id="header">
    <h1><a href="owner">PoxCMS Admin</a></h1>
    <a id="menu-trigger" href="#"><i class="icon-align-justify"></i></a>
</div>

<div id="user-nav">
    <ul class="btn-group">
        <li class="btn"><a href="owner/profile"><i class="icon icon-user"></i> <span class="text">Profil</span></a></li>
        <li class="btn"><a href="owner/message"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important"><?php echo $numberMessages; ?></span></a></li>
        <li class="btn"><a href="owner/logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>

<div id="sidebar">
    <ul>
        <li><a href="owner"><i class="icon icon-home"></i> Acceuil</a></li>
        <?php
        foreach($listSites as $site)
        {
            echo '<li><a href="owner/site/edit/' . $site['id'] . '">' . $site['name'] . '</a></li>
                  <li><a href="owner/' . $site['id'] . '/menu"><i class="icon icon-edit"></i> Menu</a></li>
                  <li class="submenu">
                    <a href="#"><i class="icon icon-file"></i> Page <i class="arrow icon-chevron-right"></i></a>
                    <ul>
                        <li><a href="owner/' . $site['id'] . '/page/new"><i class="icon icon-plus"></i> Ajouter une page</a></li>
                        <li><a href="owner/' . $site['id'] . '/page"><i class="icon icon-eye-open"></i> Voir toutes les pages</a></li>
                    </ul>
                  </li>
                  <li><a href="owner/' . $site['id'] . '/template/list"><i class="icon icon-th-list"></i> Styles</a></li>
                  <li class="active"><a href="owner/' . $site['id'] . '/user"><i class="icon icon-user"></i> Utilisateurs</a></li>';
        }?>
    </ul>
</div>

<div id="content">
    <div id="content-header">
        <h1>Utilisateurs</h1>
    </div>
    <div id="breadcrumb">
        <a href="owner" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
        <a href="owner/<?php echo $siteId; ?>/user" class="current">Utilisateurs</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
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
                                <form method="post" action="owner/' . $siteId . '/user/saveedit/' . $_GET['userId'] . '" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="control-label">Pseudo</label>
                                        <div class="controls">
                                            <input type="text" name="usernameEdit" disabled="" value="' . $infoUser['username'] . '" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Mail</label>
                                        <div class="controls">
                                            <input type="text" name="emailEdit" value="' . $infoUser['email'] . '" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <div class="controls">
                                            <input type="password" name="passwordEdit" class="form-control input-sm">
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
                                    echo '<tr><td>' . $user['username'] . '</td><td>' . $user['email'] . '</td><td>' . $user['category'] . '</td><td><a href="owner/' . $siteId . '/user/edit/' . $user['id'] . '" class="btn btn-info"><i class="icon icon-edit"></i></a> <a href="owner/' . $siteId . '/user/delete/' . $user['id'] . '" class="btn btn-danger"><i class="icon icon-remove"></i></a></tr>';
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
                            <form method="post" action="owner/<?php echo $siteId; ?>/user/add" class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label">Pseudo</label>
                                    <div class="controls">
                                        <input type="text" name="username" class="form-control input-sm" value="<?php echo $_POST['username']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Mail</label>
                                    <div class="controls">
                                        <input type="text" name="email" class="form-control input-sm" value="<?php echo $_POST['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Catégorie</label>
                                    <div class="controls">
                                        <select name="category">
                                            <option>User</option>
                                            <option>Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Mot de passe</label>
                                    <div class="controls">
                                        <input type="password" name="password1" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Confirmation du mot de passe</label>
                                    <div class="controls">
                                        <input type="password" name="password2" class="form-control input-sm">
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
<div class="row">
    <div id="footer" class="col-xs-12">
        PoxCMS - 2013 - By <a href="http://dotproject.fr.nf">DotProject</a>
    </div>
</div>

<script src="view/admin/js/excanvas.min.js"></script>
<script src="view/admin/js/jquery.min.js"></script>
<script src="view/admin/js/jquery-ui.custom.js"></script>
<script src="view/admin/js/bootstrap.min.js"></script>
<script src="view/admin/js/jquery.flot.min.js"></script>
<script src="view/admin/js/jquery.flot.resize.min.js"></script>
<script src="view/admin/js/jquery.sparkline.min.js"></script>
<script src="view/admin/js/fullcalendar.min.js"></script>
<script src="view/admin/js/select2.min.js"></script>
<script src="view/admin/js/jquery.jpanelmenu.min.js"></script>
<script src="view/admin/js/jquery.nicescroll.min.js"></script>
<script src="view/admin/js/unicorn.js"></script>
<script src="view/admin/js/unicorn.dashboard.js"></script>
</body>
</html>