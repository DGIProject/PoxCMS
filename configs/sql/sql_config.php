<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 10/09/12
 * Time: 20:56
 * To change this template use File | Settings | File Templates.
 */

$host = $_POST['host'];
$base = $_POST['bdd'];
$ident = $_POST['ident'];
$pass = $_POST['pass'];


    $phrase = "<host>".$host."</host><ident>".$ident."</ident><pass>".$pass."</pass><base>".$base."</base>";
    $fichier_conf = fopen("../../configs/sql/sql_config.conf", "w+");
    fseek($fichier_conf, 0); // On remet le curseur au début du fichier


    if (fputs($fichier_conf, $phrase))
    {
        echo "true";
    }
    else
    {
        echo "false";
    }





    fclose($fichier_conf);
