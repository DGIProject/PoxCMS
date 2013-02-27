<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 27/02/13
 * Time: 08:19
 * To change this template use File | Settings | File Templates.
 */
include "function.php";
$pageloaded = load_page($_POST['page']);
echo $pageloaded;
?>