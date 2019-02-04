# PIMA-GROUPE-15

Développement d'une plate-forme de vote d'images populaires.

## UTILISATION

### AVANT UTILISATION

Cloner le projet dans le répertoire /var/www/html/ (ubuntu 16.04)
Modifier la définition de DB_USERNAME et DB_PASSWORD dans /config/config_db.php par vos username et mot de passe phpmyadmin. (Pour se connecter: adresse email:jean.martin@gmail.com et mdp:0000)
Importer la base de données pima.sql depuis phpmyadmin.

### UTILISATION

Aller à l'adresse localhost/PIMA-GROUPE-15/ depuis un navigateur.

## ARCHITECTURE

### CONFIG

Dossier dans lequel se trouve définies toutes les constantes utiles.
Dans config.php    : les constantes de base correspondant principalement aux différents repertoires/pages
Dans config_db.php : les constantes relatives à la base de données

### COMMUN

Dans le dosser commun se trouve les éléments qui ne se rapporte pas directement à une page web.
Dans DB.class.php  : classe permettant d'intéragir avec la base de données
Dans func_commun   : fonctions communes et usuelles

### VUE

Dans le dossier vue se trouve les élements de génération  et visuels d'une page.
page_to_load.php   : permet la mise en relation de des parties model, vue et controleur
404.php            : page à renvoyer lorsque la page demandée n'a pas été trouvée
index.php          : fichier de redirection et de chargement des constantes de base
*nom_de_page*.php  : fichier correspondant à la partie visuelle de la page *nom de page*

### CONTROLEUR

Dans le dossier controleur se trouve les élements de traitement et modication des données.
*nom_de_page*.php  : traitement des données associées à la page *nom_de_page* 

### MODEL

Dans le dossier model se trouve les éléments d'intéraction avec la base de données spécifiques à une page.
*nom_de_page*.php  : intéractions avec la base de données nécessaires pour le traiment des données de la page *nom_de_page*
