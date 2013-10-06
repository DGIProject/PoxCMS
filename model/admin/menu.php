<?php
function getListMenus($siteId)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM menu WHERE siteId = ?');
    $req->execute(array($siteId));

    $listMenus = $req->fetchAll();
    return $listMenus;
}

function addElementMenu($name, $fileName, $row, $siteId)
{
    global $bdd;

    $req = $bdd->prepare('INSERT INTO menu(name, fileName, row, siteId) VALUE (:name, :fileName, :row, :siteId)');
    $req->execute(array('name' => $name, 'fileName' => $fileName, 'row' => $row, 'siteId' => $siteId));
}

function updateRowsMenu($row, $numberRows)
{
    $numberRowsToUpdate = $numberRows - $row;

    echo '</br>numberRowsToUpdate : ' . $numberRowsToUpdate;

    global $bdd;

    for($i = 0; $i < $numberRowsToUpdate; $i++)
    {
        $currentRow = $i + 1;
        $newRow = $currentRow + $row;
        $oldRow = $newRow - 1;

        echo '</br>currentRow : ' . $currentRow;
        echo '</br>newRow : ' . $newRow;
        echo '</br>oldRow : ' . $oldRow;
        echo '</br>UPDATE menu SET row = ' . $newRow . ' WHERE row = ' . $oldRow . ' ORDER BY id LIMIT 1';

        $req = $bdd->prepare('UPDATE menu SET row = :newRow WHERE row = :oldRow ORDER BY id LIMIT 1');
        $req->execute(array('newRow' => $newRow, 'oldRow' => $oldRow));
    }
}

function editMenu($name, $row, $fileName, $id)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE menu SET name = :name, row = :row, fileName = :fileName WHERE id = :id');
    $req->execute(array('name' => $name, 'row' => $row, 'fileName' => $fileName, 'id' => $id));

    return 'true';
}

function deleteMenu($id)
{
    global $bdd;

    $req = $bdd->prepare('DELETE FROM menu WHERE id = ?');
    $req->execute(array($id));
}

function getListPages($siteId)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM page WHERE siteId = ?');
    $req->execute(array($siteId));

    $listPages = $req->fetchAll();
    return $listPages;
}

function getNamePage($fileName)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM page WHERE fileName = ?');
    $req->execute(array($fileName));

    $infoPage = $req->fetch();

    $namePage = $infoPage['name'];
    return $namePage;
}

function getNumberRowsMenu($siteId)
{
    global $bdd;

    $req = $bdd->prepare('SELECT COUNT(*) as row FROM menu WHERE siteId = ?');
    $req->execute(array($siteId));

    $infoRows = $req->fetch();

    $countRows = $infoRows['row'];
    return $countRows;
}