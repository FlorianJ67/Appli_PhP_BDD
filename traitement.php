<?php
    session_start();

    switch($_GET["action"]){

        case "ajouterProduit" :
            if(isset($_POST['submit'])){
        
                // $name = $_POST["name"];
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
        
                if($name && $price && $qtt){
        
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
        
                    $_SESSION['products'][] = $product;
        
                }
                
            }
        
            header("Location:index.php");
            break;

        // Clear all
        case "viderPanier":
            unset($_SESSION["products"]);
            header("Location:recap.php");die;
            break;
        
        // Up the quantity
        case "upqty":
            $_SESSION["products"][$_GET["id"]]["qtt"]++;
            // refresh the price
            $_SESSION["products"][$_GET["id"]]["total"] = $_SESSION["products"][$_GET["id"]]["qtt"]*$_SESSION["products"][$_GET["id"]]["price"];
            header("Location:recap.php");die;
            break;

        // Down the quantity
        case "downqty":
            $_SESSION["products"][$_GET["id"]]["qtt"]--;
            // refresh the price
            $_SESSION["products"][$_GET["id"]]["total"] = $_SESSION["products"][$_GET["id"]]["qtt"]*$_SESSION["products"][$_GET["id"]]["price"];
            // if quantity = 0 ; delete the article
            if($_SESSION["products"][$_GET["id"]]["qtt"] < 1){
                unset($_SESSION["products"][$_GET["id"]]);
            }
            header("Location:recap.php");die;
            break;

        // Delete 1 product
        case "suppProduit":
            unset($_SESSION["products"][$_GET["id"]]);
            header("Location:recap.php");die;
            break;
    }

?>