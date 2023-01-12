<?php

function dbFunction()
{
	try {
		$db = new PDO(
			'mysql:dbname=store_fj;host=127.0.0.1',
			'root',
			'',
			[
				// Précise le type d'erreur que PDO renverra en cas de requête invalide
				\PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
				// Définit le mode de récupération des données de la base par défaut.
				// Ici, PDO renverra les données sous forme de tableau associatif (FETCH_ASSOC).
				\PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,
				// Insère une commande MySQL à l'instanciation de l'objet PDO,
				// cette commande force la prise en charge de l'UTF-8 lorsqu'on entrera des données en base (INSERT).
				\PDO::MYSQL_ATTR_INIT_COMMAND   => 'SET NAMES utf8'
			]
		);
		return $db;
	} catch (Exception $e) {

		die('Erreur : ' . $e->getMessage());
	}
}

function findAll()
{
	$db = dbFunction();

	$sqlQuery = 'SELECT * FROM product';

	$storeStatement = $db->prepare($sqlQuery);

	$storeStatement->execute();

	$store = $storeStatement->fetchAll();

	return $store;
}

function findOneById($id)
{
	$db = dbFunction();

	$sqlQuery = 'SELECT * FROM product WHERE id = :id';

	$storeStatement = $db->prepare($sqlQuery);

	$storeStatement->execute([':id'=>$id]);

	$store = $storeStatement->fetch();

	return $store;
}

function insertProduct($name, $price, $description)
{

	$db = dbFunction();

	$sqlQuery = 'INSERT INTO product (nom, prix, description)

    			VALUES ( :name , :price, :description )';

	$storeStatement = $db->prepare($sqlQuery);

	$storeStatement->execute([	':name'=>$name,
								':price' =>$price,
								':description'=>$description
							]);

}
