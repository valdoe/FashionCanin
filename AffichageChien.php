<?php
session_start();
try {
	// Connection MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=fashioncanin','root','root');
    foreach ($_POST as $key => $value) { $_POST[$key]=htmlentities($value, ENT_QUOTES, 'UTF-8'); }
    if (!empty($_POST['idindividu'])) {

    	// Formulaire rempli => insertion en base de donnees via données récupérer d'autres tables (ASSOCIATION)
		$req = $bdd->prepare('SELECT chien.ID_CHIEN,chien.ID_CONCOURS,chien.NOM_CHIEN,chien.PEDIGREE_CHIEN, race_chien.NOM_RACE FROM chien
                          INNER JOIN race_chien
                          ON chien.ID_RACE = race_chien.ID_RACE where ID_INDIVIDU = :nom');
        $req->bindParam(':nom', $_POST['idindividu'], PDO::PARAM_INT);
        $req->execute();


		$msg = "Requête correctement effectuée ! :) " . date("H:i:s");

	} else {
		$msg = "Veillez sélectionner un individu dans la liste afin d'afficher ses chiens";
	}
?>

	<!DOCTYPE html>
	<html>

	<head>
	    <title>Affichage des chiens selon maitre</title>
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
		<strong><?=$msg?></strong>
		<main role="main" class ="container">
			<div class="formulaire">
				<form class="col s12" method="post" action="AffichageChien.php">
					<div class="nom">
						<label for="individu">Choissisez un individu:</label>
						<input list="nom" type="text" id="listnom" name="idindividu" required>
			 			<datalist id="nom" >
			 				<?php
				 				$resultat = $bdd->query('SELECT ID_INDIVIDU, NOM_INDIVIDU FROM individu');
				 				while ($data = $resultat->fetch()):
				 			   		echo "<option value=\"$data[ID_INDIVIDU]\">$data[NOM_INDIVIDU]</option>";
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
      <?php
        if (!empty($_POST['idindividu'])) {
      ?>
        <table>
          <thead>
              <tr>
                  <th colspan="2">Affichage des informations des chiens</th>
              </tr>
          </thead>
          <tbody>
                <?php
                  while ($data = $req->fetch()):
                    echo "<tr>";
                    echo "<td>Id du chien  :</td>";
                    echo "<td>$data[ID_CHIEN]</td>" ;
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Nom du chien  :</td>";
                    echo "<td>$data[NOM_CHIEN]</td>" ;
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Race du chien  :</td>";
                    echo "<td>$data[NOM_RACE]</td>" ;
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Pedigree du chien  :</td>";
                    echo "<td>$data[PEDIGREE_CHIEN]</td>" ;
                    echo "</tr>";
                 endwhile;
              ?>
          </tbody>


        </table>
      <?php
      }
      else { ?>
        <table>
          <thead>
              <tr>
                  <th colspan="2">Affichage des informations des chiens</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    	<?php
      }?>

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
