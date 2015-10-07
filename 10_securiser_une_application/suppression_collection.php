<?php
require('include/connexion.php');

$bSupprimer = false;
/**
 * Vérifie si un identifiant de collection est fourni
 * et si celui-ci est bien un entier
 */
$iIdentifiant = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if (isset($_GET['id']) && false !== $iIdentifiant) :
    /**
     * Supprime les ouvrages de la collection
     */
    $sRequeteSql = 'DELETE FROM ouvrage WHERE collection_id = ' . $iIdentifiant;
    $oConnexion->query($sRequeteSql);

    /**
     * Supprime la collection
     */
    $sRequeteSql = 'DELETE FROM collection WHERE id = ' . $iIdentifiant;
    $oConnexion->query($sRequeteSql);
    $bSupprimer = true;
endif;

header('Location: index.php?page=collection.php&etat_suppression=' . (int) $bSupprimer);