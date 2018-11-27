<?php
use App\BidWarBd\Auth;
use App\Message\Message;
use App\BidWarBd\User;
use App\BidWarBd\Item;
use App\BidWarBd\BidWarBD;
include_once ('vendor/autoload.php');
session_start();
//var_dump($_GET);die();
if(strtoupper($_SERVER['REQUEST_METHOD'])=='POST'){
    $user=new User();
    $_POST['id']= $_SESSION['id'];
    $user->prepare($_POST);
    if($user->changePassword()){
        $_SESSION['message'] = "success";
        header('location:my-account.php');
    }else{
        $_SESSION['message'] = "failed for network error,try again";
        header('location:my-account.php');
    }
}
?>
