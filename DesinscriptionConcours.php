<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=fashioncanin','root','root');
    foreach ($_POST as $key => $value) { $_POST[$key]=htmlentities($value, ENT_QUOTES, 'UTF-8'); }
    if (!empty($_POST['concours'])) {
		$req = $bdd->prepare('DELETE FROM concours WHERE ID_CONCOURS = :concours');
        $req->bindParam(':concours', $_POST['concours'], PDO::PARAM_INT);
        echo $_POST['concours'];
        $req->execute();
		$msg = "Suppresion bien effectuee à : " . date("H:i:s");

	} else {
		$msg = "Veillez Choisir le concour a supprimer (La suppresion d'un concour entrainera la suppresion de celui-ci dans les tables en relation)";
	}
?>

	<!DOCTYPE html>
	<html>

	<head>
	    <title>Supression d'un concour</title>
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
		<?php include("menu.php"); ?>
		<strong><?=$msg?></strong>
		<main role="main" class ="container">
			<div class="formulaire">
				<form class="col s12" method="post" action="DesinscriptionConcours.php">
          <div class="concours">
            <label for="concours">Choissisez le concours:</label>
            <input list="concours" type="text" id="listconcours" name="concours" required>
            <datalist id="concours" >
              <?php
                $resultat = $bdd->query('SELECT ID_CONCOURS, TYPE_CONCOURS FROM concours');
                while ($data = $resultat->fetch()):
                    echo "<option value=\"$data[ID_CONCOURS]\">$data[TYPE_CONCOURS]</option>";
                endwhile;
              ?>
            </datalist>
          </div>

         <button class="btn waves-effect waves-light center" type="submit">
             <i class="material-icons right">send</i
             <input type="submit" name="submit" />
         </button>
				</form>
			</div>
		</main>

		<!--JavaScript Materialize-->
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
	</html>

<?php
}
catch (Exception $e)
{
	// En cas d'erreur, on affiche un message et on arr�te tout
	die('Erreur : ' . $e->getMessage());
}
?>
