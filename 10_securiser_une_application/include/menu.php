<div id="menu">
    <span class="title">Menu -</span> 
    <ul>
        <li><a href="index.php?page=collection.php" title="Liste des collections">Liste des collections</a></li>
        <li><a href="index.php?page=ajout_collection.php" title="Ajouter une collection">Ajouter une collection</a></li>
        <li>
            <?php  if (!isset($_SESSION['identifie']) || true !== $_SESSION['identifie']) : ?>
                <a href="index.php?page=identification.php" title="S'identifier">S'identifier</a>
            <?php else : ?>
                <a href="deconnexion.php" title="Se déconnecter">Se déconnecter</a>
            <?php endif; ?>
        </li>
        <?php if (isset($_SESSION['identifie']) && true === $_SESSION['identifie']) : ?>
            <li id="menu_name">Bonjour <?php echo ucwords($_SESSION['utilisateur']['identifiant']); ?></li>
        <?php endif; ?>
    </ul>
</div>