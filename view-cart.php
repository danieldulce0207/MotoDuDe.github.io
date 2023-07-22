<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoDude | Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script src="script.js"></script>
    

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin-top: 125px;
            
        }
        .item-container{
            border: 2px solid #8c8c8c;
            border-radius: 5px;
            margin: auto;
            width: 130vh;
            height: 25vh;
            padding: 50px;
            display: flex;
            align-items: center;
        }
        .item-details{
            margin-left: 20px;
            width: 70vh;
            
        }
        .quantity{
            
            width: 30vh;
            display: flex;
            margin-left: auto;
            margin-right: 0;
            padding: 0;
            font-size: 19px;
            align-items: center;
        }
        .checkout-container{
            
            margin: auto;
            width: 100vh;
            height: 25vh;
            padding: 50px;
            align-items: center;
            font-size: 19px;
            margin-bottom: 100px;
        }
        .check-out{
            margin: auto;
            align-items: center;
            justify-content: center;
            display: flex;
            
        }
        .footer {
            background-color: #B31312;
            color: #ecc4c3;
            text-align: center;
        }
        .main-container{
            margin-bottom: 60vh;
        }
    </style>
</head>
<body>
    <header>
        <?php
            session_start();
            require dirname(__DIR__).('/technopreneurship/navigation.php');
            //require 'products.php'
            
        ?>
        
    </header>

    <?php
    if (isset($_POST['removeFromCartBtn'])) {
        $removeTransactionId = $_POST['removeTransactionId'];
        $keyToRemove = null; // Variable to store the key of the item to be removed

        // Loop through the cart and find the key of the item with the matching product ID
        foreach ($_SESSION['cart'] as $key => $cartItem) {
            if ($cartItem['transaction_id'] === $removeTransactionId) {
                $keyToRemove = $key;
                break; // Stop looping once the item is found
            }
        }

        // If the key is found, remove the item from the cart
        if ($keyToRemove !== null) {
            unset($_SESSION['cart'][$keyToRemove]);
        }
    }

    require_once 'products.php';

    $total = 0;
    echo "<div class='main-container'>";
    $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    if (empty($cartItems)) {
        // Cart is empty, display a message
        echo "<h3>Cart is empty.</h3>";
    } else {
        // Cart is not empty, display cart items
        foreach ($cartItems as $cartItem) {
            $productId = $cartItem['product_id'];
            $quantity = $cartItem['quantity'];
            $transactionID = $cartItem['transaction_id'];
            

            // Get product information using $productId
            if (array_key_exists($productId, $products)) {
                $product = $products[$productId];
                $productName = $product['name'];
                $productPrice = $product['price'];
                $productDescription = $product['description'];
                $productImage = $product['image'];

                $removeButtonId = 'remove_' . $productId;

                // Display the cart item information
                echo <<<EOT
                    <div class="item-container">
                        <img src="$productImage" style="width:20%; height:125px;" alt="$productName">
                        <div class="item-details">
                            <p class="fs-2">$productName</p>
                            <p class="fs-2">$productPrice</p>
                        </div>
                        <div class="quantity">
                            <p class="fs-2 me-3">x $quantity</p>
                            <form method="post">
                                <input type="hidden" name="removeTransactionId" value="$transactionID">
                                <button type="submit" name="removeFromCartBtn" id="$removeButtonId" class="btn btn-danger ml-5">Remove</button>
                            </form>
                        </div>
                    </div>
                EOT;
                
                $totalforoder = $quantity * $productPrice;
                $total += $totalforoder;
            } else {
                echo "Product with ID $productId does not exist.<br>";
            }
        }

        $_SESSION['total'] = $total;

        echo <<<EOT
            <div class="checkout-container">
                <div class="total-container">
                    <p>Total: ___________________________________________$total</p>
                    <p>Shipping Fee: __________________________________60</p>
                    <p>"Free Shipping 4 All" voucher: __________________-60</p>
                </div>
                    
                <div class="check-out">
                    <form method="post" action="check-out_page.php">
                        <button type="submit" name="proceed_to_checkout" class="btn btn-danger">Check Out</button>
                    </form>
                </div>
            </div>

        EOT;
    }

    echo "</div";
    ?>

    <footer class="footer">
        <?php
            require dirname(__DIR__).('/technopreneurship/footer.php');
        ?>
    </footer>

    
</body>
</html>