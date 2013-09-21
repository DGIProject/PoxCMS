<?php
include_once 'model/admin/main.php';
include_once 'model/admin/index.php';

if(isset($_POST['username']) && isset($_POST['password']))
{
    $resultLogin = connectionAdmin($_POST['username'], $_POST['password']);
}

include_once 'view/admin/index.php';