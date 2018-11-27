<?php
include_once('../vendor/autoload.php');

use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;

$user = new User();

//var_dump($_POST['mark']); die();

if ($_POST['mark']) {
    $user->deleteSelected($_POST['mark']);

    if ($_POST['new_user'])
        header("location:" . 'new-users.php');
    else if ($_POST['approved_user'])
        header("location:" . 'approved-users.php');
    else if ($_POST['contact_message'])
        header("location:" . 'message.php');
    else  header("location:" . 'banned-users.php');


} else {
    if ($_POST['new_user'])
        header("location:" . 'new-users.php');
    else if ($_POST['approved_user'])
        header("location:" . 'approved-users.php');
    else if ($_POST['contact_message'])
        header("location:" . 'message.php');
    else  header("location:" . 'banned-users.php');
}

    