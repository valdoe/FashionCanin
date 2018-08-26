<nav>
  <div class="nav-wrapper  blue-grey lighten-2">
      <a href="index.php" class="brand-logo center">Fashion Canin</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
          <?php  if (isset($_SESSION['id']) AND isset($_SESSION['login'])): ?>
            <li><a href="InscriptionJoueur.php">Inscription d'un joueur à un concours</a></li>
			<li><a href="DesinscriptionConcours.php">Supprimer un concours</a></li>
            <li><a href="AffichageChien.php">Maitre détail Chien</a></li>
	  </ul>
	  <ul class="right hide-on-med-and-down">
			<li><a href="modifDonnes.php">MAJ info perso</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
          <?php else: ?>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
          <?php endif; ?>
      </ul>
  </div>
</nav>
