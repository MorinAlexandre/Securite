<?php 
session_start();
require 'include/connexion.php';

/**
 * Vérification des paramètres pour l'identification
 * et identification si tout est conforme
 */
if (isset($_POST['identifier'])) {
    if (isset($_POST['identifiant']) && isset($_POST['mdp'])) {
        $sRequeteSql = 'SELECT id, identifiant, mdp FROM utilisateur WHERE identifiant = ? AND mdp = ? LIMIT 1';
        $rStat = $oConnexion->prepare($sRequeteSql);
        $rStat->execute(array($_POST['identifiant'], $_POST['mdp']));
        $aUtilisateur = $rStat->fetch(PDO::FETCH_ASSOC);

        if (!empty($aUtilisateur)) {
            $_SESSION['utilisateur'] = $aUtilisateur;
            header('Location: index.php');
            exit();
        }
    }
}

header('Location: index.php?page=identification.php&error=1');