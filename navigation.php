
<style>
    .cart-icon {
        position: relative;
        display: inline-block;
    }

    .icon {
        display: inline-block;
        width: 24px;
        height: 24px;
        background-image: url('/technopreneurship/assets/shopping-cart-icon.png');
        background-size: cover;
    }

    .count {
        position: absolute;
        top: -8px;
        right: -8px;
        display: inline-block;
        width: 20px;
        height: 20px;
        background-color: red;
        color: white;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        border-radius: 50%;
        line-height: 20px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<nav class = "navbar navbar-expand-lg navbar-dark fixed-top pe-5 ps-5 h-18" style = "color: #ecc4c3; background-color: #B31312; padding-top: 5px; padding-bottom: 5px; ">

    <a class = "navbar-brand" href="index.php" style="font-size:23px;" ><img src="Logo transs.png" alt="MotoDude" style="width:250px;height:60px;"></a>
    <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#portfolio-nav" aria-controls = "portfolio-nav" aria-expanded = "false" aria-label = "Toggle navigation">
        <span class = "navbar-toggler-icon"></span>
    </button>
		
    <div class = "collapse navbar-collapse" id = "portfolio-nav">
        <ul class="nav navbar-nav me-auto">
            <li class ="nav-item">
                <a class="nav-link" href="index.php" style="font-size:15px;">HOME</a>
            </li>
            <li class = "nav-item">
                <a class="nav-link" href="gears.php" style="font-size:15px;">GEARS</a>
            </li>
            <li class = "nav-item">
                <a class="nav-link" href="parts.php" style="font-size:15px;">PARTS</a>
            </li>
            <li class = " nav-item">
                <a class="nav-link" href="about-us.php" style="font-size:15px;">ABOUT US</a>
            </li>
            
            <!--
            <li class="nav-item dropdown">
                // <a class="nav-link" href="../report/index.php" style="font-size:15px;" >GENERATE REPORT</a> 
                <a class="nav-link dropdown-toggle" href="../report/index.php" id="navbarDropdownMenuLink" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    GENERATE REPORT
                </a> 
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../report/rank_per_title.php">By Number of Participants per Course</a>
                        <a class="dropdown-item" href="../report/course_per_date.php">By Course conducted by Date Range</a>
                        <a class="dropdown-item" href="../report/participants_per_course.php">By Participants of the Course</a>
                        <a class="dropdown-item" href="../report/instructor_per_course.php">By Pool Instructors per Course</a>
                    </div>
            </li>
            -->
        </ul>
            
        <ul class="nav navbar-nav ml-auto">
            <?php
            $cart_count = 0; // Set default value to 0

            if (isset($_SESSION['cart'])) {
                $cartItems = $_SESSION['cart'];

                try {
                    $cart_count = count($cartItems);
                } catch (Exception $e) {
                    // Exception occurred, leave $cart_count as 0
                }
            }
            


            ?>
            <div class="collapse navbar-collapse" id="portfolio-nav">
                <div class="cart-icon">
                    <li class="nav-item">
                        <a href="view-cart.php" class="nav-link">
                            <span class="icon"></span>
                            <span class="count"><?php echo $cart_count; ?></span>
                        </a>
                    </li>
                </div>
            </div> 
        </ul>
              
    </div>
</nav>