<?php
/**
 * Created by PhpStorm.
 * User: Ashiqul Islam
 * Date: 8/22/2017
 * Time: 10:34 PM
 */
session_start();
include_once ('vendor/autoload.php');
use App\BidWarBd\User;
$user = new User();
$_POST['id'] = $_SESSION['id'];

$user->prepare($_POST);

$user->submitTransaction();
header("location:". 'my-account.php');