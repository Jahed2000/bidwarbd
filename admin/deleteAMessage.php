<?php

if (empty($_SESSION['admin_email']))
    session_start();

if (!isset($_SESSION['admin_email']) && empty($_SESSION['admin_email'])) {
    header('location:login.php');
}

include_once('../vendor/autoload.php');

use App\BidWarBd\Contact;

$contact  = new Contact();



$contact->prepare($_GET);
$contact->deleteAMSG();

header("location:" . 'message.php');

