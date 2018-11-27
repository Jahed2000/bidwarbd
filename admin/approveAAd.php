<?php
/**
 * Created by PhpStorm.
 * User: Shaon
 * Date: 7/20/2017
 * Time: 9:22 PM
 */

include_once ('../vendor/autoload.php');
use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;

$item = new Item();

$date1 = new DateTime($_POST['product_launch_date']);
$_POST['product_launch_date'] = $date1->format('Y-m-d H:i:s');

$date2 = new DateTime($_POST['product_end_date']);
$_POST['product_end_date'] = $date2->format('Y-m-d H:i:s');

$item->prepare($_POST);

//var_dump($_POST); die();

$item->approvedAAd();
header("location:". 'new-ads.php');