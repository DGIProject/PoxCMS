<?php
include_once 'model/admin/main.php';
include_once 'model/admin/listTemplate.php';

if($_SESSION['username'] != NULL)
{
    if($_GET['a'] == 'setTemplate')
    {
        setTemplate($_GET['siteId'], $_GET['templateId']);
    }

    $siteId = $_GET['siteId'];

    $listSites = getListSites();
    $numberMessages = getNumberMessages();

    $listTemplates = getListTemplates();

    include_once 'view/admin/listTemplate.php';
}
else
{
    header("HTTP/1.1 403 Forbidden");

    echo '<html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don\'t have permission to access to this resource on this server.</p></body></html>';

    exit();
}