<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 16/09/12
 * Time: 20:46
 * To change this template use File | Settings | File Templates.
 */

include "function.php";

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../elrte/css/smoothness/jquery-ui-1.8.13.custom.css" type="text/css" media="screen"
          charset="utf-8">
    <link rel="stylesheet" href="../elrte/css/elrte.min.css" type="text/css" media="screen" charset="utf-8">
    <script src="../elrte/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../elrte/js/jquery-ui-1.8.13.custom.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../elrte/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../elrte/css/elfinder.min.css">
    <script type="text/javascript" src="../elrte/js/elfinder.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/uniform.css"/>
    <link rel="stylesheet" href="css/select2.css"/>
    <link rel="stylesheet" href="css/unicorn.main.css"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color"/>
    <script type="text/javascript" charset="utf-8">
        $().ready(function () {
            var opts = {
                lang:'fr', // set your language
                styleWithCSS:false,
                height:400,
                toolbar:'maxi',
                fmAllow:true,
                fmOpen:function (callback) {
                    $('<div />').dialogelfinder({
                        url:'../elrte/php/connector.php',
                        commandsOptions:{
                            getfile:{
                                oncomplete:'destroy' // destroy elFinder after file selection
                            }
                        },
                        getFileCallback:callback // pass callback to file manager
                    });
                }
            };

            $('#content1').elrte(opts);

            // or this way
            // var editor = new elRTE(document.getElementById('our-element'), opts);
        });
    </script>
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
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Editer une page</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <p>Bienvenue dans la zone d'edition de page :
                    ici vous pourez editer les page que vous souhaitez.
                    <br>avant cela vous devez choisir dans la liste ci-dessous la page que vous voulez editer</p>
                <?php
                if ($_GET['p'] == null) {
                    ?>
                    <form name="choose" action="#" method="get">

                        <div class="control-group">
                            <label class="control-label">Choisisez la page</label>

                            <div class="controls">
                                <select onchange="document.choose.submit()" name="p">
                                    <option>--</option>
                                    <?php
                                    $list = get_liste_page();
                                    foreach ($list as $pagename) {
                                        echo '<option>' . $pagename['titre'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                    <?php
                }

                if (isset($_GET['p'])) {
                    echo $_GET['p'] . ' :';
                    ?>
                    <form action="save_edited_file.php"
                          onsubmit="confirmEdit(this.selected1.value, this.content1.value); return false;"
                          method="post">
                        <textarea id="content1" name="content1">
                            <?php
                            echo load_page($_GET['p']);
                            ?>
                        </textarea>
                        <input type="hidden" name="selected1" value="<?php echo $_GET['p'];?>">
                        <input type="submit" class="btn btn-info" name="save_file_page" value="sauvegarder">
                    </form>
                    <?php
                }

                ?>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/jquery.gritter.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/unicorn.js"></script>
<script src="js/unicorn.interface.js"></script>
<script src="js/unicorn.form_common.js"></script>
</body>
</html>