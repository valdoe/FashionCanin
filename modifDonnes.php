<?php session_start();
	try {
    $bdd = new PDO('mysql:host=localhost;dbname=fashioncanin','root','root');
	?>
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
			<link rel="stylesheet" type="text/css" href="style.css">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<!--Import Google Icon Font-->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <title>Modifier ses infos persos</title>
  </head>
  <body>
				<?php include("menu.php"); ?>
				<main class ="container">
						<?php
							  if ((isset($_POST['telephone']) AND isset($_POST['localite']))){
									$req = $bdd->prepare('UPDATE individu SET LOCALITE_INDIVIDU = :localite, TELEPHONE_INDIVIDU = :telephone where ID_INDIVIDU = :login');
									$req->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
									$req->bindParam(':localite', $_POST['localite'], PDO::PARAM_STR);
									$req->bindParam(':login', $_SESSION['id'], PDO::PARAM_INT);
									$req->execute();
									echo "Modification de vos données effectuée";
							 	}
							 else {
							 		echo "Compléter les champs afin de changer vos informations personnels  !";
							 	}
						?>

						<div class="formulaire">
							<form class="col s12" method="post" action="modifDonnes.php">
								<div class="localite">
									<div class="input-field col s12">
										<input id="localite" type="text" name="localite" class="validate">
										<label for="localite" class="active">localite</label>
									</div>
								</div>
								<div class="telephone">
									<div class="input-field col s12">
										<input id="telephone" type="text" name="telephone" class="validate">
										<label for="telephone" class="active">Téléphone</label>
									</div>
								</div>
								<button class="btn waves-effect waves-light center" type="submit">
							    <i class="material-icons right">send</i>
									<input type="submit" name="submit" />
							  </button>
		    			</form>
		  			</div>
						<?php
		 }
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}?>
      </main>
  </body>
  </html>
