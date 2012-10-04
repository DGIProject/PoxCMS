<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 14/09/12
 * Time: 17:52
 * To change this template use File | Settings | File Templates.
 */

include "../configs/sql/comp_save.php";

if(isset($_POST['pseudo']) AND isset($_POST['mdp']) AND isset($_POST['email']))
{
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];
    $mdp_h = sha1($mdp);

    $bdd = bdd_conect();
    $req = $bdd->prepare("INSERT INTO users(id,pseudo,email,ran,mdp) values('',:pseudo,:email,'admin',:mdp)");
    $req->bindParam(':pseudo',$pseudo);
    $req->bindParam(':email', $email);
    $req->bindParam(':mdp', $mdp_h);
    $req->execute();

    header('Location: index.php?e=5');

}
else
{
    header('Location: index.php?e=4&ok=1');
}
