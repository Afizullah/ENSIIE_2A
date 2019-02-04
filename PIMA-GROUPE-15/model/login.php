<?php

function verify($email,$mdp){
	return DB::query("SELECT id,prenom FROM Utilisateurs WHERE email='".$email."' AND mdp='".$mdp."'");
} 

?>