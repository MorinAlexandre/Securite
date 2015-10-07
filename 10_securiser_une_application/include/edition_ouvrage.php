<?php

/**
 * Si l'identifiant de l'ouvrage à editer n'est pas
 * renseigné, l'utilisateur est redirigé vers la page d'accueil
 */
if (0 === (int) $_GET['id']) {
    header('Location: index.php');
}

if (isset($_POST['editer'])) {
    /**
     * Déplacement de l'image temporaire dans le dossier
     * des couvertures d'ouvrages
     */
    $bUpload = false;
    if (!empty($_FILES['couverture']['tmp_name'])
        && is_uploaded_file($_FILES['couverture']['tmp_name'])
        && !empty($_FILES['couverture']['name'])) {
        
        $bUpload = (bool) move_uploaded_file($_FILES['couverture']['tmp_name'], 'couverture/' . $_FILES['couverture']['name']);
    }
        
    /**
     * Modification des informations de l'ouvrage
     * en base de données si l'upload a été effectué
     */
     if (empty($_FILES['couverture']['tmp_name']) || true === $bUpload) {
         $sRequeteSql = 'UPDATE ouvrage SET description = ' . $oConnexion->quote($_POST['description'])
                      . (!empty($_FILES['couverture']['name']) ? ', image_couverture = ' . $oConnexion->quote($_FILES['couverture']['name']) : '')
                      . 'WHERE id=' . $oConnexion->quote($_GET['id']);
         $oConnexion->query($sRequeteSql);
        
         echo '<div class="enregistrement">L\'enregistrement a été effectué avec succès.</div>';
    } else {
        echo '<div class="erreur">Tous les champs doivent être renseignés convenablement.</div>';
    }
}

/**
 * Récupération des informations de l'ouvrage
 */
$rStat = $oConnexion->prepare('SELECT titre, description, image_couverture FROM ouvrage WHERE id = ? LIMIT 1');
$rStat->execute(array($_GET['id']));
$aOuvrage = $rStat->fetch(PDO::FETCH_ASSOC);
?>
<h2><?php echo $aOuvrage['titre']; ?></h2>

<?php if (!empty($aOuvrage['image_couverture']) && file_exists('couverture/' . $aOuvrage['image_couverture'])) : ?>
    <img src="couverture/<?php echo $aOuvrage['image_couverture']; ?>" alt="Image de couverture" />
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <div class="element">
        <label for="description">Description</label>
        <textarea id="description" name="description"><?php echo $aOuvrage['description']; ?></textarea>
    </div>
    <div class="element">
        <label for="couverture">Couverture</label>
        <input type="file" id="couverture" name="couverture" />
    </div>
    <input type="submit" name="editer" value="Editer l'ouvrage" />
</form>
