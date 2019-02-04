<?php

function getEmail($id){
	return DB::query("SELECT email FROM Utilisateurs WHERE id=".$id)[0]['email'];
}

function getMdp($id){
	return DB::query("SELECT mdp FROM Utilisateurs WHERE id=".$id)[0]['mdp'];
}

function updateEmail($id,$email){
	DB::execute("UPDATE Utilisateurs SET email='".$email."' WHERE id='".$id."'");
}

function updateMdp($id,$mdp){
	DB::execute("UPDATE Utilisateurs SET mdp='".$mdp."' WHERE id='".$id."'");
}

function mailExist($mail){
	return DB::query("SELECT id FROM Utilisateurs WHERE email='".$mail."'");
}

function deleteAccount($id){
    return DB::execute("DELETE FROM Utilisateurs WHERE id='".$id."'");
}
?>
