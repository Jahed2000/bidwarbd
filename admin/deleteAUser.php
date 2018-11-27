<?php
/**
 * Created by PhpStorm.
 * User: Shaon
 * Date: 7/19/2017
 * Time: 11:58 AM
 */

if (empty($_SESSION['admin_email']))
    session_start();
if (!isset($_SESSION['admin_email']) && empty($_SESSION['admin_email'])) {
    header('location:login.php');
}
include_once('../vendor/autoload.php');
use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;

$user = new User();

$user->prepare($_GET);

$user->delete();

if ($_GET['new_user'])
    header("location:" . 'new-users.php');
else if ($_GET['approved_user'])
    header("location:" . 'approved-users.php');
else  header("location:" . 'banned-users.php');
