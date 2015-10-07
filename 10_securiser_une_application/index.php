<?php
session_start();

/**
 * Si l'utilisateur se rend sur la page d'identification,
 * déjà identifié, il est redirigé vers la page d'accueil
 */
if ('identification' === $_GET['page']
    && isset($_SESSION['identifie']) && true === $_SESSION['identifie']) {

    header('Location: index.php');
}

require 'include/connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta http-equiv="Content-Language" content="fr" />
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta http-equiv="description" content="Securiser une application" />
        <title>Sécuriser une application</title>
        <link href="css/principal.css" media="screen" rel="stylesheet" type="text/css" >
    </head>
	<body>
        <?php require 'include/menu.php'; ?>
        <div id="contenu">
            <?php 
            if (!empty($_GET['page'])) :
                include ('include/' . $_GET['page']);
            else :
                include ('include/collection.php');
            endif;
            ?>
        </div>
    </body>
</html>