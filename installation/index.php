<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 08/09/12
 * Time: 17:16
 * To change this template use File | Settings | File Templates.
 */
$etape_1 = "choix de la langue";
$etape_2 = "configuration partie 1";
$etape_3 = "configuration partie 2";
$etape_4 = "creation des identifiant admin";
$etape_5 = "terminée !";
if (isset($_GET['e']))
{
    $etape_recup = $_GET['e'];
    if($etape_recup == 1)
    {
        $etape = $etape_1;
    }
    elseif ($etape_recup == 2)
    {
        $etape = $etape_2;
    }
    elseif ($etape_recup == 3)
    {
        $etape = $etape_3;
    }
    elseif ($etape_recup == 4)
    {
        $etape = $etape_4;
    }
    elseif ($etape_recup == 5)
    {
        $etape = $etape_5;
    }

}
else
{
    $etape = $etape_1;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Installation - PoxCMS - <?php echo $etape; ?></title>
    <meta charset="utf-8" />
    <script type="text/javascript" src="sql/ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<body>

<div id="bloc_etape">
    <ul>
        <li><?php if ($etape == $etape_1){?><img src="../images/current.png"><?php } echo $etape_1; ?></li>
        <li><?php if ($etape == $etape_2){?><img src="../images/current.png"><?php } echo $etape_2; ?></li>
        <li><?php if ($etape == $etape_3){?><img src="../images/current.png"><?php } echo $etape_3; ?></li>
        <li><?php if ($etape == $etape_4){?><img src="../images/current.png"><?php } echo $etape_4; ?></li>
        <li><?php if ($etape == $etape_5){?><img src="../images/current.png"><?php } echo $etape_5; ?></li>
    </ul>
</div>
<div id="contenu">
    <fieldset>
        <?php
        if($etape == $etape_1)
        {?>

            <p>Bienvenue dans GKwiCMS, c'est un CMS comme tout les autres. Vous pouvez y crer votre site web en toute simplicité.<br>
                Vous pouvez aussi crer votre forum tres simplement. Si vous le souhaitez vous pourrez même avoir les deux ! un forum et aussi une site web.
                Dans cette partie c'est l'heure de la configuration: nous allons commencer par choisir la langue que souhaitez avoir dans les menu de votre site<br> et dans les menu de la page d'administration.<br><br>
                Dans la partie de droite vous pouvez voir la liste des étape qui vous nous permettre de configurer votre CMS.<br><br>
                l'etape actuel est le choix de la langue : a vous de la choisir tranquillement</p><br><br>
            <form method="post" action="?e=2">
                <select>
                    <option>Francais</option>
                    <option>English</option>
                    <option>Español</option>
                </select>
                <input type="submit" value="suivant">
            </form>

    <?php
        }
        elseif ($etape == $etape_2)
        {?>
        Nous allons maintenant configuer la base de donnee.
        Pour cela veuillez entrer les identifiant de la base de donnée dans les champs ci-dessous.<br>

        Nous vous recommandons d'utiliser un base uniquement pour GKwiCMS, mais si vous ne pouvez pas avoir une base dédier uniquement a GKwiCMS nous vous proposerons de mettre un prefixe au taable de données.
        Donc comme nous le disons un peut plus haut vous devez entrer vos identifiant de base de données.
        <form method="post" action="" onsubmit="signin(this.action.value,this.hote.value,this.ident.value, this.psw.value, this.bdd.value);return false" name="bdd">
            <div id="erreur"style="display: none;"><img src="../images/erreur.png" alt="">Impossible de se connecter a la base de données. Verrifiez les identifiant que vous avez fournit !</div>
            <div id="ok"style="display: none;"><img src="../images/valide.png" name="valid" alt="ico-valid-bdd"> Connexion établie vous pouvez continuer <br></div>
            <div id="msg3" style="display: none;"><img src="../images/loading4.gif"></div>

            <label for="hote">hote : </label><input type="text" name="hote" id="hote"><br>
            <label for="ident"> Identfiant :</label><input type="text" id="ident" name="ident"> <br>
            <input type="hidden" name="action" value="testbbd">
            <label for="pass"> Mot de passe :</label><input type="password" name="psw" id="pass"><br>
            <br>
            <label for="bdd">Base de données : </label><input type="text" name="bdd" id="bdd"><br>
            <input type="submit" value="test de connection" onclick="javascript:document.getElementById('msg3').style.display='';document.getElementById('ok').style.display='none';document.getElementById('erreur').style.display='none';">
            <br>
            </form>
            <form method="post" action="?e=3">
            <input type="submit" value="suivant" id="suivant" disabled="disabled" name="suivant"><input type="button" onclick="document.location.href='index.php?e=1'" value="precedant"><br>
            </form>

        <?php
        }
        elseif ($etape == $etape_3)
        {?>

            Maintenant que la base de donées est prete nous devons installer tous les table qui seront necessaire au bon fonctionnement de GKwiCMS.
            pour cela cliquez sur le bouton "Installer les données de base" pour preparer la base de donnees.
        <br><form method="post" action="" onsubmit="setdbd(this.action.value);return false" name="bdd_data">
                <div id="erreur1"style="display: none;"><img src="../images/erreur.png" alt="">Impossible de se connecter a la base de données. Verrifiez les identifiant que vous avez fournit !</div>
                <div id="ok1"style="display: none;"><img src="../images/valide.png" name="valid" alt="ico-valid-bdd"> Connexion établie vous pouvez continuer <br></div>
                <div id="msg31" style="display: none;"><img src="../images/loading4.gif"></div>
                <input type="hidden" name="action" value="setbdd">
                <input type="submit" value="Installer les données de base" onclick="javascript:document.getElementById('msg31').style.display='';document.getElementById('ok1').style.display='none';document.getElementById('erreur1').style.display='none';">
            </form>

                <br><br>Une fois que vous avez cliquer sur le bouton veuillez patienter afin que notre systeme mette en place les données de base.<br>
           <form action="?e=4" method="post"><input type="submit" value="suivant" name="suiv" id="suiva" disabled="disabled"><input type="button" name="prec" value="précedant" onclick="document.location.href='index.php?e=2'"></form>


        <?php
        }
        elseif ($etape == $etape_4)
        {?>
           dans cette partie de la configuration nous allons mettre en place les identifiant qui cous permettrons dacceder a lespace dadministration.
        <br>vous allez renseigner un email un mot de passe et un identifiant. ( lemain servira pour faire des alerte et des recapitualitif de vos modifiactions )
        <br><br>
        <form action="save_ident.php" method="post">
            <?php
            if ($_GET['ok'] == "1")
            {
                echo "une erreur c'est prduite veuillez verrifier vos informations";
            }
        else
        {

        }


        ?>
            <label for="identif">identifiant: </label> <input type="text"name="pseudo" id="identif"><br>
            <label for="passe">mot de passe: </label> <input type="password" name="mdp" id="passe"><br>
            <label for="email">email: </label> <input type="email" name="email" id="email">
            <br><br><input type="submit"name="sub"id="subscribadm" value="crer les identifiant">
        </form>

        <?php
        }
        elseif ($etape == $etape_5)
        {?>

            <center>

                <img src="../images/valid_end.png" alt="valide" ><br>
                l'instalation est maintenant terminé. il ne vous reste q'une chose a faire:
                vous devez suprimer le dossier instalation. car sinon lorsque q'un client se connectera sur votre site
                il tombera sur la page d'instalation lui disant que le site est installer et qu'il faut suprimer le dossier.

                <br><br>Nous vous invitons a aller sur l'interface d'administration afin de commencer vos page et bien d'autre.
                <a href="../admin/">aller a l'interface d'admonistration</a>
                <br><img src="../images/atten.png" alt="attention">
                avant de cliquer sur le lien assurez vous de bien avoir suprimer le dossier d'installation.
                <br> vous ne pourez pas vous connectez dans l'interface d'administration si se dossierr n'est suprimer.<br>
            </center>

            <?php
        }
?>

    </fieldset>
</div>
</body>
</html>