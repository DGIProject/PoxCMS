<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 14/04/13
 * Time: 14:37
 * To change this template use File | Settings | File Templates.
 */
include 'function.php';
if ($_POST['page'])
{
    echo def_home_page($_POST['page']);

}