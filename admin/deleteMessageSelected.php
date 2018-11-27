<?php
include_once('../vendor/autoload.php');

use App\BidWarBd\Contact;

$contact = new Contact();

//var_dump($_POST['mark']); die();

if ($_POST['mark']) {
    $contact->deleteSelected($_POST['mark']);

    header("location:" . 'message.php');
} else
    header("location:" . 'message.php');


