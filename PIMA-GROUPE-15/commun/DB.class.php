<?php

require_once(PATH_CONFIG."config_db.php");

class DB 
{
    protected static function connect() {
        try {
            $connexion = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $connexion;
    }

    protected static function disconnect(&$connexion) {
        $connexion = "";
    }

    //Permet de faire une requête SQL renvoie un tableau du type 
    //array([0]=>array([attribut]=>[val_atribut_1]...),...,[n]=>array([attribut]=>[val_atribut_n]...))
    public static function query($req) {
        $bdd = DB::connect();
        if ($query = $bdd->query($req)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
    //Permet d'executer une requête SQL,renvoie false en cas d'erreur
    public static function execute($req) {
        $bdd = DB::connect();
        if ($query = $bdd->exec($req))
            return $query;
        return false;
    }
}
?>
