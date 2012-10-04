<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 26/09/12
 * Time: 17:26
 * To change this template use File | Settings | File Templates.
 */

include "function.php";
?>
<html>
<head>
    <title>suprimer une page</title>
    <script type="text/javascript">
        function visibilite(thingId)
        {
            var targetElement;
            targetElement = document.getElementById(thingId) ;
            if (targetElement.style.display == "none")
            {
                targetElement.style.display = "" ;
            } else {
                targetElement.style.display = "none" ;
            }
        }
    </script>
</head>
<body>
<p>Bienvenue dans la zone de supression des pages :
ici vous pourez suprimer les pages que vous souhaitez.
<br>avant cela vous devez choisir dans la liste ci-dessous la page que vous voulez suprimer</p>
<form action="del_page.php" method="post">
    <select name="pages_selected">
        <?php
        $reponse = get_liste_page();
        foreach($reponse as $pagess)
        {
            echo '<option>'. $pagess['titre'].'</option>';
        }

        ?>
    </select>
    <input type="submit" name="load_page" value="ok">
</form>
<?php

if (isset($_POST['pages_selected']))
{
    echo $_POST['pages_selected'].' :';

?><br>
    <img src="images/atten.png" alt="attention"">

        etes vous sure de vouloir suprimer la page :<strong>
        <?php echo $_POST['pages_selected']; ?></strong> ?
    <img src="images/atten.png" alt="attention">
<br>
    <br><a href="#" onclick="visibilite('page');"> Voir la page</a>
    <br>
        <div id="page" style="width: auto;height: 50%;padding: 10px 10px 10px 10px; display: none;overflow : auto;border-width:2px 2px 2px 2px; border-style:solid dashed;border-color: #4169e1">
            <?php echo load_page($_POST['pages_selected']); ?>
        </div>
        <br>
    <form action="del_exe.php" method="post">
        <input type="hidden" name="page" value="<?php echo $_POST['pages_selected']; ?>">
        <input type="submit" value="Suprimer !" name="surpime" align="left" onclick=" return confirm('Etes vous sur de votre action ? Celle-ci est irreversible !')"><input type="reset" value="NON !" onclick="document.location.href = 'admin.php';"align="right">
    </form>
<?php
}

?>
</body>
</html>
