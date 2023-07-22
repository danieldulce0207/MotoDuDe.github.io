<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoDuDe | About Us</title>
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
        .content-container{
            background-color: white;
            border-radius: 25px;
            width: 90vw;
            height: auto;
            margin: auto;
            text-align: justify;
            text-align-last: center;
            justify-content: center;
            padding: 40px 70px 50px;
            overflow-y: auto;
            margin-bottom: 20px;
        }
        .footer {
            background-color: #B31312;
            color: #ecc4c3;
            text-align: center;
            width: 100%;
            
            bottom: 0;
            left: 0;
        }
        .pt-5{
            font-size: 19px;
            
        }
    </style>
</head>

<body>
    <header>
        <?php
            require dirname(__DIR__).('/technopreneurship/navigation.php');
        ?>
        
    </header>
    <div class="content-container">
        <img src="Logo transs.png" alt="MotoDude" style="width:350px;height:100px;">
        <p class="pt-5">
        MotoDude is your ultimate destination for premium motorcycle parts and accessories. 
        Founded with a passion for two-wheelers, we cater to motorcycle enthusiasts and riders of all levels. 
        Our online shop offers a wide array of top-quality products, carefully curated to enhance your riding experience and style. 
        From safety gear to performance upgrades, we've got you covered. Our mission is to provide the best-in-class service, ensuring your satisfaction with every purchase. 
        As riders ourselves, we understand your needs, and that's why we go the extra mile to offer monthly vouchers, coupons, and exciting raffles for our loyal customers. 
        Rest assured, all our products are guaranteed genuine, sourced from official brands. Join us in this exhilarating journey, as we ride together into the world of limitless possibilities. 
        Discover the perfect balance of performance, style, and safety - only at MotoDude. Welcome to the ride of a lifetime!
        </p>
    </div>
        


    <footer class="footer">
        <?php
            require dirname(__DIR__).('/technopreneurship/footer.php');
        ?>
    </footer>
</body>
</html>