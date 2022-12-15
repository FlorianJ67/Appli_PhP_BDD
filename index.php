<?php
    session_start();
    include "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device_width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        
        <title>Ajout produit</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="index.php">Index</a>
                    </li>
                    <li>
                        <a href="recap.php">Récap</a>
                    </li>
                    <li>
                        <p>Nombre de produit : <?= nbProduits() ?></p>
                    </li>
                </ul>
            </nav>
        </header>
<div id="createProduct">

    <h1>Ajouter un produit</h1>
    <form action="traitement.php?action=ajouterProduit" method="post">
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price" min="0">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" min="0">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
</div>
<?php 
        if(!empty($_SESSION['products'])) {
            echo "<div id='lastpush'>";
            
            $lastProduct = end($_SESSION['products']); 
            echo "<p>Le dernier produit ajouter est :<br>«" . ucfirst($lastProduct['name']) . "» en " . $lastProduct['qtt'] . " exemplaire"; if($lastProduct['qtt'] > 1){echo "s";} echo " à " . $lastProduct['price'] . "€ l'unité </p>";
            
            echo "</div>";
        } 
    ?>

        
    </body>
    </html>