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
		<?php echo $data['PRENOM_INDIVIDU']; ?>
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
</body>

</html>
