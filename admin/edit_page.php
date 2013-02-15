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
		<link rel="stylesheet" href="../elrte/css/smoothness/jquery-ui-1.8.13.custom.css" type="text/css" media="screen" charset="utf-8">
		<link rel="stylesheet" href="../elrte/css/elrte.min.css" type="text/css" media="screen" charset="utf-8">
		<script src="../elrte/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../elrte/js/jquery-ui-1.8.13.custom.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../elrte/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
		
		<link rel="stylesheet" type="text/css" media="screen" href="../elrte/css/elfinder.min.css">
		<script type="text/javascript" src="../elrte/js/elfinder.min.js"></script>		
		
		<script type="text/javascript" charset="utf-8">
		 $().ready(function() {
			  var opts = {
				 lang         : 'fr',   // set your language
				 styleWithCSS : false,
				 height       : 400,
				 toolbar      : 'maxi',
				 fmAllow : true,
				 fmOpen : function(callback) {
						$('<div />').dialogelfinder({
						url: '../elrte/php/connector.php',
						commandsOptions: {
							getfile: {
								oncomplete: 'destroy' // destroy elFinder after file selection
							}
						},
						getFileCallback: callback // pass callback to file manager
						});
				 }
			 };	
			 
			$('#content').elrte(opts);
	
			// or this way
			// var editor = new elRTE(document.getElementById('our-element'), opts);
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
        <textarea id="content" name="content" >
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