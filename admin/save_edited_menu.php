<?php
include "function.php";


$bbd = bdd_conect();


if (isset($_POST['save'])) {

    $occurence = $_POST['numberofelemt'];
    $id = $_POST['id'];
    $i = 0;
    while ($i < $occurence) {
        $nameofelement = 'pageforelement' . $i;
        $inputref = 'input' . $i;
        $req = $bbd->prepare("UPDATE menu set link=:page where parrent= :id  AND input = :inputtext");
        $page = $_POST[$nameofelement];
        $linkforpage = md5($page) . ".html";
        $req->execute(array('page' => $linkforpage, 'id' => $id, 'inputtext' => $_POST[$inputref]));
        $i++;

    }

    echo '<script type="text/javascript">window.location="index.php"</script>';
}