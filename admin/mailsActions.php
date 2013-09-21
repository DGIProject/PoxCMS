<?php
include "function.php";
$date = time();
if($_GET['a'] == 'addmails')
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('INSERT into mails (sender,receiver,object,body,date) values (:sender,:receiver,:object,:body,:date)') or die(mysql_error());
    $req->execute(array('sender' => $_SESSION['pseudo'],
        'receiver' => $_POST['receiver'],
        'object' => $_POST['object'],
        'body' => $_POST['body'],
        'date' => $date));

    $_SESSION['result'] = 'addmails_co';
    echo '<script type="text/javascript">window.top.window.location.href = "mails.php";</script>';
}
elseif($_GET['a'] == 'answermails')
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('INSERT into mails (id_answer,sender,receiver,object,body,date) values (:id_answer,:sender,:receiver,:object,:body,:date)') or die(
    mysql_error());
    $req->execute(array('id_answer' => $_POST['id'],
        'sender' => $_SESSION['pseudo'],
        'receiver' => $_POST['receiver'],
        'object' => $_POST['object'],
        'body' => $_POST['body'],
        'date' => $date));

    $_SESSION['result'] = 'answermails_co';
    echo '<script type="text/javascript">window.top.window.location.href = "mails.php?id=' . $_POST['id'] . '";</script>';
}
elseif($_GET['a'] == 'deletemails')
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('SELECT * FROM mails WHERE id = ?') or die(mysql_error());
    $req->execute(array($_POST['id']));

    while ($donnees = $req->fetch())
    {
        if($donnees['sender'] == $_SESSION['pseudo'] || $donnees['receiver'] == $_SESSION['pseudo'])
        {
            $req = $bdd->prepare('DELETE FROM mails WHERE id = ?') or die(mysql_error());
            $req->execute(array($_POST['id']));

            $req = $bdd->prepare('DELETE FROM mails WHERE id_answer = ?') or die(mysql_error());
            $req->execute(array($_POST['id']));

            $_SESSION['result'] = 'deletemails_co';
            echo 'true';
        }
        else
        {
            echo '<script type="text/javascript">window.top.window.location.href = "mails.php";</script>';
        }
    }

    $req->closeCursor();
}