<?php
	session_start();
    require_once("../config/config.php");
    //On charge le modele et le controleur de la page si ils existent et si on est autorisé à le faire 
    require_once("page_to_load.php");
    //On charge la page demandée(Sa vue)
    require_once($content);
?>