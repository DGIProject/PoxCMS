<?php
function getNumberMessages()
{
    global $bdd;

    $req = $bdd->prepare('SELECT COUNT(*) AS id FROM message WHERE receiver = ?') or die(mysql_error());
    $req->execute(array($_SESSION['username']));

    $infoMessages = $req->fetch();

    $numberMessages = $infoMessages['id'];
    return $numberMessages;
}

function getListSites()
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM site') or die(mysql_error());
    $req->execute();

    $listSites = $req->fetchAll();
    return $listSites;
}