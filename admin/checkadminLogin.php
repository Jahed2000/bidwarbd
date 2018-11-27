<?php
session_start();
include_once ('../vendor/autoload.php');
use App\BidWarBd\Auth;


$Auth=new Auth();
$Auth->prepare($_POST);
$check=$Auth->checkAdminLogin();

//var_dump($check);
//die();

if ($check) {
    $_SESSION['admin_email'] = $_POST['email'];
    $_SESSION['message']= "Welcome to BidwarBD Admin Panel";
    

    header('location:index.php');
}else {
    $_SESSION['message']= "Email or password incorrect";
    header('location:login.php');
}