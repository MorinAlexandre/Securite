<?php

/**
 * Connexion à la base de données
 */
try {
    $host     = 'localhost';
    $user     = 'root';
    $password = '';
    $dbname   = 'ouvrages';

    $oConnexion = new PDO(
        'mysql:host=' . $host . ';dbname=' . $dbname,
        $user,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );
    $oConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die('Connection failed or database cannot be selected : ' . $e->getMessage());
}
