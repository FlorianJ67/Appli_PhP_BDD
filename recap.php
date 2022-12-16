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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <title>Récaputulatif des produit</title>
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
                        <p id="shoppingCart"><i class="fa fa-shopping-cart" <?php if(nbProduits() == null || nbProduits() == 0){echo "style= 'display: none'"; } ?>></i><?= nbProduits() ?></p>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div id="container">

                <?php 
                if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                    echo "<div class='message'><p>Aucun produit en session...</p></div>";
                }
                else {
                    echo "<table>
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>";
                    
                    $totalGeneral = 0;
                    foreach($_SESSION['products'] as $index => $product){

                        echo "<tr>
                                <td>". $index ."</td>
                                <td>". $product['name'] ."</td>
                                <td>". number_format($product['price'], 2, ",", "&nbsp;") ."&nbsp;€</td>
                                <td><div><a href='traitement.php?action=downQty&id=$index' class='qttmod'>-</a><p>". $product['qtt'] ."</p><a href='traitement.php?action=upQty&id=$index' class='qttmod'>+</a></td>
                                <td><div><p>". number_format($product['total'], 2, ",", "&nbsp;") ."&nbsp;€  </p><a href='traitement.php?action=suppProduit&id=$index' class='removeBtn' ><i class='fa fa-trash-o'></i></a></div></td>
                            </tr>";
                        $totalGeneral += $product['total'];
                    }
                    echo    "<tr>
                                <td colspan=4>Total général : </td>
                                <td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp") . "&nbsp;€</strong></td>
                            </tr>
                        </tbody>
                    </table>";

                    echo "<a  id='deleteTab' href='traitement.php?action=viderPanier'>Vider le panier</a>";
                }
                ?>

            </div>
        </main>
    </body>
</html>