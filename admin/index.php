<?php

include "function.php";
echo $_SESSION['pseudo'];
if ($_SESSION['pseudo'] != NULL)
{
    echo '<script type="text/javascript">window.location="admin.php"</script>';
}
if (isset($_POST['ident_utilisateur']) AND isset($_POST['pass_utilisateur']))
{
    $result =  ident($_POST['ident_utilisateur'], $_POST['pass_utilisateur']);
}
else
{

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>page d'administration - Connection</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="vue/blog/style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>
        <h1>Interface d'adminitration</h1>
        <p><form action="" method="post">
            <label for="identutil">nom d'utilisateur</label> <input type="text" name="ident_utilisateur"id="identutil"><br>
            <label for="passutil">mot de passe</label> <input type="password" name="pass_utilisateur" id="passutil"><br>
            <input type="submit" name="co">
        </form> </p>


<?php
echo $result;
?>
</body>
</html>
