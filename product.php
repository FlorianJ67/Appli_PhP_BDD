<?php

require_once('db-functions.php');

$product = findOneById($_GET['id']);

?>

<div>
	<a href="index.php">Retour</a>

	<h1><?= $product['name'] ?></h1>

	<p class='description'><?= $product['name'] ?></p>

	<p><?= $product['price'] ?></p>

	<a href="traitement.php?action=addToCart&id=<?= $_GET['id'] ?>">Ajouter un produit</a>

</div>