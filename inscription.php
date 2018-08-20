<?php session_start();
	try {
    $bdd = new PDO('mysql:host=localhost;dbname=fashioncanin','root','root');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
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

      <title>Inscription</title>
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
				<main class ="container">
				  <?php
          if(isset($_POST['login'])):
            $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            if(filter_var($email,FILTER_VALIDATE_EMAIL)):
              $login = filter_var($_POST['login'],FILTER_SANITIZE_STRING);
              $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
							$nom = filter_var($_POST['nom'],FILTER_SANITIZE_STRING);
							$prenom = filter_var($_POST['prenom'],FILTER_SANITIZE_STRING);
              $pass_hache = password_hash($password, PASSWORD_DEFAULT);
              $query = $bdd->prepare('INSERT INTO individu(LOGIN_INDIVIDU, PASSWORD_INDIVIDU, EMAIL_INDIVIDU, NOM_INDIVIDU, PRENOM_INDIVIDU) VALUES(:login,:password,:email,:nom,:prenom)');
              $query->execute(array(
								'login' => $login,
								'password' => $pass_hache,
								'email' => $email,
								'nom' => $nom,
								'prenom' => $prenom
								));
              echo 'Inscription effectuée ! :)<br/>';
            else:
              echo 'Erreur ! <br/>';
            endif;
          else: ?>

				<div class="formulaire">
					<form class="col s12" method="post" action="inscription.php">
						<div class="email">
							<div class="input-field col s12">
								<input id="email" type="email" name="email" class="validate">
								<label for="email" class="active">Email</label>
							</div>
						</div>
						<div class="nom">
							<div class="input-field col s12">
								<input id="nom" type="text" name="nom" class="validate">
								<label for="nom" class="active">Nom</label>
							</div>
						</div>
						<div class="prenom">
							<div class="input-field col s12">
								<input id="prenom" type="text" name="prenom" class="validate">
								<label for="prenom" class="active">Prenom</label>
							</div>
						</div>
						<div class="login">
							<div class="input-field col s12">
								<input id="login" type="text" name="login" class="validate">
								<label for="login" class="active">Login</label>
							</div>
						</div>
						<div class="password">
							<div class="input-field col s12">
								<input id="password" type="password" name="password" class="validate">
								<label for="password" class="active">Password</label>
							</div>
						</div>
						<button class="btn waves-effect waves-light center" type="submit">
					    <i class="material-icons right">send</i>
							<input type="submit" name="submit" />
					  </button>
    			</form>
  			</div>

      </main>
  </body>
	<?php
		endif;
	?>
  </html>
