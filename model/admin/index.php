<?php
function connectionAdmin($username, $password)
{
    global $bdd;

    if(empty($username) || empty($password))
    {
        return '<div class="alert alert-danger">Vous devez renseigner tout les champs.</div>';
    }
    else
    {
        $req = $bdd->prepare('SELECT COUNT(*) AS exist, email FROM users WHERE username = :username AND password = :password') or die(mysql_error());
        $req->execute(array('username' => $username,'password' => sha1($password)));

        $data = $req->fetch();

        if($data['exist'] == 0)
        {
            return '<div class="alert alert-danger">Votre pseudo ou mot de passe est incorrect.</div>';
        }
        else
        {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $data['email'];

            header('Location: ../owner');
        }

        $req->closeCursor();
    }
}