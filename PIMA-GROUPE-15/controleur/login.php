<?php
function init_session($info){
	$_SESSION["id"]=$info["id"];
	$_SESSION["prenom"]=$info["prenom"];
}

//if (isset($_SESSION["id"])){
//	header("Location:index.php?page=accueil");
//}

$msg="";
if (isset($_POST["email"],$_POST["mdp"])){
	//récupération des données saisies
	$email=secure($_POST["email"]);
	$mdp=_hash(secure($_POST["mdp"]));
	//vérification de leur validité
	if ($info=verify($email,$mdp)){
		init_session($info[0]);
		header("Location:index.php?page=accueil");
	}
	//création d'un message d'erreur
	else{
		$msg="Mot de passe ou adresse email incorrect(s)";
	}
}

?>
