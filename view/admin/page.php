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
        <li><a href="owner"><i class="icon icon-home"></i> Dashboard</a></li>
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

            echo '<li><a href="owner/site/edit/' . $site['id'] . '">' . $site['name'] . '</a></li>
                  <li><a href="owner/' . $site['id'] . '/menu"><i class="icon icon-edit"></i> Menu</a></li>
                  <li class="submenu ' . $class . '">
                    <a href="#"><i class="icon icon-file"></i> Page <i class="arrow icon-chevron-right"></i></a>
                    <ul>
                        <li><a href="owner/' . $site['id'] . '/page/new"><i class="icon icon-plus"></i> Ajouter une page</a></li>
                        <li class="' . $class . '"><a href="owner/' . $site['id'] . '/page"><i class="icon icon-eye-open"></i> Voir toutes les pages</a></li>
                    </ul>
                  </li>
                  <li><a href="owner/' . $site['id'] . '/template/list"><i class="icon icon-th-list"></i> Styles</a></li>
                  <li><a href="owner/' . $site['id'] . '/user"><i class="icon icon-user"></i> Utilisateurs</a></li>';
        }?>
    </ul>
</div>

<div id="content">
    <div id="content-header">
        <h1>Page</h1>
    </div>
    <div id="breadcrumb">
        <a href="owner" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
        <a href="owner/<?php echo $siteId; ?>/page" class="current">Page</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <a href="owner/<?php echo $siteId; ?>/page/new" class="btn btn-success"><i class="icon-plus-sign"></i> Ajouter une page</a>
                <div class="widget-box">
                    <div class="widget-title">
                        <h5>Pages</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Principale</th>
                                <th>Date</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($listPages as $page)
                            {
                                echo '<tr><td>' . $page['name'] . '</td>';

                                if($page['main'] == 1)
                                {
                                    echo '<td><span class="label label-info">Oui</span></td>';
                                }
                                else
                                {
                                    echo '<td><span class="label label-inverse">Non</span></td>';
                                }

                                echo '<td>' . $page['date'] . '</td><td><a href="#previewPage" data-toggle="modal" onclick="previewPage(\'view/ui/pages/' . $page['fileName'] . '\');" class="btn btn-default"><i class="icon-eye-open"></i></a> <a href="owner/' . $siteId . '/page/edit/' . $page['id'] . '" class="btn btn-info"><i class="icon-pencil"></i></a> <a href="#confirmDelete" data-toggle="modal" onclick="confirmDelete(\'owner/' . $siteId . '/page/delete/' . $page['id'] . '\');" class="btn btn-danger"><i class="icon-remove"></i></a></td></tr>';
                            }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="previewPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Aperçu de la page</h4>
                    </div>
                    <div class="modal-body">
                        <div id="returnPreview">
                            <center><img src="view/admin/img/spinner.gif" alt="spinner"></center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmation de suppression</h4>
                    </div>
                    <div class="modal-body">
                        <div id="returnDelete">
                            <center>Nothing ...</center>
                        </div>
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
<script src="view/admin/js/admin.js"></script>
</body>
</html>