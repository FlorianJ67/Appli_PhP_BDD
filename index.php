<?php 
    session_start();
    include "functions.php";
?>        

<?php

	require_once('db-functions.php');

	$store = findAll();

	// On affiche chaques produits un a un

	foreach ($store as $product) {

	?>

        <a href='product.php?id=<?= $product['id'] ?>'><?= $product['name']; ?></a>

        <p><?= $product['price']; ?></p>

        <p><?= custom_echo($product['description'], 50); ?></p>

    <?php

	}

?>