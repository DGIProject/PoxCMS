<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 15/09/12
 * Time: 15:23
 * To change this template use File | Settings | File Templates.
 */
session_start();
include "function.php";
if ($_SESSION['pseudo'] != NULL)
{?>

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
       <title>ajouter une page</title>
   </head>
   <body>
   <div>
       menu
   </div>
   <div height="500px" width="500px">
       POur ajouter une page vous devez entrer le titre de la page et ecrire son contenu dans l'editeur de texte enrichi.
       <form action="savepage.php" method="post">
         <label for="titre">Titre de la page</label>  <input type="text" name="titre" id="titre"><br>
           <textarea name="content" id="content">
               taper votre texte ici et utilisez les outil qui sont a votre dispositions !
           </textarea>
           <input type="submit" name="send">
       </form>
   </div>

   </body>
   </html>
<?php
}
else
{
    echo '<script type="text/javascript">window.location="index.php"</script>';
}
