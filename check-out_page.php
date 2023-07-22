<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    
    

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin-top: 125px;
            
        }
        .order-form-container{
            border: 2px solid #8c8c8c;
            border-radius: 5px;
            margin: auto;
            width: 130vh;
            height: auto;
            padding: 50px;
            margin-bottom: 20px;
            align-items: center;
            justify-content: center;
        }
        .form-banner{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .floating-display {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #17a2b8;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 9999;
        }
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
          background-color: #fefefe;
          margin: 15% auto; /* 15% from the top and centered */
          padding: 20px;
          border: 1px solid #888;
          width: 50%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }

        .close:hover,
        .close:focus {
          color: black;
          text-decoration: none;
          cursor: pointer;
        }
        #closeBtn{
            margin: auto;
            width: 40vh;
        }
        .footer {
            background-color: #B31312;
            color: #ecc4c3;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <header>
        <?php
            session_start();
            require dirname(__DIR__).('/technopreneurship/navigation.php');
            //require 'products.php'

            require_once 'products.php'; // Assuming you have products.php file with $products array
    
            // Retrieve cart items and total cost from session
            $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            $totalCost = isset($_SESSION['total']) ? $_SESSION['total'] : 0;
        ?>
        
    </header>

    <div class="order-form-container">
        <div class="form-banner">
            <h2>ORDER FORM</h2>
        </div>
        <div class="order-form">
            <form id="orderForm">
                <div class="row">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control mb-3" aria-label="First name">
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control mb-3" aria-label="Last name">
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control mb-3" id="inputEmail">
                        <div id="emailHelp" class="form-text mb-3">Your shipping information will be sent thru this email.</div>
                    </div>
                    <div class="col-12">
                    <label for="address1" class="form-label">Address Line 1</label>
                        <input type="text" class="form-control mb-3" id="inputAddress1" placeholder="Unit, Block, or Street">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control mb-3" id="inputAddress2" placeholder="Building, Village, or Baranggay">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control mb-3" id="inputCity">
                    </div>
                    <div class="col-md-4">
                        <label for="region" class="form-label">Region</label>
                        <input type="text" class="form-control mb-3" id="inputRegion">
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control mb-3" id="inputZip">
                    </div>

                    <div class="col-md-12">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <p class="small text-muted mb-3">Some payment methods may be temporarily unavailable as we are working to improve our systems. We apologize for any inconvenience.</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="radio1" value="option1" >
                            <label class="form-check-label" for="radio1">
                                Cash on Delivery (COD)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="radio2" value="option2" disabled>
                            <label class="form-check-label" for="radio2">
                                CC/DC
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="radio3" value="option3" disabled>
                            <label class="form-check-label" for="radio3">
                                E-Wallet
                            </label>
                        </div>
                    </div>

                    
                </div>

                <div class="container mt-5">
                <h3 class="text-center">Order Summary</h3>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartItems as $item): ?>
                            <?php
                                $productId = $item['product_id'];
                                $quantity = $item['quantity'];
                        
                                // Get product details using $productId
                                if (array_key_exists($productId, $products)) {
                                    $product = $products[$productId];
                                    $productName = $product['name'];
                                    $productPrice = $product['price'];
                                    $totalItemCost = $productPrice * $quantity;
                                } else {
                                    // Product with the given ID not found, handle the error as needed
                                    continue;
                                }
                            ?>
                            <tr>
                                <td><?php echo $productName; ?></td>
                                <td>P<?php echo number_format($productPrice, 2); ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td>P<?php echo number_format($totalItemCost, 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="text-right mt-3">
                    <h4>Total: PHP <?php echo number_format($_SESSION['total'], 2); ?></h4>
                    
                </div>
                <!--<div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                
                -->
                
                </div>
                
            </form>
        </div>
        <div class="text-right m-3">
            <button type="button" class="btn btn-danger " id="myBtn">Place Order</button>
        </div>
    </div>

    

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <h3 class="text-center">Order Placed Successfully!</h3>
        <p class="text-center">Please check your email for your shipping details.</p>
        <button type="button" class="btn btn-danger" id="closeBtn" name="closeBtn">Continue Shopping</button>
      </div>

    </div>
    <script src="script.js"></script>

    <?php
    if (isset($_POST['closeBtn'])) {
        session_unset();

        // destroy the session
        session_destroy();
    }
    ?>

    <footer class="footer">
        <?php
            require dirname(__DIR__).('/technopreneurship/footer.php');
        ?>
    </footer>
</body>
</html>