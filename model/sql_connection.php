<?php session_start();

try
{
    $bdd = new PDO('mysql:host=mysql2.alwaysdata.com;dbname=loquii_cms' , 'loquii_cms' , 'loquiicms');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}