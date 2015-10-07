<?php
$sSortie = '';

// Affichage du titre de la collection
$sRequeteCollection = 'SELECT titre FROM collection WHERE id = ?';
$rStatCollection = $oConnexion->prepare($sRequeteCollection);
$rStatCollection->execute(array($_GET['id']));
$aCollection = $rStatCollection->fetchAll();
echo '<h2>Collection ' . $aCollection[0]['titre'] . '</h2>';

// Affichage des ouvrages de la collection
$sRequeteSql = 'SELECT * FROM ouvrage WHERE collection_id = ' . $_GET['id'] . ' ORDER BY titre';
foreach ($oConnexion->query($sRequeteSql) as $aOuvrage) {
    $sSortie .= '<li><a class="ouvrage" href="index.php?page=edition_ouvrage.php&id=' . $aOuvrage['id'] . '">' . $aOuvrage['titre'] . '</a></li>';
}

echo '<ul>' . $sSortie . '</ul>';