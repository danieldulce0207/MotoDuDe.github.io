<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoDuDe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script src="script.js"></script>
    

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin-top: 20vh;
            background-color: #3e3e42;
            
        }
        #product-page{
            display: flex;
            flex-wrap: wrap;
            width: auto;    
            margin-left: 2vw;
            margin-right: 2vw;
            position: relative;
            background-color: white; 
        }
        #product-container{
            
            width: 200px;
            height: 300px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 10px;
            margin: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }
        .pagination{
            margin: auto;
            position: relative; 
            top: 150px;
            left: 250px;
        }


        /* Align product items to the bottom of the flex container */
        
    </style>
</head>
<body>
    <header>
        <?php
            
            require 'navigation.php'

            
        ?>
        
    </header>
    <!--
    <div id="product-page">
        <div id="product-container" onclick="redirectToProduct('HLM-0001')">
            <img src="/technopreneurship/assets/products/HLM-0001.png" alt="Product 1" style="width:175px;height:150px;" class="center">
            <p class="fs-5">SEC HELMET</p>
        </div>

    </div>
    -->
    
    <?php
    
    // Include the products file
    require_once 'products.php';

    // Pagination settings
    $itemsPerPage = 10; // Number of products per page
    $totalProducts = count($products); // Total number of products
    $totalPages = ceil($totalProducts / $itemsPerPage); // Total number of pages

    // Get current page from URL parameter
    $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
    $currentpage = max(1, min($currentpage, $totalPages));

    // Calculate starting and ending indexes for the products on the current page
    $startIndex = ($currentpage - 1) * $itemsPerPage;
    $endIndex = $startIndex + $itemsPerPage - 1;
    $endIndex = min($endIndex, $totalProducts - 1);

    // Slice the products array to get the products for the current page
    $productsOnPage = array_slice($products, $startIndex, $itemsPerPage, true);
    
    echo"<div id='product-page'>";

    // Display products on the current page
    foreach ($productsOnPage as $productCode => $product) {
        $name = $product['name'];
        $price = $product['price'];
        $description = $product['description'];
        $image = $product['image'];
        $type = $product['type'];

        // Output HTML for the product
        
        echo "
                <div id='product-container' onclick=\"redirectToProduct('$productCode')\">
                    <img src='$image' alt='$name' style='width:175px;height:150px;'>
                    <p class='fs-5'>$name</p>
                    <p class='fs-5'> PHP $price</p>
                </div>
            ";
        
    }

        // echo "<div class='pagination'>";
        // for ($page = 1; $page <= $totalPages; $page++) {
        //     // Output the pagination links
        //     echo "<a href='index.php?page=$page'>$page</a>";
        // }
        // echo "</div>";
    echo"</div>";
    // Display pagination links
    

    ?>
    
    <?php
        // Retrieve existing cart items from the session
        if (isset($_SESSION['cart'])) {
            $cartItems = $_SESSION['cart'];
        }
    
        // Display the contents of the $cartItems array
        echo "<pre>";
        //print_r($cartItems);
        echo "</pre>";

    ?>
    </body>
    <footer>
        <?php
            require 'footer.php'
        ?>
    </footer>
</html>