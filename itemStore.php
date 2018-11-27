<?php
session_start();
use App\BidWarBd\Auth;
use App\Message\Message;
use App\BidWarBd\User;
use App\BidWarBd\Item;
use App\BidWarBd\BidWarBD;
include_once ('vendor/autoload.php');

//var_dump($_FILES);
//echo "<br>";
//var_dump($_POST);die();

if(isset($_FILES['product_image']) && !empty($_FILES['product_image']['name']) && $_FILES['product_image']['error']==0){
//image was uploaded

    $filename= time().$_FILES['product_image']['name'];
    $temp_location= $_FILES['product_image']['tmp_name'];
    $destination=$_SERVER['DOCUMENT_ROOT']."/finalProject/assets/images/uploaded_items/".$filename;
    move_uploaded_file($temp_location,$destination); //function takes (temporary location,final location)
    $_POST['product_image']=$filename;
    $item=new Item();

    $item->prepare($_POST);
    if($item->register()){
        $_SESSION['message']= 'item uploaded successfully';
        header('location:my-ads.php');
        //item uploaded to db
    }else{
        $_SESSION['message']= 'uploading to database failed';
        header('location:index.php');
//uploading item failed
    }

}
else{
   echo 'image uploading is mandatory, please go back'; //no image uploaded
}

/*
 * item update working

*/