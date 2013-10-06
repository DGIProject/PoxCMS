<?php
function getInfoSite($id)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM site WHERE id = ?');
    $req->execute(array($id));

    $infoSite = $req->fetch();
    return $infoSite;
}

function editSite($description, $footer, $id)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE site SET description = :description, footer = :footer WHERE id = :id');
    $req->execute(array('description' => $description, 'footer' => $footer, 'id' => $id));

    return '<div class="alert alert-success"><strong>Super!</strong> Le site a bien été modifié.</div>';
}

function deleteSite($id)
{
    global $bdd;

    $req = $bdd->prepare('DELETE FROM site WHERE id = ?');
    $req->execute(array($id));
}