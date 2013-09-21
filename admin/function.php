<?php
session_start();
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 15/09/12
 * Time: 15:07
 * To change this template use File | Settings | File Templates.
 */
include "../configs/sql/comp_save.php";

function ident($identifiant, $passwaord)
{
    $bdd = bdd_conect();
    $pseudo = $identifiant;
    $pass_hache = sha1($passwaord);


    $req = $bdd->prepare('SELECT * FROM users WHERE pseudo = :pseudo AND mdp = :pass');
    $req->execute(array(
        'pseudo' => $pseudo,
        'pass' => $pass_hache));
    $billets = $req->fetchAll();
    if (!$billets) {
        $result = '<font color="red"> Mauvais identifiant ou mot de passe !</font>';
    } else {
        $_SESSION['pseudo'] = $pseudo;
        $result = '<font color="green">Vous etes connecté</font>';
        header("Location: admin.php");
    }
    return $result;
}

function save_file_to_bdd($titre, $titre_cl)
{
    $bdd = bdd_conect();
    $req = $bdd->prepare('SELECT COUNT(*) AS exist FROM page WHERE link=:link');
    $req->execute(array('link' => $titre));
    $retour_bbd = $req->fetch();
    if (!$retour_bbd['exist']) {
        $req = $bdd->prepare("INSERT INTO page(id,titre,link,dte) VALUES('',:titre,:link,CURDATE())");
        $req->execute(array(
            'titre' => $titre_cl,
            'link' => $titre
        ));
    }
}

function save_to_file($titre, $texte)
{

    $file_name = md5($titre);
    $file_name_ex = $file_name . ".html";
    $chemin = "../pages/" . $file_name . ".html";
    $fichier_conf = fopen($chemin, "w+");
    fseek($fichier_conf, 0); // On remet le curseur au début du fichier


    if (fputs($fichier_conf, $texte)) {
        save_file_to_bdd($file_name_ex, $titre);
        return "votre page est disponible ici :" . $file_name;
    } else {
        return false;
    }


}

function get_liste_page()
{
    $bdd = bdd_conect();
    $req = $bdd->prepare("SELECT * FROM page");
    $req->execute();
    $liste_page = $req->fetchAll();
    return $liste_page;

}

function load_page($page)
{
    $file_name = md5($page);
    $chemin = "../pages/" . $file_name . ".html";
    $file = file_get_contents($chemin);
    $texte_html = stripslashes($file);
    return $texte_html;

}

function load_any_pages($link)
{
    $file = file_get_contents($link);
    $texte_html = stripslashes($file);
    return $texte_html;

}

function delete_fichier($page)
{
    $ouverture = opendir("../pages"); // On ouvre le dossier (dans une variable qui sera utilisée par la suite).
    $page_md5 = md5($page);
    $path = '../pages/' . $page_md5 . '.html';
    if (unlink($path)) {
        del_page_bdd($page_md5 . '.html');
        return 'Le fichier a été suprimer avec succe';
    } else {
        return false;
    }
    closedir($ouverture); // On ferme le dossier.
}

function del_page_bdd($md5)
{
    $bdd = bdd_conect();
    $req = $bdd->prepare("DELETE from page WHERE link=:link");
    $req->execute(array(
        'link' => $md5
    ));
}

function def_home_page($page)
{
    $link = md5($page) . '.html';
    $bdd = bdd_conect();
    $req = $bdd->prepare("UPDATE menu set homepage=0 where homepage=1");
    $req->execute();
    $req = $bdd->prepare("UPDATE menu set homepage=1 where link=:link");
    $req->execute(array(
        'link' => $link
    ));
    return true;
}

function add_user($name, $pass, $email)
{
    $bdd = bdd_conect();
    $passh = sha1($pass);
    //echo $passh.' '.$name.' '.$email;
    $req = $bdd->prepare("INSERT INTO users(id,pseudo,email,ran,mdp) values('',:pseudo,:email,'admin',:mdp)");
    $req->bindParam(':pseudo', $name);
    $req->bindParam(':email', $email);
    $req->bindParam(':mdp', $passh);
    $req->execute();
}

