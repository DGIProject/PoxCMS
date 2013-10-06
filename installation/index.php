<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 08/09/12
 * Time: 17:16
 * To change this template use File | Settings | File Templates.
 */
$etape_1 = "Départ";
$etape_2 = "Base de donnée";
$etape_3 = "Créer les tables";
$etape_4 = "Identifiants";
$etape_5 = "Terminé";
if (isset($_GET['e'])) {
    $etape_recup = $_GET['e'];
    if ($etape_recup == 1) {
        $etape = $etape_1;
    } elseif ($etape_recup == 2) {
        $etape = $etape_2;
    } elseif ($etape_recup == 3) {
        $etape = $etape_3;
    } elseif ($etape_recup == 4) {
        $etape = $etape_4;
    } elseif ($etape_recup == 5) {
        $etape = $etape_5;
    }

} else {
    $etape = $etape_1;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Installation - Pox CMS - <?php echo $etape; ?></title>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="sql/ajax.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../old/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../old/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../old/css/uniform.css"/>
    <link rel="stylesheet" href="../old/css/unicorn.main.css"/>
    <link rel="stylesheet" href="../old/css/unicorn.grey.css" class="skin-color"/>
<body>
<div id="header">
    <h1><a href="index.php">PoxCMS Admin</a></h1>
</div>

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> Etapes</a>
    <ul>
        <li><a href="#"><?php if ($etape == $etape_1) { ?><img src="../old/images/current.png"> <?php } echo $etape_1; ?>
        </a></li>
        <li><a href="#"><?php if ($etape == $etape_2) { ?><img src="../old/images/current.png"> <?php } echo $etape_2; ?>
        </a></li>
        <li><a href="#"><?php if ($etape == $etape_3) { ?><img src="../old/images/current.png"> <?php } echo $etape_3; ?>
        </a></li>
        <li><a href="#"><?php if ($etape == $etape_4) { ?><img src="../old/images/current.png"> <?php } echo $etape_4; ?>
        </a></li>
        <li><a href="#"><?php if ($etape == $etape_5) { ?><img src="../old/images/current.png"> <?php } echo $etape_5; ?>
        </a></li>
    </ul>
</div>
<div id="content">
    <div id="content-header">
        <h1>Installation</h1>
    </div>
    <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Installation</a>
        <a href="#" class="current"><?php echo $etape; ?></a>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php
                if ($etape == $etape_1)
                {
                    echo '<p>Bonjour et bienvenue sur PoxCMS, il vous permettra de créer votre site simplement avec de nombreux outils. Nous allons démarrer les différentes étapes pour configurer votre CMS. Une base de donnée est nécéssaire.</p><a href="?e=2" class="btn btn-primary btn-large">Démarrer</a>';
                }
                elseif ($etape == $etape_2)
                {
                    echo '<p>La base de donnée est un des élément principal du CMS puisqu\'elle stocke de nombreuses informations comme les identifiants.</p>'; ?>

                    <form method="post" class="form-horizontal" action=""
                          onsubmit="signin(this.action.value,this.hote.value,this.ident.value, this.psw.value, this.bdd.value);return false"
                          name="bdd">
                        <div class="control-group">
                            <label class="control-label">Hote :</label>

                            <div class="controls">
                                <input type="text" name="hote" id="hote">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Identifiant :</label>

                            <div class="controls">
                                <input type="text" id="ident" name="ident">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Mot de passe :</label>

                            <div class="controls">
                                <input type="password" name="psw" id="pass">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Base de donnée :</label>

                            <div class="controls">
                                <input type="text" name="bdd" id="bdd">
                            </div>
                        </div>
                        <div class="control-group">
                            <div id="erreur" style="display: none;"><img src="../old/images/erreur.png" alt="">Impossible de
                                se connecter a la base de données. Verrifiez les identifiant que vous avez fournit !
                            </div>
                            <div id="ok" style="display: none;"><img src="../old/images/valide.png" name="valid"
                                                                     alt="ico-valid-bdd"> Connexion établie vous pouvez
                                continuer <br></div>
                            <div id="msg3" style="display: none;"><img src="../old/images/loading4.gif"></div>
                        </div>
                        <input type="hidden" name="action" value="testbbd">

                        <div class="form-actions">
                            <input type="submit" class="btn btn-info" value="test de connection"
                                   onclick="javascript:document.getElementById('msg3').style.display='';document.getElementById('ok').style.display='none';document.getElementById('erreur').style.display='none';">
                        </div>
                    </form>
                    <form method="get" class="form-horizontal" action="">
                        <input type="hidden" name="e" value="3">

                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary" value="suivant" id="suivant"
                                   disabled="disabled" name="suivant">
                            <input type="button" class="btn" onclick="document.location.href='index.php?e=1'"
                                   value="precedant">
                        </div>
                    </form>

                    <?php
                } elseif ($etape == $etape_3) {
                    ?>

                    Maintenant que la base de donées est prete nous devons installer tous les table qui seront
                    necessaire au bon fonctionnement de GKwiCMS.
                    pour cela cliquez sur le bouton "Installer les données de base" pour preparer la base de donnees.
                    <br>
                    <form method="post" class="form-horizontal" action=""
                          onsubmit="setdbd(this.action.value);return false" name="bdd_data">
                        <div class="control-group">
                            <div class="control-label">
                                <div id="erreur1" style="display: none;"><img src="../old/images/erreur.png" alt="">Impossible
                                    de se connecter a la base de données. Verrifiez les identifiant que vous avez
                                    fournit !
                                </div>
                                <div id="ok1" style="display: none;"><img src="../old/images/valide.png" name="valid"
                                                                          alt="ico-valid-bdd"> Connexion établie vous
                                    pouvez continuer <br></div>
                                <div id="msg31" style="display: none;"><img src="../old/images/loading4.gif"></div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="action" value="setbdd">
                            <input type="submit" class="btn btn-primary" value="Installer les données de base"
                                   onclick="javascript:document.getElementById('msg31').style.display='';document.getElementById('ok1').style.display='none';document.getElementById('erreur1').style.display='none';">
                        </div>
                    </form>
                    <br><br>Une fois que vous avez cliquer sur le bouton veuillez patienter afin que notre systeme mette
                    en place les données de base.<br>
                    <form action="?e=4" class="form-horizontal" method="get">
                        <input type="hidden" name="e" value="4">

                        <div class="form-actions">
                            <input type="button" name="prec" class="btn" value="précedant"
                                   onclick="document.location.href='index.php?e=2'">
                            <input type="submit" class="btn btn-primary" value="suivant" name="suiv" id="suiva"
                                   disabled="disabled">
                        </div>

                    </form>


                    <?php
                } elseif ($etape == $etape_4) {
                    ?>
                    dans cette partie de la configuration nous allons mettre en place les identifiant qui cous
                    permettrons dacceder a lespace dadministration.
                    <br>vous allez renseigner un email un mot de passe et un identifiant. ( lemain servira pour faire
                    des alerte et des recapitualitif de vos modifiactions )
                    <br><br>
                    <form action="save_ident.php" class="form-horizontal" method="post">
                        <?php
                        if ($_GET['ok'] == "1") {
                            echo "une erreur c'est prduite veuillez verrifier vos informations";
                        } else {

                        }


                        ?>
                        <div class="control-group">
                            <label class="control-label">identifiant: </label>

                            <div class="controls">
                                <input type="text" name="pseudo" id="identif">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Mot de passe: </label>

                            <div class="controls">
                                <input type="password" name="mdp" id="passe">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email : </label>

                            <div class="controls">
                                <input type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" class="btn-primary btn" name="sub" id="subscribadm"
                                   value="crer les identifiant">
                        </div>
                    </form>

                    <?php
                } elseif ($etape == $etape_5) {
                    ?>

                    <center>
                        <img src="../old/images/valid_end.png" alt="valide"><br>
                        l'instalation est maintenant terminé. il ne vous reste q'une chose a faire:
                        vous devez suprimer le dossier instalation. car sinon lorsque q'un client se connectera sur
                        votre site
                        il tombera sur la page d'instalation lui disant que le site est installer et qu'il faut suprimer
                        le dossier.

                        <br><br>Nous vous invitons a aller sur l'interface d'administration afin de commencer vos page
                        et bien d'autre.
                        <a href="../admin/">aller a l'interface d'admonistration</a>
                        <br><img src="../old/images/atten.png" alt="attention">
                        avant de cliquer sur le lien assurez vous de bien avoir suprimer le dossier d'installation.
                        <br> vous ne pourez pas vous connectez dans l'interface d'administration si se dossierr n'est
                        suprimer.<br>
                    </center>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../old/js/jquery.min.js"></script>
<script type="text/javascript" src="../old/js/jquery.ui.custom.js"></script>
<script src="../old/js/bootstrap.min.js"></script>
<script src="../old/js/unicorn.js"></script>
<script src="../old/js/unicorn.interface.js"></script>
</body>
</html>