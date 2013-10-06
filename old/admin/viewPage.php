<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 27/02/13
 * Time: 08:19
 * To change this template use File | Settings | File Templates.
 */
include "function.php";
if ($_POST['a'] == 'temp')
{
    $pageloaded = load_any_pages($_POST['page']);

}
else
{
    $pageloaded = load_page($_POST['page']);

}
echo $pageloaded;
?>