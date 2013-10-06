<?php
include_once 'model/ui/index.php';

if($_GET['siteId'] != NULL && siteExist($_GET['siteId']) == true)
{
    $templateId = getTemplateIdSite($_GET['siteId']);

    $templateFiles = getFiles($templateId);

    $site = getInfoSite($_GET['siteId']);

    if($_GET['pageId'] != NULL)
    {
        $page = getInfoPage($_GET['pageId']);
    }
    else
    {
        $page = getMainPage($_GET['siteId']);
    }

    $listMenus = getListMenus($_GET['siteId']);

    $siteId = $_GET['siteId'];

    include_once 'view/ui/index.php';
}
else
{
    $countSites = getCountSites();

    if($countSites > 0)
    {
        if($countSites == 1)
        {
            $siteId = getSiteId();

            header('Location: ' . $siteId);
        }
        else
        {
            $listSites = getListSites();

            echo 'Choisissez le site :<ul>';

            foreach($listSites as $site)
            {
                echo '<li><a href="' . $site['id'] . '">' . $site['name'] . '</a></li>';
            }

            echo '</ul>';
        }
    }
    else
    {
        echo 'Aucun site.';
    }
}

/*
$dir = 'view/ui/template/pages/Amelia/';
$files1 = scandir($dir);
$extensionName = 'css';

foreach($files1 as $file)
{
    $path = $dir . $file;

    if(!is_dir($path))
    {
        $extension = strrchr($file, '.');

        $extension = substr($extension, 1);

        if($extensionName == $extension)
        {
            echo '<link type="text/css" href="' . $path . '" rel="stylesheet">';
        }
    }
}
*/