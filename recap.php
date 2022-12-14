<?php
    session_start();
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
                        <p>Nombre de produit : <?php echo count($_SESSION['products'])?></p>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div id="container">

                <?php 
                if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                    echo "<p>Aucun produit en session...</p>";
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
                        <td><div><button class='qttmod' >-</button><p>". $product['qtt'] ."</p><button class='qttmod' >+</button></div></td>
                        <td><div><p>". number_format($product['total'], 2, ",", "&nbsp;") ."&nbsp;€  </p><button class='removebtn' ><i class='fa fa-trash-o'></i></button></div></td>
                        </tr>";
                        $totalGeneral += $product['total'];
                    }
                    echo    "<tr>
                    <td colspan=4>Total général : </td>
                    <td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp") . "&nbsp;€</strong></td>
                    </tr>
                    </tbody>
                    </table>";
                }
                ?>
            </div>
        </main>
    </body>
    </html>