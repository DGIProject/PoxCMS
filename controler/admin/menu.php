<?php
include_once 'model/admin/main.php';
include_once 'model/admin/menu.php';

if($_SESSION['username'] != NULL)
{
    if($_GET['a'] == 'addElementMenu')
    {
        addElementMenu($_POST['name'], $_POST['fileName'], $_POST['row'], $_GET['siteId']);
    }
    elseif($_GET['a'] == 'editMenu')
    {
        echo editMenu($_POST['name'], $_POST['row'], $_POST['fileName'], $_POST['menuId']);

        exit();
    }
    elseif($_GET['a'] == 'deleteMenu')
    {
        deleteMenu($_GET['menuId']);
    }

    if($_GET['a'] == 'updateRowsMenu')
    {
        echo updateRowsMenu('2', '5');

        exit();
    }

    $siteId = $_GET['siteId'];

    $listSites = getListSites();
    $numberMessages = getNumberMessages();

    $listMenus = getListMenus($siteId);
    $listPages = getListPages($siteId);

    include_once 'view/admin/menu.php';
}
else
{
    header("HTTP/1.1 403 Forbidden");

    echo '<html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don\'t have permission to access to this resource on this server.</p></body></html>';

    exit();
}