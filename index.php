<?php
session_start();
include "functions.php";
require_once('db-functions.php');

$store = findAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device_width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Magasin Retro</title>
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
	<div id="container">
<div id="listItem">

	<?php
// On affiche chaques produits un à un

foreach ($store as $product) {
	
	?>
<article class='productListItem'>
	
	<a href='product.php?id=<?= $product['id'] ?>'><img src="<?= $product['img'] ?>" alt=""></a>
	
	<a href='product.php?id=<?= $product['id'] ?>'><?= ucFirst($product['name']) ?></a>
	
	<p class='productPrice'><?= $product['price']; ?>€</p>
	
</article>

<?php

}

?>
</div>
</div>
</body>