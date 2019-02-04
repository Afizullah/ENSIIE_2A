<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Apod-Login</title>
		<link rel="stylesheet" href="style/login.css"/>
	</head>
	<body>
	
		<header>
			<h1>Astronomy Picture of the Day</h1>
		</header>
		
		<section>
			<h1>Login</h1>
		
			<form action=# method=post>
			  Adresse email:<br>
			  <input type="text" name="email">
			  <br>
			  Mot de passe:<br>
			  <input type="password" name="mdp">
			  <br>
			  <?php echo $msg ?>
			  <br>
			  <input type="submit" value="Connexion">
              <div style="text-align: center;">
                    <a href="index.php?page=createAccount">Nouveau venu ? Créez un compte !</a>
              </div>
			</form>

		</section>
		<footer>
		</footer>
	</body>
</html>

