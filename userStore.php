<?php

use App\BidWarBd\Auth;
use App\Message\Message;
use App\BidWarBd\User;
use App\BidWarBd\Item;
use App\BidWarBd\BidWarBD;

include_once('vendor/autoload.php');

session_start();
//var_dump($_POST);die();

$auth = new Auth();
$user = new User();

$user->prepare($_POST);
$auth->prepare($_POST);

$checker = $auth->register();

if ($checker == 1) {
    if ($user->register()) {
        $_SESSION['email'] = $_POST['email'];
        $check = $auth->login();
        $_SESSION['id'] = $check;
        $_SESSION['message'] = "successfully registered";
        header('location:index.php');
    } else {
        $_SESSION['message'] = "registration failed";
        header('location:index.php');
    }

} elseif ($checker == 2) {
    $_SESSION['message'] = "Account exists, please login";
    header('location:index.php');
} else {
    $_SESSION['message'] = "This email already registerd";
    header('location:index.php');
}