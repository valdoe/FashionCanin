<?php session_start();
	try {
	//Connection � MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=fashioncanin','root','root');
?>
<!DOCTYPE html>
<html>

<head>
    <title>valou</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

		<nav>
	    <div class="nav-wrapper  blue-grey lighten-2">
	      <a href="index.php" class="brand-logo center">Fashion Canin</a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="inscription.php" title="inscription">Inscription</a></li>
					<li><a href="Connexion.php" title="Connexion">Connexion</a></li>
	      </ul>
	    </div>
	  </nav>
		<main role="main">
		<p>Bienvenue sur le mini projet d'été de Valentino Dolasevic ! :)</p>
		<?php
		$resultat = $bdd->query('SELECT * FROM individu'); //stockage r�sultat query
		//Parours de toutes les donn�es
		while ($data = $resultat->fetch()){
		?>

		<p>
			NOM :
			<?php
			//Affichage des donn�es
			echo $data['NOM_INDIVIDU']; ?>
			<br/> PRENOM :
			<?php echo $data['LOGIN_INDIVIDU']; ?>
		</p>
		<?php } ?>
		<?php $resultat->closeCursor(); ?>
		<?php
			  }
		  catch (Exception $e)
		  {
			// En cas d'erreur, on affiche un message et on arr�te tout
			die('Erreur : ' . $e->getMessage());
		  }
		?>
		<!--JavaScript Materialize-->
	</main>
		<script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
