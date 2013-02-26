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
<!DOCTYPE html>
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
			 
			$('#content1').elrte(opts);
	
			// or this way
			// var editor = new elRTE(document.getElementById('our-element'), opts);
		});	 
	 </script>
       <title>Ajouter une page - PoxAdmin</title>
       <meta charset="UTF-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <link rel="stylesheet" href="css/bootstrap.min.css" />
       <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
       <link rel="stylesheet" href="css/uniform.css" />
       <link rel="stylesheet" href="css/select2.css" />
       <link rel="stylesheet" href="css/unicorn.main.css" />
       <link rel="stylesheet" href="css/unicorn.grey.css" class="skin-color" />
   </head>
   <body>
   <?php include "interface.php"; ?>
   <div id="content">
       <div id="content-header">
           <h1>Dashboard</h1>
           <div class="btn-group">
               <a class="btn btn-large tip-bottom" title="Manage Pages" href="pages.php"><i class="icon-file"></i></a>
               <a class="btn btn-large tip-bottom" title="Manage Users" href="users.php"><i class="icon-user"></i></a>
               <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-folder-open"></i></a>
           </div>
       </div>
       <div id="breadcrumb">
           <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
           <a href="#" class="current">Dashboard</a>
       </div>
       <div class="container-fluid">
           <div class="row-fluid">
               <div class="span12">
                   Pour ajouter une page vous devez entrer le titre de la page et ecrire son contenu dans l'editeur de texte enrichi.<br/>
                   <form class="form-horizontal" action="savepage.php" method="post">
                       <div class="control-group">
                           <label class="control-label">Titre de la page</label>
                           <div class="controls">
                               <input type="text" name="titre" id="titre">
                           </div>
                       </div>
                       <div class="control-group">
                           <label class="control-label">Contenu de la page</label>
                           <div class="controls">
                               <textarea name="content" id="content1">
                                   taper votre texte ici et utilisez les outil qui sont a votre dispositions !
                               </textarea>
                           </div>
                       </div>
                       <div class="form-actions">
                           <input type="submit" value="créer la page" name="send" class="btn btn-primary">
                       </div>
                   </form>
                   </div>
               </div>
           </div>
       </div>


   </body>
   </html>
<?php
}
else
{
    echo '<script type="text/javascript">window.location="index.php"</script>';
}
