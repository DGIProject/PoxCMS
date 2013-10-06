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
        <li class="active"><a href="owner"><i class="icon icon-home"></i> Dashboard</a></li>
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
                  <li><a href="owner/' . $site['id'] . '/user"><i class="icon icon-user"></i> Utilisateurs</a></li>';
        }?>
    </ul>
</div>

<div id="content">
    <div id="content-header">
        <h1>Dashboard</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <p>Bienvenue sur PoxCMS, vous pourrez créer de nombreux sites facilement.</p>
                <?php
                if($listSites != NULL)
                {
                    echo '<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
								<h5>Liste des sites</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Nom</th>
											<th>Descriptions</th>
											<th>Bas de page</th>
											<th>Style</th>
											<th>Date</th>
											<th>Options</th>
										</tr>
									</thead>
									<tbody>';

                    foreach($listSites as $site)
                    {
                        echo '<tr><td>' . $site['name'] . '</td><td>' . $site['description'] . '</td><td>' . $site['footer'] . '</td><td>' . getTemplateName($site['templateId']) . '</td><td>' . $site['date'] . '</td><td><a href="owner/site/edit/' . $site['id'] . '" class="btn btn-info"><i class="icon icon-edit"></i></a> <a href="#confirmDelete" data-toggle="modal" onclick="confirmDelete(\'owner/site/delete/' . $site['id'] . '\');" class="btn btn-danger"><i class="icon icon-remove"></i></a></td></tr>';
                    }

					echo '			</tbody>
								</table>
							</div>
						  </div>';
                }
                else
                {
                    echo '<div class="alert alert-info">Aucun site.</div>';
                }?>

                <?php
                if($resultAddSite != NULL)
                {
                    echo $resultAddSite;
                }?>
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-align-justify"></i>
                        </span>
                        <h5>Ajouter un site</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" action="owner/site/add" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label">Nom</label>
                                <div class="controls">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Style</label>
                                <div class="controls">
                                    <select name="template" class="form-control">
                                        <?php
                                        foreach($listTemplates as $template)
                                        {
                                            echo '<option value="' . $template['id'] . '">' . $template['name'] . '</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bas de page</label>
                                <div class="controls">
                                    <input type="text" class="form-control" name="footer">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
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