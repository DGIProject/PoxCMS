<?php

include "function.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Definition de la page d'accueil</title>
    <meta charset="UTF-8">
</head>
<body>
</body>
</html>

<?php

if ($_SESSION['pseudo'] != NULL) {
    ?>

Sur cette page vous avez la possibilité de definir quelle sera la page d'accueille de votre site internet.
si dessous ce trouve la liste des page deja créer. il vous suffit de choisir dans la liste la page que vous voulez, celle ci s'affichera sur le coté et vous
pourrez la previsualiser.


<form action="?a=def" method="post">
    <select name="pages_selected">
        <?php
        $reponse = get_liste_page();
        foreach ($reponse as $pagess) {
            echo '<option>' . $pagess['titre'] . '</option>';
        }

        ?>
    </select>
    <input type="submit" value="définir la page d'accueil">
</form>
<?php
    if ($_GET['a'] == "def") {
        def_home_page($_POST['pages_selected']);
    }
}


?>