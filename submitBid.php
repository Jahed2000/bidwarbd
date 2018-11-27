<?php
session_start();

use App\BidWarBd\Auth;
use App\Message\Message;
use App\BidWarBd\User;
use App\BidWarBd\Item;
use App\BidWarBd\BidWarBD;

include_once('vendor/autoload.php');
//var_dump($_POST);die();

// max_bid = old_bid
$user = new User();
$user->prepare($_SESSION);
$singleUserInfo = $user->getSingleUserInfo();

$currentAmount = $singleUserInfo['amount'];


if ((intval($_POST['product_price']) >= intval($_POST['bid_amount'])) or (intval($_POST['old_bid']) >= intval($_POST['bid_amount']))) {
    $_SESSION['message'] = "your bid should be greater than uploader's price and max bid amount";
} else {
    $item = new Item();
    $item->prepare($_POST);

    if ($currentAmount > $_POST['old_bid']) {
        if ($item->submitBid())
            $_SESSION['message'] = "bid updated successfully";
        else
            $_SESSION['message'] = "Failed to update bids";
    }
}

header('location:product-details.php?product_id=' . $_POST['product_id'] . '&from_active=' . $_GET['from_active']);

