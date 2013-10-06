<?php
include_once 'model/admin/main.php';
include_once 'model/admin/editSite.php';

if($_SESSION['username'] != NULL)
{
    if($_GET['a'] == 'editSite')
    {
        $resultEditSite = editSite($_POST['description'], $_POST['footer'], $_GET['siteId']);
    }
    elseif($_GET['a'] == 'deleteSite')
    {
        deleteSite($_GET['siteId']);

        header('Location: ../../owner');
    }

    $siteId = $_GET['siteId'];

    $listSites = getListSites();
    $numberMessages = getNumberMessages();

    $site = getInfoSite($siteId);

    include_once 'view/admin/editSite.php';
}
else
{
    header("HTTP/1.1 403 Forbidden");

    echo '<html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don\'t have permission to access to this resource on this server.</p></body></html>';

    exit();
}