<?php
function getListTemplates()
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM template') or die(mysql_error());
    $req->execute();

    $listTemplates = $req->fetchAll();
    return $listTemplates;
}

function getTemplateName($templateId)
{
    switch($templateId)
    {
        case 1:
            return 'Amelia';
            break;
        case 2:
            return 'Cerulean';
            break;
        case 3:
            return 'Cosmos';
            break;
        case 4:
            return 'Cyborg';
            break;
        case 5:
            return 'Flatly';
            break;
        case 6:
            return 'Journal';
            break;
        case 7:
            return 'Readable';
            break;
        case 8:
            return 'Simplex';
            break;
        case 9:
            return 'Slate';
            break;
        case 10:
            return 'Spacelab';
            break;
        case 11:
            return 'United';
            break;
        default:
            return 'Style personnalisé';
    }
}

function addSite($name, $description, $footer, $template)
{
    if(empty($name) || empty($description))
    {
        return '<div class="alert alert-error">Vous devez remplir tout les champs.</div>';
    }
    else
    {
        if(empty($footer))
        {
            $footer = $name;
        }

        global $bdd;

        $req = $bdd->prepare('INSERT INTO site(name, description, footer, templateId) VALUES (:name, :description, :footer, :templateId)') or die(mysql_error());
        $req->execute(array('name' => $name, 'description' => $description, 'footer' => $footer, 'templateId' => $template));

        return '<div class="alert alert-success">Le site a bien été ajouté.</div>';
    }
}