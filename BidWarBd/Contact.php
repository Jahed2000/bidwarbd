<?php
/**
 * Created by PhpStorm.
 * User: Ashiqul Islam
 * Date: 10/10/2017
 * Time: 6:21 PM
 */

namespace App\BidWarBd;


class Contact
{


    public $id;
    public $conn;
    public $name;
    public $email;
    public $phone;
    public $company_name;
    public $subject;
    public $message;

    public function prepare($data)
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        if (array_key_exists('name', $data)) {
            $this->name = $data['name'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('phone', $data)) {
            $this->phone = $data['phone'];
        }
        if (array_key_exists('company_name', $data)) {
            $this->company_name = $data['company_name'];
        }
        if (array_key_exists('subject', $data)) {
            $this->subject = $data['subject'];
        }
        if (array_key_exists('message', $data)) {
            $this->message = $data['message'];
        }
    }

    function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "bidwarbd");
    }

    function submmitContactUSData()
    {
        $query = "INSERT INTO `contact` (`name`, `email`, `phone`, 
        `company_name`,`subject`, `message`)
         VALUES ('" . $this->name . "', '" . $this->email . "', '" . $this->phone . "', 
         '" . $this->company_name . "', '" . $this->subject . "', '" . $this->message . "')";

        if (mysqli_query($this->conn, $query)) {
            return true;
        }
    }

    function getAllContact()
    {
        $contactData = array();
        $sql = "select * from contact";
        $result = mysqli_query($this->conn, $sql);

        while ($row = mysqli_fetch_object($result))
            $contactData[] = $row;

        return $contactData;
    }

    function deleteAMSG() {
        $query = "DELETE FROM `bidwarbd`.`contact` WHERE `contact`.`id` = " . $this->id;

        $result = mysqli_query($this->conn, $query);
    }

    function deleteSelected($IDs = array())
    {
        if (is_array($IDs) && count($IDs) > 0) {
            $ids = implode(",", $IDs);

            $sql = 'delete from `contact` where id IN (' . $ids . ')';

            $result = mysqli_query($this->conn, $sql);
        }
    }

    function totalMessageNumber()
    {
        $query = "select count(*) as totalMessage from contact";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalMessage'];
    }
}