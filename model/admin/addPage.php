<?php
function addPage($name, $content, $main, $siteId)
{
    $fileName = md5($name) . '.html';
    $path = 'view/ui/pages/' . $fileName;

    $fileContent = fopen($path, "w+");
    fseek($fileContent, 0);

    if(fputs($fileContent, $content))
    {
        global $bdd;

        $req = $bdd->prepare('INSERT INTO page(name, fileName, siteId) VALUES (:name, :fileName, :siteId)') or die(mysql_error());
        $req->execute(array('name' => $name, 'fileName' => $fileName, 'siteId' => $siteId));

        if($main == 'Oui')
        {
            setMainPage($bdd->lastInsertId(), $siteId);
        }

        $row = getRowMenu($siteId);

        $req = $bdd->prepare('INSERT INTO menu(name, fileName, row, siteId) VALUES (:name, :fileName, :row, :siteId)') or die(mysql_error());
        $req->execute(array('name' => $name, 'fileName' => $fileName, 'row' => $row, 'siteId' => $siteId));

        return '<div class="alert alert-success">La page a bien été ajoutée.</div>';
    }
    else
    {
        return '<div class="alert alert-error">Une erreur est survenue lors de la céation du fichier.</div>';
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

function getRowMenu($siteId)
{
    global $bdd;

    $req = $bdd->prepare('SELECT COUNT(*) AS id FROM menu WHERE siteId = ?') or die(mysql_error());
    $req->execute(array($siteId));

    $infoMenu = $req->fetch();

    $row = $infoMenu['id'] + 1;
    return $row;
}