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
        return "votre page est disponible ici :" . $chemin;
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