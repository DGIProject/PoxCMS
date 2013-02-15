<?php
include "function.php";
if ($_SESSION['pseudo'] != NULL)
{
    ?>
<html>
<head>
    <title>Interface d'administration</title>
</head>
<body>
<p>Bienvenue dans l'interface d'amistration : de cette page vous pourrez effectuer de nombreuse chose.
    vous pourrez créer de nouvelle page et des article en passant par la mise en page et l'ajout de certain fichier !</p>
<ul>Liste des actions possible
    <li><a href="add_page.php">ajouter une page</a></li>
    <li>mise en place de base</li>
    <li><a href="edit_page.php">Editer une page</a> </li>
    <li>Element du site</li>
    <li><a href="del_page.php">suprimer une page</a> </li>
    <li><a href="add_menu.php">Ajouter un menu</a> </li>
    <li><a href="edit_menu.php"> editer un menu</a> </li>
	<li><a href="def_home.php">Definir la page d'accueille du site</a></li>
	<li><a href="newUser.php">Ajouter un utilisateur</a></li>
    <li><a href="deco.php">se deconnecter</a> </li>
</ul>
</body>
</html>
<?php }
else
{
    echo '<script type="text/javascript">window.location="index.php"</script>';
}
?>