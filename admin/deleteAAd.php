<?php


if (!isset($_SESSION['admin_email']) && empty($_SESSION['admin_email'])) {
    header('location:login.php');
}

include_once('../vendor/autoload.php');

use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;

$item = new Item();

if (array_key_exists('product_id', $_GET)) {
    $_GET['id'] = $_GET['product_id'];
};

//var_dump($_GET);
//die();

$item->prepare($_GET);
$item->deleteAAd();

if ($_GET['new_ads'])
    header("location:" . 'new-ads.php');
else header("location:" . 'closed-ads.php');