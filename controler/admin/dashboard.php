<?php
include_once 'model/admin/main.php';
include_once 'model/admin/dashboard.php';

if($_SESSION['username'] != NULL)
{
    if($_GET['a'] == 'logout')
    {
        session_destroy();

        setcookie('currentUser', '', time() - 365 * 24 * 3600, null, null, false, true);

        header('Location: ../../PoxCMS');
    }
    elseif($_GET['a'] == 'addSite')
    {
        $resultAddSite = addSite($_POST['name'], $_POST['description'], $_POST['footer'], $_POST['template']);
    }

    $listSites = getListSites();
    $numberMessages = getNumberMessages();

    $listTemplates = getListTemplates();

    include_once 'view/admin/dashboard.php';
}
else
{
    header("HTTP/1.1 403 Forbidden");

    echo '<html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don\'t have permission to access to this resource on this server.</p></body></html>';

    exit();
}