<?php
/**
 * Created by PhpStorm.
 * User: yayak
 * Date: 21/10/2019
 * Time: 17:37
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

