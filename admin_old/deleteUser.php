<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 14/04/13
 * Time: 11:01
 * To change this template use File | Settings | File Templates.
 */
include 'function.php';
if (deleteUser($_POST['id']))
{
    echo 'true';
}