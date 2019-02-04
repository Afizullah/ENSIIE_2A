<?php
/**
 * Created by PhpStorm.
 * User: Afiz
 * Date: 14/11/2018
 * Time: 19:57
 */
 
$txt="";

if (isset($_POST["email"],$_POST["nom"], $_POST["prenom"], $_POST["mdp"])){
    //récupération des données saisies
    $email = secure((filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)));
    $nom = secure($_POST["nom"]);
    $prenom = secure($_POST["prenom"]);
    $mdp = _hash(secure($_POST["mdp"]));
    //vérification de leur validité
    if (!$email){
        $txt="Adresse email non conforme";
    }
    else if(strcmp($mdp,"")==0 || strcmp($nom,"")==0|| strcmp($prenom,"")==0){
        $txt="Chaque champ doit être complété";
    }
    else if (!unique_email($email)){
        CreateAccount($email, $nom, $prenom, $mdp);?>
        <script type="text/javascript">alert("Bienvenue.");</script>
        <?php
        header("Location:index.php?page=login");
    }
    else{
        $txt ="Adresse email déjà utilisée";
    }
}
?>