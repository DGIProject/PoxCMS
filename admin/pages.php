<?php
include "function.php";
?>
<!DOCTYPE html >
<html>
<head>
    <title>User Lise - PoxAdmin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/uniform.css"/>
    <link rel="stylesheet" href="css/select2.css"/>
    <link rel="stylesheet" href="css/unicorn.main.css"/>
    <link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color"/>
</head>
<body>
<?php include "interface.php"; ?>
<div id="content">
    <div id="content-header">
        <h1>Pages List</h1>

        <div class="btn-group">
            <a class="btn btn-large tip-bottom" href="pages.php" title="Manage Pages"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Pages List</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <a href="add_page.php" class="btn btn-success"><i class="icon-plus-sign"></i> Ajouter une page</a>

                <div class="widget-box">
                    <div class="widget-title">

                        <h5>Pages List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Lien</th>
                                <th>Date de création</th>
                                <th>Action(s)</th>
                            </tr>
                            </thead>
                            <tbody><?php
                            $list = get_liste_page();
                            foreach ($list as $pages) {
                                echo '<tr><td>' . $pages['titre'] . '</td><td>' . $pages['link'] . '</td><td>' . $pages['dte'] . '</td><td><a href="del_page.php?p=' . $pages['titre'] . '" class="btn btn-danger"><i class="icon-remove"></i>Suprimer</a><a href="#' . $pages['id'] . '" class="btn btn-info"><i class="icon-pencil"></i>Editer</a><a href="#' . $pages['id'] . '" class="btn"><i class="icon-eye-open"></i>Prévisualiser</a></td></tr>';
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/unicorn.js"></script>
<script src="js/unicorn.tables.js"></script>

</body>
</html>