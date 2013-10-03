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

function addUser($username, $email, $category, $password1, $password2, $siteId)
{
    if(empty($username) || empty($email) || empty($password1) || empty($password2))
    {
        return '<div class="alert alert-danger"><strong>Erreur!</strong> Vous devez remplir tout les champs.</div>';
    }
    elseif(!preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $email))
    {
        return '<div class="alert alert-danger"><strong>Erreur!</strong> L\'adresse mail est incorrecte.</div>';
    }
    elseif(strlen($password1) < 4)
    {
        return '<div class="alert alert-danger"><strong>Erreur!</strong> Le mot de passe est trop court.</div>';
    }
    elseif($password1 != $password2)
    {
        return '<div class="alert alert-danger"><strong>Erreur!</strong> Les mots de passe ne correspondent pas.</div>';
    }
    else
    {
        global $bdd;

        $req = $bdd->prepare('INSERT INTO users(username, password, email, siteId, category) VALUES (:username, :password, :email, :siteId, :category)') or die(mysql_error());
        $req->execute(array('username' => $username, 'password' => sha1($password1), 'email' => $email, 'siteId' => $siteId, 'category' => $category));

        return '<div class="alert alert-success"><strong>Succès!</strong> Cet utilisateur a été ajouté avec succès.</div>';
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