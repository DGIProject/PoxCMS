<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 30/09/12
 * Time: 08:18
 * To change this template use File | Settings | File Templates.
 */

include "function.php";

if(!$_SESSION['pseudo'])
{
    echo '<script type="text/javascript">window.location="index.php"</script>';
}
print_r($_POST);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un menu</title>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            // Skin options
            skin : "o2k7",
            skin_variant : "silver",

            // Example content CSS (should be your site CSS)
            // content_css : "css/example.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "js/template_list.js",
            external_link_list_url : "js/link_list.js",
            external_image_list_url : "js/image_list.js",
            media_external_list_url : "js/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            }
        });
        
    </script>
    <script type="text/javascript">
    function showLine() {
    
    if ( document.getElementById('title').value != "")
    {
    document.getElementById('lines').style.display = '';
    }	
    else {
    	alert('vous devez remplir le champ de titre');
    }
    }
    function create_champ(i, returnDemand) {

        var i2 = i + 1;

            document.getElementById('lines'+i).innerHTML = 'Element '+i2+'<input type="text" name="element_'+i2+'"></span><br>';
            document.getElementById('lines'+i).innerHTML += (i <= 10) ? '<br><span id="lines'+i2+'"><input type="button" value="Nouvelle line" name="ajout" onclick="create_champ('+i2+')"><input type="hidden" name="numbers" value="'+i2+'"><input type="submit" name="save" value="Sauvegarder le menu"></span>' : '';

    }
    </script>
</head>
<body>
<p>
<br /><br />
depuis cette page vous pouvez ajouter des menu a votre site web , en plus de pouvoir en ajouter vous pouvez les positionner et les modifier en fonction des template:
<br />
pour commencer il vous dait choisir un tire pour le menu, celui ci ne sera pas affiche lais servira de desvription. purement de repere dans la liste des menu si vous en avez plusieurs. 

<form method="post" action="save_menu.php">
<label for="title">Titre ou courte description :</label><input id="title" type="text" name="title_post" value="" /><br>
<label for="positi">postition dans la page</label><select name="posit" id="positi"><option>Haut</option><option>Droite</option><option>Gauche</option><option>Bas</option></select>
<input type="button" name="next" value="suivant" onclick="showLine()" />
<br />
<div id="lines" style="display :none;">
    <br>Entrer les diferents element de votre menu pour l'instant vous etes limité a 10 elements.<br>
    Element 1 :<input type="text" name="element_1" value="" /><br>
    <span id="lines1"><input type="button" value="Nouvelle line" name="ajout" onclick="create_champ(1)"><br></span>
</div>
</form>
</body>
</html>