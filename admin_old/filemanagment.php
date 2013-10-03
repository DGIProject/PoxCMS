<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 15/09/12
 * Time: 15:23
 * To change this template use File | Settings | File Templates.
 */
session_start();
include "function.php";
if ($_SESSION['pseudo'] == NULL) {
    echo '<script type="text/javascript">window.location="index.php"</script>';
}
    ?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <title>Explorateur de fichiers - PoxAdmin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/uniform.css"/>
    <link rel="stylesheet" href="../css/select2.css"/>
    <link rel="stylesheet" href="../css/unicorn.main.css"/>
    <link rel="stylesheet" href="../css/unicorn.grey.css" class="skin-color"/>
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../elfinder/css/elfinder.min.css">
</head>
<body>
    <?php include "interface.php"; ?>
<div id="content">
    <div id="content-header">
        <h1>Dashboard</h1>
        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Pages" href="pages.php"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files" href="filemanagment.php"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">File Browser</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div id="elfinder"></div>
            </div>
        </div>
    </div>
</div>


</body>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/unicorn.js"></script>
<script type="text/javascript" src="../elfinder/js/elfinder.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $().ready(function() {
        var elf = $('#elfinder').elfinder({
            lang: 'fr',             // language (OPTIONAL)
            url : '../elfinder/php/connector.php'  // connector URL (REQUIRED)
        }).elfinder('instance');
    });
</script>
</html>
