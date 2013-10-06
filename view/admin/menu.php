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
                  <li class="' . $class . '"><a href="owner/' . $site['id'] . '/menu"><i class="icon icon-edit"></i> Menu</a></li>
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
        <h1>Menu</h1>
    </div>
    <div id="breadcrumb">
        <a href="owner" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
        <a href="owner/<?php echo $siteId; ?>/menu" class="current">Menu</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <a href="#addElementMenu" data-toggle="modal" class="btn btn-success"><i class="icon icon-plus"></i> Ajouter un élément du menu</a>
                <?php
                if($listMenus != NULL)
                {
                    echo '<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
								<h5>Liste des menus</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
										    <th>Nom</th>
										    <th>Rang</th>
										    <th>Page</th>
										    <th>Options</th>
										</tr>
									</thead>
									<tbody>';

                    foreach($listMenus as $menu)
                    {
                        echo '<tr><td><input type="text" onKeyup="updateButtonEditMenu(\'' . $menu['id'] . '\');" id="inputNameMenu' . $menu['id'] . '" name="inputNameMenu' . $menu['id'] . '" class="form-control" value="' . $menu['name'] . '"></td><td>' . $menu['row'] . '</td><td><select onchange="updateButtonEditMenu(\'' . $menu['id'] . '\');" id="selectFileNameMenu' . $menu['id'] . '" name="selectFileNameMenu' . $menu['id'] . '" class="form-control"><option value="' . $menu['fileName'] . '">' . getNamePage($menu['fileName']) . '</option>';

                        foreach($listPages as $page)
                        {
                            if($page['fileName'] != $menu['fileName'])
                            {
                                echo '<option value="' . $page['fileName'] . '">' . $page['name'] . '</option>';
                            }
                        }

                        echo '</select></td><td><button type="button" onclick="saveEditMenu(\'' . $menu['id'] . '\');" id="buttonEditMenu' . $menu['id'] . '" class="btn btn-success disabled"><i class="icon icon-chevron-down"></i></button> <a href="#confirmDelete" data-toggle="modal" onclick="confirmDelete(\'owner/' . $siteId . '/menu/delete/' . $menu['id'] . '\');" class="btn btn-danger"><i class="icon icon-remove"></i></a></td></tr>';
                    }

                    echo '</tbody></table></div></div>';
                }
                else
                {
                    echo '<div class="alert alert-info"><strong>Information!</strong> Vous n\'avez aucun menu pour l\'instant.</div>';
                }
                ?>
            </div>
        </div>
        <div class="modal fade" id="addElementMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Ajouter un élément du menu</h4>
                    </div>
                    <div class="modal-body">
                        <form action="owner/<?php echo $siteId; ?>/menu/add" method="post" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label">Nom</label>
                                <div class="controls">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Rang</label>
                                <div class="controls">
                                    <select id="row" name="row" class="form-control">
                                        <?php
                                        $numberRows = getNumberRowsMenu($siteId);

                                        for($i = 0; $i != $numberRows; $i++)
                                        {
                                            $row = $i + 1;

                                            if($row == 1)
                                            {
                                                echo '<option value="' . $row . '">1er</option>';
                                            }
                                            elseif($row == $numberRows)
                                            {
                                                echo '<option value="' . $row . '">Dernier</option>';
                                            }
                                            else
                                            {
                                                echo '<option value="' . $row . '">' . $row . 'ème</option>';
                                            }
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Page</label>
                                <div class="controls">
                                    <select id="fileName" name="fileName" class="form-control">
                                        <?php
                                        foreach($listPages as $page)
                                        {
                                            echo '<option value="' . $page['fileName'] . '">' . $page['name'] . '</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <input type="submit" id="buttonAddElementMenu" name="buttonAddElementMenu" class="btn btn-primary" value="Ajouter">
                                </div>
                            </div>
                        </form>
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