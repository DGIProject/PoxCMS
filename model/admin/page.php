<?php
function getListPages($siteId)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM page WHERE siteId = ?') or die(mysql_error());
    $req->execute(array($siteId));

    $listPages = $req->fetchAll();
    return $listPages;
}

function getPreviewPage($path)
{
    $file = file_get_contents($path);

    $previewPage = stripslashes($file);
    return $previewPage;
}

function setMainPage($id, $siteId)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE page SET main = "0" WHERE siteId = ?') or die(mysql_error());
    $req->execute(array($siteId));

    $req = $bdd->prepare('UPDATE page SET main = "1" WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));
}

function deletePage($id)
{
    global $bdd;

    $req = $bdd->prepare('SELECT fileName FROM page WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));

    $infoPage = $req->fetch();

    $fileName = $infoPage['fileName'];
    $path = 'pages/' . $fileName;

    unlink($path);

    $req = $bdd->prepare('DELETE FROM page WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));
}