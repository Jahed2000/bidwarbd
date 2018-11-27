<?php
/**
 * Created by PhpStorm.
 * User: Shaon
 * Date: 7/19/2017
 * Time: 3:15 PM
 */
include_once ('../vendor/autoload.php');
use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;

$user = new User();

$user->prepare($_GET);

$user->unban();
header("location:". 'banned-users.php');