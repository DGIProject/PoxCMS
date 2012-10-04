<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 26/09/12
 * Time: 18:35
 * To change this template use File | Settings | File Templates.
 */

include "function.php";

if ($_SESSION['pseudo'] != NULL)
{
    if (isset($_POST['page']))
    {
        $page = $_POST['page'];
        $retour = delete_fichier($page);
        echo $retour;
        echo '<form action="admin.php">
        <input type="submit" value="Retour">
        </form> ';
    }
}
else
{
    echo '<script type="text/javascript">window.location="index.php"</script>';
}