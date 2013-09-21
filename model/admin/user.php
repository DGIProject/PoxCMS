<?php
function getListUsers($siteId)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM users WHERE siteId = ?') or die(mysql_error());
    $req->execute(array($siteId));

    $listUsers = $req->fetchAll();
    return $listUsers;
}

function getInfoUser($id)
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM users WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));

    $infoUser = $req->fetch();
    return $infoUser;
}

function addUser($username, $email, $password1, $password2, $siteId)
{
    if(empty($username) || empty($email) || empty($password1) || empty($password2))
    {
        return '<div class="alert alert-error">Vous devez remplir tout les champs.</div>';
    }
    elseif($password1 != $password2)
    {
        return '<div class="alert alert-error">Les mots de passe ne correspondent pas.</div>';
    }
    else
    {
        global $bdd;

        $req = $bdd->prepare('INSERT INTO users(username, password, email, siteId) VALUES (:username, :password, :email, :siteId)') or die(mysql_error());
        $req->execute(array('username' => $username, 'password' => sha1($password1), 'email' => $email, 'siteId' => $siteId));

        return '<div class="alert alert-success">Cet utilisateur a été ajouté avec succès.</div>';
    }
}

function editUser($id, $email, $password)
{
    global $bdd;

    if(empty($password))
    {
        $req = $bdd->prepare('UPDATE users SET email = :email WHERE id = :id') or die(mysql_error());
        $req->execute(array('email' => $email, 'id' => $id));
    }
    else
    {
        $req = $bdd->prepare('UPDATE users SET email = :email, password = :password WHERE id = :id') or die(mysql_error());
        $req->execute(array('email' => $email, 'password' => sha1($password), 'id' => $id));
    }
}

function deleteUser($id)
{
    global $bdd;

    $req = $bdd->prepare('DELETE FROM users WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));
}