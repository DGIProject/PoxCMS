<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 16/09/12
 * Time: 07:19
 * To change this template use File | Settings | File Templates.
 */
include ("function.php");
session_start();
if ($_SESSION['pseudo'] != NULL) {

    if (isset($_POST['content1']) AND isset($_POST['selected1'])) {
        echo utf8_decode($_POST['content1']);
        $retour = save_to_file($_POST['selected1'], $_POST['content1']);
        echo $retour;
    }
    else
    {
        echo 'true';
    }
} else {
    echo '<script type="text/javascript">window.location="index.php"</script>';
}