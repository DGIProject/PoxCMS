<?php
include "function.php";
if ($_SESSION['pseudo'] != NULL) {
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Unicorn Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.css"/>
    <link rel="stylesheet" href="css/unicorn.main.css"/>
    <link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color"/>
</head>
<body>
<div id="header">
    <?php include "interface.php"; ?>
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
                    <p>Bienvenue dans l'interface d'amistration : de cette page vous pourrez effectuer de nombreuse
                        chose.
                        vous pourrez créer de nouvelle page et des article en passant par la mise en page et l'ajout de
                        certain fichier !</p>
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
<?php
} else {
    echo '<script type="text/javascript">window.location="index.php"</script>';
}
?>