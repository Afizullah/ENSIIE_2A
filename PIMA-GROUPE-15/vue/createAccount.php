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
			<h1>Création d'un compte'</h1>

			<form action=# method=post>
              <br>
              Nom:<br>
              <input type="text" name="nom">
              <br>
              Prénom:<br>
              <input type="text" name="prenom"><br>
			  Adresse email:<br>
			  <input type="text" name="email">
			  <br>
			  Mot de passe:<br>
			  <input type="password" name="mdp">
			  <br>
			  <?php echo $txt ?>
			  <br>
			  <input type="submit" value="Créer">
			</form>
		</section>
	</body>
</html>