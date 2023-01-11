<?php

function connexion(){
    // Précise le type d'erreur que PDO renverra en cas de requête invalide
    \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
    // Définit le mode de récupération des données de la base par défaut.
    // Ici, PDO renverra les données sous forme de tableau associatif (FETCH_ASSOC).
    \PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,
    // Insère une commande MySQL à l'instanciation de l'objet PDO,
    // cette commande force la prise en charge de l'UTF-8 lorsqu'on entrera des données en base (INSERT).
    \PDO::MYSQL_ATTR_INIT_COMMAND   => 'SET NAMES utf8'
}

function findAll(){

}

function findOneById($id){

}

function insertProduct($name, $descr, $price){

}

?>