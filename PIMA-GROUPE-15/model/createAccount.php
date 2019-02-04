<?php
/**
 * Created by PhpStorm.
 * User: Afiz
 * Date: 14/11/2018
 * Time: 20:03
 */

function unique_email($email)
{
    return DB::query("SELECT id,prenom FROM Utilisateurs WHERE email='" . $email . "'");
}

function CreateAccount($email, $nom, $prenom, $mdp)
{
    $sql = "INSERT INTO Utilisateurs (email, mdp, nom, prenom) 
              VALUES ('$email', '$mdp', '$nom', '$prenom');";
    return DB::execute($sql);
}

?>