function get_user_list()
{
    $bdd = bdd_conect();
    $req = $bdd->prepare('SELECT * FROM users');
    $req->execute();
    $liste_users = $req->fetchAll();
    return $liste_users;
}
function get_user_info_by_id($id)
{
    $bdd = bdd_conect();
    $req = $bdd->prepare("SELECT * FROM users WHERE id=:id");
    $req->bindParam(':id', $id);
    $req->execute();
    $user_info = $req->fetchAll();
    return $user_info;
}
function update_user($username, $pass, $email)
{

    $bdd = bdd_conect();
    if ($pass != null)
    {
        $req = $bdd->prepare("UPDATE users SET mdp=:mdp and email=:email and pseudo=:pseudo");
        $passh = sha1($pass);
        $req->bindParam(':mdp', $passh);
    }
    else
    {
        $req = $bdd->prepare("UPDATE users SET email=:email and pseudo=:pseudo");
    }
    $req->bindParam(':pseudo', $username);
    $req->bindParam(':email', $email);
    $req->execute();
}
function get_contact_mails()
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('SELECT * FROM users ORDER BY id') or die(mysql_error());
    $req->execute();

    while ($donnees = $req->fetch())
    {
        echo '<option>' . $donnees['pseudo'] . '</option>';
    }

    $req->closeCursor();
}

function get_mails($page)
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('SELECT COUNT(*) AS id FROM mails WHERE receiver = :receiver OR sender = :sender AND id_answer = NULL ORDER BY id DESC') or die(mysql_error());
    $req->execute(array('receiver' => $_SESSION['pseudo'],
        'sender' => $_SESSION['pseudo']));

    while ($donnees = $req->fetch())
    {
        $total = $donnees['id'];
    }

    $messagesParPage=10;
    $nombreDePages=ceil ($total/$messagesParPage);

    if ($page)
    {
        $pageActuelle=intval ($page);

        if ($pageActuelle>$nombreDePages)
        {
            $pageActuelle=$nombreDePages;
        }
    }
    else
    {
        $pageActuelle=1;
    }

    $premiereEntree=($pageActuelle-1)*$messagesParPage;

    $req = $bdd->prepare('SELECT * FROM mails WHERE receiver = :receiver OR sender = :sender ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'') or die(mysql_error());
    $req->execute(array('receiver' => $_SESSION['pseudo'],
        'sender' => $_SESSION['pseudo']));

    echo '<table id="listmails" class="table table-bordered" >
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Object</th>
                    <th>date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

    while ($donnees = $req->fetch())
    {
        $date = $donnees['date'];
        $date = date("d.m.Y H:i", $date);

        if($donnees['id_answer'] == NULL)
        {
            if($donnees['sender'] != $_SESSION['pseudo'] && $donnees['read_mail'] != '1')
            {
                echo '<tr class="success" id="'.$donnees["id"].'">';
            }
            else
            {
                echo '<tr id="'.$donnees["id"].'">';
            }

            echo '<td><a href="?id=' . $donnees['id'] . '" class="btn" style="width: 200px;">' . $donnees['sender'] . '</a></td>
                  <td>' . $donnees['object'] . '</td>
                  <td>' . $date . '</td>
                  <td>
                        <button type="button" onclick="deleteThis(' . $donnees['id'] .');"class="btn"><i class="icon-remove"></i></button>
                  </td>
                  </tr>';
        }
    }

    echo '</tbody></table>';

    $req->closeCursor();

    $_SESSION['number_page'] = $nombreDePages;
    $_SESSION['current_page'] = $pageActuelle;

}

function number_page_mails()
{
    $nombreDePages = $_SESSION['number_page'];
    $pageActuelle = $_SESSION['current_page'];

    echo  '<center><a href="?type=mails" class="btn"><i class="icon-refresh"></i></a><div class="pagination">
  <ul><li><a href="?page=1">befor</a></li>';
    for ($i=1; $i<=$nombreDePages; $i++)
    {
        if ($i==$pageActuelle)
        {
            echo  '<li class="active"><a>'.$i.'</a></li>';
        }
        else  //Sinon...
        {
            echo  '<li><a href="?page=' . $i . '">'.$i.'</a></li>';
        }
    }
    $pageend = $i - 1;
    echo  '<li><a href="?page=' . $pageend . '">Next</a></li></ul>
           </div></center>';
}

function get_number_mails()
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('SELECT * FROM mails WHERE receiver = ? ORDER BY id') or die(mysql_error());
    $req->execute(array($_SESSION['pseudo']));

    $number_new_mail = 0;

    while ($donnees = $req->fetch())
    {
        if($donnees['read_mail'] != '1')
        {
            $number_new_mail++;
        }
    }

    $req->closeCursor();


      return  $number_new_mail;



}

