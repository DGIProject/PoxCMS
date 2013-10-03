<?php
include_once 'model/admin/main.php';
include_once 'model/admin/user.php';

if($_SESSION['username'] != NULL)
{
    if($_GET['a'] == 'addUser')
    {
        $resultAddUser = addUser($_POST['username'], $_POST['email'], $_POST['category'], $_POST['password1'], $_POST['password2'], $_GET['siteId']);
    }
    elseif($_GET['a'] == 'editUser')
    {
        editUser($_GET['userId'], $_POST['emailEdit'], $_POST['passwordEdit']);
    }
    elseif($_GET['a'] == 'deleteUser')
    {
        deleteUser($_GET['userId']);
    }

    $siteId = $_GET['siteId'];

    $listSites = getListSites();
    $numberMessages = getNumberMessages();
    $listUsers = getListUsers($siteId);

    include_once 'view/admin/user.php';
}
else
{
    header("HTTP/1.1 403 Forbidden");

    echo '<html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don\'t have permission to access to this resource on this server.</p></body></html>';

    exit();
}