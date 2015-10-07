<?php
if (1 == $_GET['error']) {
    echo '<div class="erreur">L\'identification a échouée.</div>';
}
?>
<form method="post" action="identification.php">
    <div class="element">
        <label for="titre">Identifiant *</label>
        <input type="text" id="identifiant" name="identifiant" />
    </div>
    <div class="element">
        <label for="titre">Mot de passe *</label>
        <input type="password" id="mdp" name="mdp" />
    </div>
    <input type="submit" name="identifier" value="S'identifier" />
</form>
