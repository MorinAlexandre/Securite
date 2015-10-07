<?php
/**
 * Si l'utilisateur a validé le formulaire
 */
if (isset($_POST['ajouter'])) {
    /**
     * Vérification que tous les champs sont renseignés
     */
    if (!empty($_POST['titre']) && !empty($_POST['description'])) {
       /**
        * Création d'une collection en base de données
        */
        $sRequeteSql = 'INSERT INTO collection (titre, description) '
                     . 'VALUES (' . $oConnexion->quote($_POST['titre']) . ', ' . $oConnexion->quote($_POST['description']) . ')';
        $oConnexion->query($sRequeteSql);
        $bEnregistrement = true;
        
        /**
         * Envoi d'un mail de remerciement au créateur
         */
        $sContenu = "Bonjour, merci d'avoir ajouté une nouvelle collection sur le site.";
        $sEntete = "Cc : ouvrage@darkmira.fr\r\n"; 
        
        mail ($_POST['email'], "Ajout d'une nouvelle collection", $sContenu, $sEntete);

        echo '<div class="enregistrement">L\'enregistrement a été effectué avec succès. Vous pouvez à présent créer une nouvelle collection.</div>';
    } else {
        echo '<div class="erreur">Tous les champs doivent être renseignés.</div>';
    }
}
?>
<form method="post">
    <div class="element">
        <label for="email">E-mail du créateur *</label>
        <input type="text" id="email" name="email" />
    </div>
    <div class="element">
        <label for="titre">Titre *</label>
        <input type="text" id="titre" name="titre" />
    </div>
    <div class="element">
        <label for="description">Description *</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <input type="submit" name="ajouter" value="Ajouter la collection" />
</form>