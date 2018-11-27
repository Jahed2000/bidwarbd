<?php
/**
 * Created by PhpStorm.
 * User: Shaon
 * Date: 7/19/2017
 * Time: 11:58 AM
 */


include('../vendor/autoload.php');
use App\BidWarBd\User;

$user = new User();

session_start();
if (!isset($_SESSION['admin_email']) && empty($_SESSION['admin_email'])) {
    header('location:login.php');
}

$user->prepare($_GET);

//var_dump($_GET); die();

$user->ban();
if ($_GET['new_user'])
    header("location:" . 'new-users.php');
else header("location:" . 'approved-users.php');