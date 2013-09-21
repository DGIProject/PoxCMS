<?php
function getListTemplates()
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM template') or die(mysql_error());
    $req->execute();

    $listTemplates = $req->fetchAll();
    return $listTemplates;
}

function getTemplateId($template)
{
    global $bdd;

    $req = $bdd->prepare('SELECT id FROM template WHERE name = ?') or die(mysql_error());
    $req->execute(array($template));

    $infoTemplate = $req->fetch();

    $templateId = $infoTemplate['id'];
    return $templateId;
}

function addSite($name, $description, $footer, $template)
{
    if(empty($name) || empty($description))
    {
        return '<div class="alert alert-error">Vous devez remplir tout les champs.</div>';
    }
    else
    {
        $templateId = getTemplateId($template);

        global $bdd;

        $req = $bdd->prepare('INSERT INTO site(name, description, footer, templateId) VALUES (:name, :description, :footer, :templateId)') or die(mysql_error());
        $req->execute(array('name' => $name, 'description' => $description, 'footer' => $footer, 'templateId' => $templateId));

        return '<div class="alert alert-success">Le site a bien été ajouté.</div>';
    }
}