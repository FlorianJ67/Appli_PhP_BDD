<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device_width, initial-scale=1.0">
        
        <title>Ajout produit</title>
    </head>
    <body>
        <?php 
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                echo "<p>Aucun produit en session...</p>"
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
                    </table>";

                $totalGeneral = 0;
                foreach($_SESSION['products'] as $index => $product){
                    echo "<tr>
                            <td>". $index ."</td>
                            <td>". $product['name'] ."</td>
                            <td>". number_format($product['price'], 2, ",", "&nbsp;") ."&nbsp;€</td>
                            <td>". $product['qtt'] ."</td>
                            <td>". number_format($product['total'], 2, ",", "&nbsp;") ."&nbsp;€</td>
                        </tr>";
                    $totalGeneral += $product['total'];
                }
                echo    "<tr>
                            <td colspan=4>Total général : </td>
                            <td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp") . "&nbsp;€</strong></td>
                        </tr>
                    </tbody>
                    </table>"
            }
        ?>
        <h1>Ajouter un produit</h1>
        <form action="traitement.php" method="post">
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>

    </body>
</html>

