<?php
$sSortie = '';
$sRequeteSql = 'SELECT * FROM collection ORDER BY titre';
$aCollections = $oConnexion->query($sRequeteSql)
                           ->fetchAll();

if (!empty($aCollections)) :

    /**
     * Affiche un message de confirmation d'état
     * de la suppression d'une collection
     */
    if (isset($_GET['etat_suppression']) && false === (bool) $_GET['etat_suppression']) :
        echo '<div class="erreur">Une erreur est survenue pendant la suppression.</div>';
    elseif (isset($_GET['etat_suppression']) && true === (bool) $_GET['etat_suppression']) :
        echo '<div class="enregistrement">La suppression a été effectuée avec succès.</div>';
    endif;
?>
<table>
    <thead>
        <tr>
            <th>Titre de la collection</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($aCollections as $aCollection) : ?>
        <tr>
            <td>
                <a href="index.php?page=ouvrage.php&id=<?php echo $aCollection['id']; ?>">
                    <?php echo htmlentities($aCollection['titre'], ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </td>
            <td>
                <?php echo htmlentities($aCollection['description'], ENT_QUOTES, 'UTF-8');  ?>
            </td>
            <td class="action">
                <a href="suppression_collection.php?id=<?php echo $aCollection['id']; ?>">
                    supprimer
                </a>
            </td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>
<?php
endif;