<?php 

include 'function.php';

if ($_GET['add'] == 1)
{
	if ($_POST['password1'] == $_POST['password2'])
		{
						add_user($_POST['username'], $_POST['password1'], $_POST['mail1']);	
		}
		else
		{
			echo 'les mot de passe ne sont pas identique ! l inscription a echouer veuillez recomencer !';
			
		}
}

?><html>
<head>
	<title>ajout utilisateur</title>
</head>
	<body>
		<form action="?add=1" method="post">
			<label for="user">UserName</label><input type="text" name="username" id="user"/><br>
			<label for="pass1">mot de passe</label><input type="password" name="password1" id="pass2"/><br>
			<label for="pass2">confirmation</label><input type="password" name="password2" id="pass2"/><br>
			<label for="mail">email</label><input type="text" name="mail1" id="mail"/><br>
			<input type="submit" value="ajouter !">
		</form>
	</body>
</html>