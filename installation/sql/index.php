<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<script type="text/javascript" src="ajax.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>S'enregistrer</title>
</head>
<body>
<center>
  <fieldset>
  <legend>S'enregistrer</legend>
  <form method="post" onsubmit="signin(this.pseudo.value,this.email.value,this.password1.value,this.password2.value,this.code.value);return false" action="">
    <div id="msg"></div>
    <table width="500" border="0" cellspacing="0">
      <tr>
        <td>Pseudo:</td>
        <td><input name="pseudo" type="text" /></td>
      </tr>
      <tr>
        <td>e-mail:</td>
        <td><input name="email" type="text" /></td>
      </tr>
      <tr>
        <td>password:</td>
        <td><input name="password1" type="password" /></td>
      </tr>
      <tr>
        <td>retaper password:</td>
        <td><input type="password" name="password2" /></td>
      </tr>
      <tr>
        <td>Code &nbsp;<img src="image_code.php" alt="" /></td>
        <td><input name="code" type="text" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="envoyer"  /></td>
      </tr>
    </table>
  </form>
  </fieldset>
</center>
</body>
</html>
