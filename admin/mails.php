<?php
include "function.php";
?>
<!DOCTYPE html >
<html>
<head>
    <title>Mails - PoxAdmin</title>
    <meta charset="UTF-8"/>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/uniform.css"/>
    <link rel="stylesheet" href="../css/select2.css"/>
    <link rel="stylesheet" href="../css/unicorn.main.css"/>
    <link rel="stylesheet" href="../css/unicorn.grey.css" class="skin-color"/>
</head>
<body>
<?php include "interface.php"; ?>
<div id="content">
    <div id="content-header">
        <h1>Mails</h1>

        <div class="btn-group">
            <a class="btn btn-large tip-bottom" href="pages.php" title="Manage Pages"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files" href="filemanagment.php"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Mails</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="span2">
                    <ul class="nav nav-list nav-stacked">
                        <li class="nav-header">Mails</li>
                        <li><a href="mails.php">Inbox</a></li>
                        <li ><a href="mails.php?a=new">New message</a></li>
                        <li><a href="mails.php?a=trash"> Trash </a></li>
                    </ul>
                </div>
                <div class="span10">
                    <?php
                    if($_GET['id'] != NULL)
                    {
                    get_info_mails($_GET['id']);
                    }
                    elseif($_GET['a'] != NULL)
                    {?>
                    <div class="row">
                        <div class="span8 offset2">
                            <script src="../ckeditor/ckeditor.js"></script>
                            <form name="addmails_form" enctype="application/x-www-form-urlencoded" method="POST" action="mailsActions.php?a=addmails">
                                <select name="receiver" class="span3" data-provide="typeahead" data-items="4">
                                    <?php get_contact_mails(); ?>
                                </select>
                                <input type="text" name="object" placeholder="Object">
                                <p>
                                    <textarea id="editor1" name="body"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace( "editor1" );
                                    </script>
                                </p>
                                <input name="Submit" value="Envoyer le message" type="submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>

                    <?php
                    }
                    else
                    {
                        get_mails($_GET['page']);
                        number_page_mails();
                    }?>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/unicorn.js"></script>
<script src="../js/unicorn.tables.js"></script>

</body>
</html>