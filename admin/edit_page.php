<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 16/09/12
 * Time: 20:46
 * To change this template use File | Settings | File Templates.
 */

include "function.php";

?>
<html>
<head>
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
    <title>editer une page</title>
</head>
<body>
<p>Bienvenue dans la zone d'edition de page :
ici vous pourez editer les page que vous souhaitez.
<br>avant cela vous devez choisir dans la liste ci-dessous la page que vous voulez editer</p>
<form action="edit_page.php" method="post">
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
?>
    <form action="save_edited_file.php" method="post">
        <textarea class="content" name="content" >
            <?php
            echo load_page($_POST['pages_selected']);
?>
        </textarea>
        <input type="hidden" name="selected" value="<?php echo $_POST['pages_selected']  ;?>">
        <input type="submit" name="save_file_page" value="sauvegarder">
    </form>
<?php
}

?>
</body>
</html>