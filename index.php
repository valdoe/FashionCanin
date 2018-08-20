<?php session_start();
	try {
	//Connection à MySQL
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
<?php
	$resultat = $bdd->query('SELECT * FROM individu'); //stockage résultat query
	//Parours de toutes les données
	while ($data = $resultat->fetch()){ 
?>
	<p>
		NOM : 
		<?php 
		//Affichage des données
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
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : ' . $e->getMessage());
	  }
	?>
	<!--JavaScript Materialize-->
     <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
