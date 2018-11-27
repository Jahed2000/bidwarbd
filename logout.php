<?php

session_start();
use App\BidWarBd\Auth;
use App\Message\Message;
use App\BidWarBd\User;
use App\BidWarBd\Item;
use App\BidWarBd\BidWarBD;
include_once ('vendor/autoload.php');

$_SESSION['message']="You have been successfully logged out";
$_SESSION['email']=null;
$_SESSION['id']=null;
header('location:index.php');


