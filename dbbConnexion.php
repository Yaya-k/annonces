<?php
/**
 * Created by PhpStorm.
 * User: yayak
 * Date: 25/09/2019
 * Time: 15:16
 */
try // ici je me connecte a la base
{
    $bdd = new PDO('mysql:host=localhost;dbname=ykamis;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// ici je me connecte a la base annonce_en_cours



