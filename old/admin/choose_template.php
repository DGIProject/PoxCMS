<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 10/04/13
 * Time: 14:36
 * To change this template use File | Settings | File Templates.
 */
include "function.php";

?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/uniform.css"/>
    <link rel="stylesheet" href="../css/select2.css"/>
    <link rel="stylesheet" href="../css/unicorn.main.css"/>
    <link rel="stylesheet" href="../css/jquery.gritter.css"/>
    <link rel="stylesheet" href="../css/unicorn.grey.css" class="skin-color"/>
    <title>Editer une page</title>
</head>
<body>
<?php include "interface.php"; ?>
<div id="content">
    <div id="content-header">
        <h1>Dashboard</h1>

        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Pages" href="pages.php"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files" href="filemanagment.php"><i
                    class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Choisir un tamplate</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="thumbnails">
                <?php
                $TemplateList = getTemplate();
                foreach ($TemplateList as $template)
                {?>

                    <li class="span3">
                        <div class="thumbnail">
                            <img src="../template/pages/img/<?php echo $template['picture'] ?>">

                            <h3><?php echo $template['name'];?></h3>

                            <p><?php echo $template['description']; ?></p>

                            <p><a href="#preview" onclick="preview('../template/<?php echo $template['preview'] ?>', 'temp')" data-toggle="modal" class="btn btn-primary">Preview</a> <a href="setTemplate.php?id=<?php echo $template['id']; ?>" class="btn">Choose</a></p>
                        </div>
                    </li>
                <?php
                }
                ?>
                </ul>
                <div id="preview" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>Modal header</h3>
                    </div>
                    <div class="modal-body">
                        <div id="returne">
                            <center><img src="../old/images/loading4.gif"></center>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/jquery.gritter.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/unicorn.js"></script>
<script src="../js/unicorn.form_common.js"></script>
</body>
</html>