<?php
session_start();
use App\BidWarBd\Auth;
use App\Message\Message;
use App\BidWarBd\User;
use App\BidWarBd\Item;
use App\BidWarBd\BidWarBD;
include_once ('vendor/autoload.php');

//var_dump($_FILES); die();
//var_dump($_POST);die();
//var_dump($_SESSION);die();

$user=new User();
$_POST['user_id'] = $_SESSION['id'];

if(isset($_FILES['image']) && !empty($_FILES['image']['name']) && $_FILES['image']['error']==0) {
    $filename= time().$_FILES['image']['name'];
    $temp_location= $_FILES['image']['tmp_name'];
    $destination=$_SERVER['DOCUMENT_ROOT']."/finalProject/assets/images/profile_pictures/".$filename;
    move_uploaded_file($temp_location,$destination); //function takes (temporary location,final location)
    $_POST['image']=$filename;

   // var_dump("lol");die();

    $user->prepare($_POST);
    if($user->updateProfile()){
        $_SESSION['message'] ="user profile updated";
        header('location:my-account.php');
    }else{
        $_SESSION['message'] = "user profile update failed";
        header('location:my-account.php');
    }
}else{

    //var_dump($_POST);die();

    $user->prepare($_POST);
    if($user->updateProfile()){
        $_SESSION['message'] ="user profile updated";
        header('location:my-account.php');
    }else{
        $_SESSION['message'] = "user profile update failed";
        header('location:my-account.php');
    }
}

