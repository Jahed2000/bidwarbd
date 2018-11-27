<?php
/**
 * Created by PhpStorm.
 * User: Ashiqul Islam
 * Date: 10/10/2017
 * Time: 6:20 PM
 */

include_once ('vendor/autoload.php');

use App\BidWarBd\Contact;

$contact = new Contact();



$contact->prepare($_POST);

$contact->submmitContactUSData();

header('location:contact-us.php');
