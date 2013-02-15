<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 22/12/12
 * Time: 07:49
 * To change this template use File | Settings | File Templates.
 */
include "function.php";
$number_of_occurence = $_POST['numbers'];
$title = $_POST['title_post'];

$bbd = bdd_conect();
$req = $bbd->prepare("INSERT into menu(id,title,position) VALUES('',:titre,:posit)");
$req->execute(array(
    'titre' => $title,
    'posit' => $_POST['posit']
));
$req = $bbd->prepare("SELECT id from menu WHERE title=:title");
$req->execute(array(
    'title' => $title
));
$retour_bbd = $req->fetch();
echo $retour_bbd['id'];
$i =0;

while ($i < $number_of_occurence)
{
    $i++;
    echo $i;

    $element = "element_".$i;
    echo $element;
   $req = $bbd->prepare("INSERT into menu(id,input, parrent) VALUES('',:input,:parrent)");
    $req->execute(array(
       'input' => $_POST[$element],
       'parrent' => $retour_bbd['id']
    ));

}
echo '<script type="text/javascript">window.location="edit_menu.php"</script>';
