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
			<div id="home">
				<a href="index.php">
					<i class="fa fa-home"></i>
				</a>
				<div id="searchBar">
					<input type="search" id="site-search" name="q">
					<button>Recherche</button>
				</div>
				<!--
					$search_keyword = '';
					if(!empty($_POST['search']['keyword'])) {
						$search_keyword = $_POST['search']['keyword'];
					}
					$sql = 'SELECT * FROM posts WHERE name LIKE :keyword OR description LIKE :keyword ORDER BY id DESC ';
					...
					...
					$pdo_statement = $pdo_conn->prepare($query);
					$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
					$pdo_statement->execute();
					$result = $pdo_statement->fetchAll();
				-->
			</div>
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
	<div class="quickMenuItem">
		<a href="product.php?id=<?= $product['id'] ?>"><i class="fa fa-eye"></i></a>
		<a href="traitement.php?action=addToCart&id=<?= $product['id'] ?>"><i class="fa fa-shopping-cart"></i></a>
	</div>
	<a class='productIMG' href='product.php?id=<?= $product['id'] ?>'><img src="<?= $product['img'] ?>" alt=""></a>
	
	<a href='product.php?id=<?= $product['id'] ?>'><?= ucFirst($product['name']) ?></a>
	
	<p class='productPrice'><?= $product['price']; ?>€</p>
	
</article>

<?php

}

?>
</div>
</div>
</body>