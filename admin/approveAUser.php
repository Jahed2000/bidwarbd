<?php

include_once ('../vendor/autoload.php');
use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;

$user = new User();

$user->prepare($_GET);

//var_dump($_GET); die();

$user->approvedUser();
header("location:". 'new-users.php');