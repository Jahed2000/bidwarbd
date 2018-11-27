<?php
/**
 * Created by PhpStorm.
 * User: Ashiqul Islam
 * Date: 8/15/2017
 * Time: 9:50 PM
 */


include_once ('../vendor/autoload.php');
use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;

$user = new User();

$user->prepare($_GET);



$user->approvedATransaction();
header("location:". 'transaction.php');