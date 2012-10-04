<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 16/09/12
 * Time: 07:19
 * To change this template use File | Settings | File Templates.
 */
include ("function.php");
session_start();
if ($_SESSION['pseudo'] != NULL )
{

    if (isset($_POST['content']) AND isset($_POST['titre']))
    {
        $texte_html = stripslashes($_POST['content']);
        $retour =  save_to_file($_POST['titre'],$_POST['content']);
        echo $retour;
        echo '<form action="admin.php">
        <input type="submit" value="Retour">
        </form> ';
    }
}
else
{
    echo '<script type="text/javascript">window.location="index.php"</script>';}