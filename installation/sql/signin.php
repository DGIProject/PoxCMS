<?php
//include "../../configs/sql/sql_config.php";

$action = $_POST['action'];
if ($action == "testbbd")
{
    $host = $_POST['host'];
    $base = $_POST['bdd'];
    $ident = $_POST['ident'];
    $mdp = $_POST['pass'];
    $ok=0;
  if ($host != NULL && $base != NULL && $ident != NULL && $mdp != NULL)
  {
      try
      {

          $bdd = new PDO('mysql:host='.$host.';dbname='.$base , $ident , $mdp);

      }
      catch(Exception $e)
      {
          //  die('Erreur : '.$e->getMessage());
          if ($e != null)
          {

              $ok=1;
          }
      }
      if($ok == 0)
      {
          echo "ok";

      }
      else
      {
          echo "not";
      }

  }
  else
  {
        echo "false";
  }
}
elseif ($action == "setbdd")
{

    $fp = fopen("../../configs/sql/sql_config.conf","r"); //lecture du fichier
    while (!feof($fp)) { //on parcourt toutes les lignes
        $page .= fgets($fp, 4096); // lecture du contenu de la ligne
    }

    $host_resh = eregi("<host>(.*)</host>",$page,$regs); //on isole le titre
    $host = $regs[1];
    //  echo $host;
    $base_resh = eregi("<base>(.*)</base>",$page,$regs);
    $base = $regs[1];
    // echo $base;
    $pass_resh = eregi("<pass>(.*)</pass>",$page,$regs);
    $pass = $regs[1];
    //  echo $pass;
    $ident_resh = eregi("<ident>(.*)</ident>",$page,$regs);
    $ident = $regs[1];
    //  echo $ident;
    fclose($fp);

    $ok=0;
        try
        {

            $bdd = new PDO('mysql:host='.$host.';dbname='.$base , $ident , $pass);

        }
        catch(Exception $e)
        {
            //  die('Erreur : '.$e->getMessage());
            if ($e != null)
            {

                $ok=1;
            }
        }
        if($ok == 0)
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
}

?>
