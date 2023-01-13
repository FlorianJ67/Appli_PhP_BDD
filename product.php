<?php
session_start();
include "functions.php";
require_once('db-functions.php');

$product = findOneById($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device_width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Ajout produit</title>
</head>

<body>
	<header>
		<nav>
			<a href="index.php">
				<i class="fa fa-home"></i>
			</a>
			<ul>
				<li>
					<a href="index.php">INDEX</a>
				</li>
				<li>
					<a href="recap.php">RÉCAP</a>
				</li>
			</ul>
			<a href="recap.php" <?php if (nbProduits() == null || nbProduits() == 0) {
									echo "style= 'display: none'";
								} ?>>
				<i class="fa fa-shopping-cart"></i>
				<p id="shoppingCart"><?= nbProduits() ?></p>
			</a>
		</nav>
	</header>
	<main>
		<div id="container">
			<article id="productFocus">
				<div id="productIMG">
					<img src="<?= $product['img'] ?>" alt="">
				</div>
				<div id="productInfo">
					
					<h1><?= ucFirst($product['name']) ?></h1>
					
					<p id="productPrice"><?= $product['price'] ?> €</p>
					
					<p class='description'><?= ucFirst($product['description']) ?></p>
					
					<div id="actionProduct">

						<a href="index.php">Retour</a>
						
						<div>
						<i class="fa fa-shopping-cart"></i>
							<a href="traitement.php?action=addToCart&id=<?= $_GET['id'] ?>">Ajouter un produit</a>
							
						</div>
					</div>
				</div>

			</article>
		</div>
	</main>
</body>