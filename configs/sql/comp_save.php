<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 14/09/12
 * Time: 17:57
 * To change this template use File | Settings | File Templates.
 */



function bdd_conect()
{
    $fp = fopen("../configs/sql/sql_config.conf","r+"); //lecture du fichier
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
    try
    {

        $bdd = new PDO('mysql:host='.$host.';dbname='.$base , $ident , $pass);
        return $bdd;

    }
    catch(Exception $e)
    {

        die('Erreur : '.$e->getMessage());

    }
}