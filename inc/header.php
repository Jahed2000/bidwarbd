<?php

if (empty($_SESSION['email']) && empty($_SESSION['category_id']) && empty($_SESSION['itemPerPage'])
    && empty($_SESSION['message']))
    session_start();


include_once('vendor/autoload.php');
use App\BidWarBd\User;

$user = new User();
$user->prepare($_SESSION);
$singleUserInfo = $user->getSingleUserInfo();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BidWarBd</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link rel='stylesheet prefetch' href='assets/css/owl.carousel.min.css'>

    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src='assets/js/owl.carousel.min.js'></script>
    <script src="assets/js/index.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/js/countdown.js"></script>
</head>

<script type='text/javascript'>
    $('#message').show().delay(3000).fadeOut(1500);
</script>

<script type="text/javascript">
    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();


        if (password != confirmPassword) {
            $("#divCheckPasswordMatch").html("Passwords do not match!");
            $('#changePasswordButton').attr('disabled', 'true');

        }
        else {
            $("#divCheckPasswordMatch").html("Passwords match.");
            $('#changePasswordButton').attr('disabled', 'false');
            

        }
    }

    $(document).ready(function () {
        $("#txtConfirmPassword").keyup(checkPasswordMatch);
    });

</script>

<script type='text/javascript'>
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<body>
<!--==============================
==*****Header Section Start*****==
================================-->

<header id="header">
    <!--**Header Top Bar Section Start**-->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="top-number"><p><strong>Help</strong> <i class="fa fa-phone-square"></i> +015 2122 5987
                        </p></div>
                </div>

				<?php

                if (isset($_SESSION['email'])) {

                ?>
				
                <div class="social-section col-md-5 col-sm-4 col-xs-6">
                    <ul class="social-share">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
				<?php } else { ?>
				<div class="social-section col-md-5 col-sm-4 col-xs-6"> </div>
				 <?php } ?>
				
                
				<?php

                if (isset($_SESSION['email'])) {

                ?>
                <div class="search col-md-2 col-sm-3 col-xs-6">

                    <a class="header_balance" href="my-account.php">Balance: <?php echo $singleUserInfo['amount']; ?> BDT</a>

                </div>
                <?php } else { ?>
                    <div class="search col-md-2 col-sm-3 col-xs-6">

                        <ul class="social-share">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>

                    </div>
                <?php } ?>
                <div class="login-section col-md-2 col-sm-2 col-xs-6">
                    <?php

                    if (!isset($_SESSION['email'])) {

                        ?>
                        <div class="login-btn">
                            <a href="login.php">
                                <button type="button" class="btn btn-danger">Login</button>
                            </a>
                        </div>

                    <?php } else { ?>
                        <div class="dropdown my-account">
                            <button class="btn btn-default dropdown-toggle" type="button" id="menu1"
                                    data-toggle="dropdown">My Account
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu menu2" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="my-account.php"><span
                                            class="glyphicon glyphicon-user"></span> My Account</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-new-ads.php"><span
                                            class="glyphicon glyphicon-plus-sign"></span> Add New Ads</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="my-ads.php"><span
                                            class="glyphicon glyphicon-list-alt"></span> My Ads</a></li>
                                
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php"><span
                                            class="glyphicon glyphicon-off"></span> Logout</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--**Header Top Bar Section Endt**-->
    <!--**Header Navigation/Menu Bar Section Start**-->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><!--**Logo Start**-->
                    <img src="assets/images/bidwarbd.png" alt="logo"/>
                </a><!--**Logo End**-->
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <i
                                class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="category.php?category_id=1">Books</a></li>
                            <li><a href="category.php?category_id=2">Cars and Vehicles</a></li>
                            <li><a href="category.php?category_id=3">Electronics</a></li>
                            <li><a href="category.php?category_id=4">Furniture</a></li>
                            <li><a href="category.php?category_id=5">Home and Property</a></li>
                            <li><a href="category.php?category_id=6">Sports</a></li>
                        </ul>
                    </li>
                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--**Header Navigation/Menu Bar Section End**-->
</header>
<!--============================
==*****Header Section End*****==
==============================-->
