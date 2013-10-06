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
            if($siteId == $site['id'])
            {
                $class = 'active';
            }
            else
            {
                $class = NULL;
            }

            echo '<li class="' . $class . '"><a href="owner/site/edit/' . $site['id'] . '">' . $site['name'] . '</a></li>
                  <li><a href="owner/' . $site['id'] . '/menu"><i class="icon icon-edit"></i> Menu</a></li>
                  <li class="submenu">
                    <a href="#"><i class="icon icon-file"></i> Page <i class="arrow icon-chevron-right"></i></a>
                    <ul>
                        <li><a href="owner/' . $site['id'] . '/page/new"><i class="icon icon-plus"></i> Ajouter une page</a></li>
                        <li><a href="owner/' . $site['id'] . '/page"><i class="icon icon-eye-open"></i> Voir toutes les pages</a></li>
                    </ul>
                  </li>
                  <li><a href="owner/' . $site['id'] . '/template/list"><i class="icon icon-th-list"></i> Styles</a></li>
                  <li><a href="owner/' . $site['id'] . '/user"><i class="icon icon-user"></i> Utilisateurs</a></li>';
        }?>
    </ul>
</div>

<div id="content">
    <div id="content-header">
        <h1>Editer le site</h1>
    </div>
    <div id="breadcrumb">
        <a href="owner" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
        <a href="owner/site/edit/<?php echo $siteId; ?>" class="current">Editer le site</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <?php
                if($resultEditSite != NULL)
                {
                    echo $resultEditSite;
                }?>
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-align-justify"></i>
                        </span>
                        <h5>Editer le site</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" action="owner/site/saveedit/<?php echo $siteId; ?>" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label">Nom</label>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" disabled="" value="<?php echo $site['name']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" class="form-control"><?php echo $site['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bas de page</label>
                                <div class="controls">
                                    <input type="text" name="footer" class="form-control" value="<?php echo $site['footer']; ?>">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
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
<script src="view/admin/js/jquery.jpanelmenu.min.js"></script>
<script src="view/admin/js/jquery.nicescroll.min.js"></script>
<script src="view/admin/js/unicorn.js"></script>
<script src="view/admin/js/unicorn.dashboard.js"></script>
</body>
</html>