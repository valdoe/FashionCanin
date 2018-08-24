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

      <title>Connexion</title>
  </head>
  <body>
				<nav>
			    <div class="nav-wrapper  blue-grey lighten-2">
			      <a href="index.php" class="brand-logo center">Fashion Canin</a>
			      <ul id="nav-mobile" class="right hide-on-med-and-down">
			        <li><a href="inscription.php" title="inscription">Inscription</a></li>
			      </ul>
			    </div>
			  </nav>
				<main class ="container">
						<?php  if (isset($_SESSION['id']) AND isset($_SESSION['login'])):
							echo 'Bonjour '. $_SESSION['login'];?>
		        	<a href="deconnexion.php">Logout</a>
						<?php
						   else:
							  if ((isset($_POST['login']) AND isset($_POST['password']))):
									$sanitized_password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
									$req = $bdd->prepare('SELECT ID_INDIVIDU, PASSWORD_INDIVIDU, LOGIN_INDIVIDU FROM INDIVIDU WHERE LOGIN_INDIVIDU = :login');
									$req->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
									$req->execute();
									$result = $req->fetch();
									if(password_verify($sanitized_password,$result['PASSWORD_INDIVIDU'])):
											$_SESSION['id'] = $result['ID_INDIVIDU'];
							        $_SESSION['login'] = $result['LOGIN_INDIVIDU'];
			                //header('Location: ../connexion.php');
											echo 'Bonjour '. $_SESSION['login']; ?>
											</br>
											<a href="deconnexion.php">Logout</a>
									<?php
										else:
									?>
								<p> Erreur dans la connexion </p>
                <br/>
                <a href="connexion.php">Retour à la connexion</a>
								<?php
								endif;
							  else :
						    ?>
						<div class="formulaire">
							<form class="col s12" method="post" action="connexion.php">
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
						<?php
				 endif;
			 endif;

		 }
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}?>

      </main>
  </body>
  </html>
