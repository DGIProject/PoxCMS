<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 26/09/12
 * Time: 17:26
 * To change this template use File | Settings | File Templates.
 */

include "function.php";
if ($_GET['p'] == null)
{
    echo '<script type="text/javascript">window.location="pages.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>suprimer une page</title>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript">
        function visibilite(thingId) {
            var targetElement;
            targetElement = document.getElementById(thingId);
            if (targetElement.style.display == "none") {
                targetElement.style.display = "";
            } else {
                targetElement.style.display = "none";
            }
        }
    </script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/uniform.css"/>
    <link rel="stylesheet" href="css/select2.css"/>
    <link rel="stylesheet" href="css/unicorn.main.css"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color"/>
</head>
<body>
<?php include "interface.php"; ?>
<div id="content">
    <div id="content-header">
        <h1>Suprimer une page</h1>

        <div class="btn-group">
            <a class="btn btn-large tip-bottom" href="pages.php" title="Manage Pages"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-folder-open"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Suprimer une page</a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <p>Bienvenue dans la zone de supression des pages :
                    ici vous pourez suprimer les pages que vous souhaitez.
                    <br>avant cela vous devez choisir dans la liste ci-dessous la page que vous voulez suprimer</p>
                <?php

                if (isset($_GET['p'])) {
                    ?><br>
    <img src="images/atten.png" alt="attention"">

        etes vous sure de vouloir suprimer la page :<strong><?php echo $_GET['p']; ?></strong> ?
    <img src="images/atten.png" alt="attention">
<br>
    <br><a href="#" onclick="visibilite('page');"> Voir la page</a>
    <br/>
        <div id="page" style="width: auto;height: 50%;padding: 10px 10px 10px 10px; display: none;overflow : auto;border-width:2px 2px 2px 2px; border-style:solid dashed;border-color: #4169e1">
            <?php echo load_page($_GET['p']); ?>
        </div>
        <br>
    <form action="del_exe.php" method="post" onsubmit="deletepage(this.page.value); return false;">
        <input type="hidden" name="page" value="<?php echo $_GET['p']; ?>">
        <input type="submit" value="Suprimer !" class="btn btn-danger" name="surpime" align="left">
        <input type="reset" class="btn btn-warning" value="NON !" onclick="document.location.href = 'pages.php';" align="right">
    </form>
           <?php
           }

                ?>
                <script src="js/jquery.min.js"></script>
                <script src="js/jquery.ui.custom.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery.uniform.js"></script>
                <script src="js/select2.min.js"></script>
                <script src="js/jquery.gritter.min.js"></script>
                <script src="js/unicorn.js"></script>
            </div>
        </div>
    </div>
</div>
</body>
</html>
