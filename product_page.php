<?php
session_start();
require 'products.php';


if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Check if the product ID exists in the products array
    if (array_key_exists($productId, $products)) {
        $product = $products[$productId];
    } else {
        // Redirect to a 404 page or handle error as needed
        header("HTTP/1.0 404 Not Found");
        exit;
    }
} else {
    // Redirect to a default page or handle error as needed
    //header("Location: index.php");
    exit;
}





?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script src="script.js"></script>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin-top: 15vh;
            background-color: #3e3e42;
            
        }
        #product-page{
            display: flex;
            width: 85vw;    
            margin: auto;
            margin-bottom: 5vh;
            background-color: white;
        }
        #product-container{
            display: flex;
            width: 80vw; 
            height: auto;
            
            padding: 10px;
            margin: auto;
        }
        #details-container{
            border: 2px solid #8c8c8c;
            border-radius: 5px;
            height: 80vh;
            width: 40vw;
            margin: auto;
            padding: 20px;
        }
        .btn-primary{
            background-color: #b81414;
            border-color: #b81414;
            margin-bottom: 15px;
        }
        .btn-primary:hover{
            background-color: white;
            color: #b81414;
            border-color: #b81414;
        }
        .footer {
            background-color: #B31312;
            color: #ecc4c3;
            text-align: center;
            width: 100%;
            
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <header>
        <?php
            require dirname(__DIR__).('/technopreneurship/navigation.php');
        ?>
        
    </header>
    <div id="product-page">
        <div id="product-container">
            
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style='width:40%;height:auto;'/>
            
            <div id="details-container">
                <h1><?php echo $product['name']; ?></h1>
                <p><?php echo $product['description']; ?></p>
                <p>Price: PHP <?php echo $product['price']; ?></p>

                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                    <button class="btn btn-primary" type="submit" id="addtocartBtn" name="addtocartBtn">Add to cart</button>
                    <div class="input-group" style="width: 150px; text-align: center;">
                        <button class="btn btn-outline-secondary" type="button" id="decrementBtn">-</button>
                        <input type="number" class="form-control" id="quantityInput" name="quantity" value="1">
                        <button class="btn btn-outline-secondary" type="button" id="incrementBtn">+</button>
                    </div>
                </form>
                
            </div>
        </div>
        
    </div>

    <?php
    
    if (isset($_POST['addtocartBtn'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        $transactionID = uniqid($productId.'_');

        // Retrieve existing cart items from the session
        $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        // Add the new item to the cart
        $cartItems[] = [
            'product_id' => $productId,
            'quantity' => $quantity,
            'transaction_id' => $transactionID
        ];

        // Store the updated cart items in the session
        $_SESSION['cart'] = $cartItems;
        
        
        // Return a response to the client if needed
        //print_r($cartItems);

    }

    ?>
    <!-- Add more HTML and styling for the product page as needed
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; -->

    <footer class="footer">
        <?php
            require dirname(__DIR__).('/technopreneurship/footer.php');
        ?>
    </footer>
</body>
</html>
