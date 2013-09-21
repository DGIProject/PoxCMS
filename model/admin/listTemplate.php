<?php
function getListTemplates()
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM template') or die(mysql_error());
    $req->execute();

    $listTemplates = $req->fetchAll();
    return $listTemplates;
}

function setTemplate($siteId, $templateId)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE site SET templateId = :templateId WHERE id = :id') or die(mysql_error());
    $req->execute(array('templateId' => $templateId, 'id' => $siteId));
}