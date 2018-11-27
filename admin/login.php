<?php
session_start();
unset($_SESSION['admin_email']);
$_SESSION['admin_email'] = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/jquery.js"></script>
    <!--Bootstrap -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body class="login">

<div class="form-signin">
    <div class="text-center">
        <img src="assets/img/bidwarbd.png" alt="bidwarbd Logo" style="width:100px;height:60px;">
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="checkadminLogin.php" method="post">
                <p class="text-muted text-center">
                    Enter your username and password
                </p>
                <input required type="email" name="email" placeholder="Email" class="form-control top">
                <input required type="password" name="password" placeholder="Password" class="form-control bottom">


                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>

    </div>
    <hr>

</div>


<!--jQuery -->
<script src="assets/js/jquery.js"></script>
<!--Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.list-inline li > a').click(function () {
                var activeForm = $(this).attr('href') + ' > form';
                //console.log(activeForm);
                $(activeForm).addClass('animated fadeIn');
                //set timer to 1 seconds, after that, unload the animate animation
                setTimeout(function () {
                    $(activeForm).removeClass('animated fadeIn');
                }, 1000);
            });
        });
    })(jQuery);
</script>
</body>

</html>
