<?php
session_start();
include_once('vendor/autoload.php');

use App\BidWarBd\Auth;


$Auth = new Auth();
$Auth->prepare($_POST);
$check = $Auth->login();
if ($check == 0) {
    $_SESSION['message'] = "Password is Wrong, your email exists";

    header('location:login.php');
} elseif ($check == 1) {
    $_SESSION['message'] = "no such email";
    header('location:login.php');
} else {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] = $check;
    $_SESSION['message'] = "successfully logged";
    header('location:index.php');
}
