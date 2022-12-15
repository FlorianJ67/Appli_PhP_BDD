<?php
    session_start();

    switch($_GET["action"]){

        case "ajouterProduit" :
            if(isset($_POST['submit'])){
        
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

        case "viderPanier":
            unset($_SESSION["products"]);
            header("Location:recap.php");die;
            break;

        case "upqty":
            
            header("Location:recap.php");die;
            break;
        case "downqty":

            header("Location:recap.php");die;
            break;
        case "suppProduit":

            header("Location:recap.php");die;
            break;
    }

?>