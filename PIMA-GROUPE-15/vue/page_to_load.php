<?php
    require_once(PATH_COMMUN."func_commun.php");

    //recupération de la page demandée par l'utilisateur
    if(isset($_GET["page"])){
        $page = secure($_GET["page"]);
    }else{
        $page = DEFAULT_PAGE;
    }



    //verification son droit d'accéder à une page autre que login
    if(!isset($_SESSION["id"])){
        if (!isset($_GET["page"])){
            header("Location:index.php?page=login");
        }
        if (strcmp($_GET["page"],"createAccount")==0){
            $page=$_GET["page"];
        }
        else{
            $page = LOGIN_PAGE;
        }       
    }

    //Définition du chemin de la page à charger
    $content = "404.php";
    if(file_exists($page.".php")){

        $content =$page.".php";

        //On charge le fichier commun au traitement des données
        require_once(PATH_COMMUN."DB.class.php"); 

        //On charge le model correspondant
        if (file_exists(PATH_MODEL.$content)) {
            require_once(PATH_MODEL.$content);
        }

        //On charge le controleur correspondant
        if (file_exists(PATH_CONTROLEUR.$content)) {
            require_once(PATH_CONTROLEUR.$content);
        }

    }

?>
