<?php
function getInfoPage($id)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM page WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));

    $infoPage = $req->fetch();

    $path = 'view/ui/pages/' . $infoPage['fileName'];

    $fileContent = file_get_contents($path);
    $contentPage = stripslashes($fileContent);

    return array('id' => $infoPage['id'], 'name' => $infoPage['name'], 'fileName' => $infoPage['fileName'], 'main' => $infoPage['main'], 'content' => $contentPage);
}

function editPage($pageId, $main, $fileName, $content, $siteId)
{
    $path = 'view/ui/pages/' . $fileName;

    $fileContent = fopen($path, "w+");
    fseek($fileContent, 0);

    if(fputs($fileContent, $content))
    {
        if($main == 'Oui')
        {
            setMainPage($pageId, $siteId);
        }
        else
        {
            removeMainPage($pageId);
        }

        return '<div class="alert alert-success">La page a bien été modifiée.</div>';
    }
    else
    {
        return '<div class="alert alert-error">Une erreur est survenue lors de la modification de la page.</div>';
    }
}

function setMainPage($id, $siteId)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE page SET main = "0" WHERE siteId = ?') or die(mysql_error());
    $req->execute(array($siteId));

    $req = $bdd->prepare('UPDATE page SET main = "1" WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));
}

function removeMainPage($id)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE page SET main = "0" WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));
}