function get_info_mails($id)
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('SELECT * FROM mails WHERE id = ?') or die(mysql_error());
    $req->execute(array($id));

    $donnees = $req->fetch();

    if($donnees['sender'] == $_SESSION['pseudo'] || $donnees['receiver'] == $_SESSION['pseudo'])
    {
        $date = $donnees['date'];
        $date = date("d.m.Y H:i", $date);

        echo '<h1>Objet : ' . $donnees['object'] . '</h1>
              <div id="breadcrumb">
                <a href="#" title="Go to subject list" class="tip-bottom"><i class="icon-home"></i>Inbox</a>
                <a href="?id=' . $donnees['id'] . '" class="current">' . $donnees['object'] . '</a>
              </div>
              </br>
              <div class="alert alert-info">
                <h4>' . $donnees['sender'] . '</h4>
                ' . $donnees['body'] . '</br><em>Le ' . $date . '</em>
              </div>';

        get_info_mails_rep($id,$donnees['sender']);
    }
    else
    {
        echo '<script type="text/javascript">window.top.window.location.href = "?";</script>';
    }

    $req->closeCursor();
}

function get_info_mails_rep($id,$contact)
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('SELECT * FROM mails WHERE id_answer = ? ORDER BY id') or die(mysql_error());
    $req->execute(array($id));

    while ($donnees = $req->fetch())
    {
        $date = $donnees['date'];
        $date = date("d.m.Y H:i", $date);

        echo '</br>
              <h4>' . $donnees['object'] . '</h4>';

        if($donnees['receiver'] == $_SESSION['pseudo'])
        {
            if($donnees['read_mail'] != '1')
            {
                echo '<div class="alert alert-success">';
            }
            else
            {
                echo '<div class="well">';
            }
        }
        else
        {
            echo '<div class="well">';
        }

        echo '<h4>' . $donnees['sender'] . '</h4>
                ' . $donnees['body'] . '</br>
                <div class="pull-right">
                    <em>Le ' . $date . '</em>
                </div>
              </div>';
    }

    $req->closeCursor();

    echo '<script src="../ckeditor/ckeditor.js"></script>
          <form name="formulaire" enctype="application/x-www-form-urlencoded" method="post" action="mailsActions.php?a=answermails">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="receiver" value="' . $contact . '"/>
                <input type="text" name="object" style="width: 900px;" placeholder="Object">
                <p>
                    <textarea id="editor1" name="body"></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( "editor1" );
                    </script>
                </p>
                <center>
                    <div class="btn-group">
                        <input name="Submit" value="Envoyer le message" type="submit" class="btn btn-primary">
                        <a href="?id=' . $id . '" class="btn"><i class="icon-refresh"></i></a>
                        <form method="POST" action="mailsActions.php?a=deletemails">
                        <input type="hidden" name="id" value="' . $id . '"/>
                        <button type="submit" class="btn"><i class="icon-remove"></i></button>
                    </form>
                    </div>
                </center>
            </form>';

    get_mail_read($id);
}

function get_mail_read($id)
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('SELECT receiver FROM mails WHERE id = ? ORDER BY id') or die(mysql_error());
    $req->execute(array($id));

    while ($donnees = $req->fetch())
    {
        if($donnees['receiver'] == $_SESSION['pseudo'])
        {
            $req = $bdd->prepare('UPDATE mails SET read_mail = "1" WHERE id = ?');
            $req->execute(array($id));
        }
    }

    $req->closeCursor();

    $req = $bdd->prepare('SELECT receiver FROM mails WHERE id_answer = ? ORDER BY id') or die(mysql_error());
    $req->execute(array($id));

    while ($donnees = $req->fetch())
    {
        if($donnees['receiver'] == $_SESSION['pseudo'])
        {
            $req = $bdd->prepare('UPDATE mails SET read_mail = "1" WHERE id_answer = ?');
            $req->execute(array($id));
        }
    }

    $req->closeCursor();
}
function getTemplate()
{
    $bdd = bdd_conect();
    $req = $bdd->prepare('SELECT * FROM template') or die(mysql_error());
    $req->execute();
    $retour = $req->fetchAll();
    return $retour;
}
function testMenu()
{
    $bdd = bdd_conect();

    $req = $bdd->prepare('SELECT COUNT(*) as numberofligne FROM menu') or die(mysql_error());
    $req->execute();
    $result = $req->fetch();
    if ($result['numberofligne'] == 0)
    {
        return false;
    }
    else{
        return true;
    }
}
function changeTemplate($templateId)
{
    $bdd = bdd_conect();
    $req = $bdd->prepare('UPDATE menu SET template=? WHERE template!= "" ') or die(mysql_error());
    $req->execute(array($templateId));
    return true;
}
function deleteUser($userId)
{
    $bdd = bdd_conect();
    $req = $bdd->prepare('DELETE FROM users WHERE id=? ') or die(mysql_error());
    $req->execute(array($userId));
    return true;
}
