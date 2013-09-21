<?php
function siteExist()
{
    global $bdd;

    $req = $bdd->prepare('SELECT COUNT(*) AS id FROM site');
    $req->execute();

    $infoSite = $req->fetch();

    $countSite = $infoSite['id'];
    return $countSite;
}

function getSiteId()
{
    global $bdd;

    $req = $bdd->prepare('SELECT id FROM site');
    $req->execute();

    $infoSite = $req->fetch();

    $siteId = $infoSite['id'];
    return $siteId;
}

function getTemplateIdSite($id)
{
    global $bdd;

    $req = $bdd->prepare('SELECT templateId FROM site WHERE id = ?');
    $req->execute(array($id));

    $infoSite = $req->fetch();

    $templateId = $infoSite['templateId'];
    return $templateId;
}

function getFiles($templateId)
{
    $dir = 'view/ui/template/' . $templateId . '/';
    $files = scandir($dir);

    return $files;
}

function getInfoSite($id)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM site WHERE id = ?');
    $req->execute(array($id));

    $infoSite = $req->fetch();
    return $infoSite;
}

function getListMenus($siteId)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM menu WHERE siteId = ? ORDER BY orderMenu');
    $req->execute(array($siteId));

    $listMenus = $req->fetchAll();
    return $listMenus;
}

function getInfoPage($fileName)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM page WHERE fileName = ?') or die(mysql_error());
    $req->execute(array($fileName));

    $infoPage = $req->fetch();

    $path = 'view/ui/pages/' . $infoPage['fileName'];

    $fileContent = file_get_contents($path);
    $contentPage = stripslashes($fileContent);

    return array('id' => $infoPage['id'], 'name' => $infoPage['name'], 'fileName' => $infoPage['fileName'], 'main' => $infoPage['main'], 'content' => $contentPage);
}

function getMainPage($siteId)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM page WHERE siteId = ? AND main = "1"') or die(mysql_error());
    $req->execute(array($siteId));

    $infoPage = $req->fetch();

    $path = 'view/ui/pages/' . $infoPage['fileName'];

    $fileContent = file_get_contents($path);
    $contentPage = stripslashes($fileContent);

    return array('id' => $infoPage['id'], 'name' => $infoPage['name'], 'fileName' => $infoPage['fileName'], 'main' => $infoPage['main'], 'content' => $contentPage);
}