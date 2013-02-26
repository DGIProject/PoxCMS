<?php
include "function.php";
if ($_SESSION['pseudo'] != NULL)
{
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Unicorn Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/unicorn.main.css" />
    <link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color" />
</head>
<body>
<div id="header">
    <h1><a href="dashboard.html">PoxCMS Admin</a></h1>
</div>

<div id="search">
    <input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <li class="btn btn-inverse" ><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
        <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">0</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#">new message</a></li>
                <li><a class="sInbox" title="" href="#">inbox</a></li>
                <li><a class="sOutbox" title="" href="#">outbox</a></li>
                <li><a class="sTrash" title="" href="#">trash</a></li>
            </ul>
        </li>
        <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
        <li class="btn btn-inverse"><a title="" href="deco.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
<ul>
    <li><a href="add_page.php"><i class="icon icon-file"></i>ajouter une page</a></li>
    <li><a href="#" >mise en place de base</a></li>
    <li><a href="edit_page.php"><i class="icon icon-edit"></i>Editer une page</a> </li>
    <li><a href="#"><i class="icon icon-list"></i>Element du site</a></li>
    <li><a href="del_page.php"><i class="icon icon-remove"></i>suprimer une page</a> </li>
    <li><a href="add_menu.php"><i class="icon icon-plus"></i>Ajouter un menu</a> </li>
    <li><a href="edit_menu.php"><i class="icon icon-edit"></i>editer un menu</a> </li>
	<li><a href="def_home.php">Definir la page d'accueille du site</a></li>
	<li><a href="newUser.php"><i class="icon icon-user"></i>Ajouter un utilisateur</a></li>
</ul>
</div>
<div id="content">
    <div id="content-header">
        <h1>Dashboard</h1>
        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Pages" href="pages.php"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Dashboard</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
    <p>Bienvenue dans l'interface d'amistration : de cette page vous pourrez effectuer de nombreuse chose.
        vous pourrez créer de nouvelle page et des article en passant par la mise en page et l'ajout de certain fichier !</p>
    </div>
        </div>
        </div>
    </div>






<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/unicorn.js"></script>
<script src="js/unicorn.dashboard.js"></script>
</body>
</html>
<?php }
else
{
    echo '<script type="text/javascript">window.location="index.php"</script>';
}
?>