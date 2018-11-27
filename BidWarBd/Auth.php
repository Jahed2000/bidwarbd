<?php

namespace App\BidWarBd;
class Auth
{
    public $conn;
    public $email;
    public $password;

    public function prepare($data)
    {
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
    }

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "bidwarbd");
    }

    public function register()
    {
        //this function verifies if a user is registered in the database
        $query = "Select `email` from `users` WHERE `email`='" . $this->email . "'";
        $result = mysqli_query($this->conn, $query);
        // var_dump(mysqli_num_rows($result));die();
        if (mysqli_num_rows($result) < 1) {
            return 1; //eligible for registration
        } else {
            $row = mysqli_fetch_assoc($result);
            $passHash = md5($this->password);
            if ($passHash == $row['password']) {
                return 2; //account exist, email password donota milse
            } else {
                return 0; //email exist, pass different
            }
        }
    }

    public function login()
    {

        //call this function to check login
        $query = "Select * from `users` WHERE `email` ='" . $this->email . "'";

        $result = mysqli_query($this->conn, $query);
        //var_dump(mysqli_num_rows($result));die();

        if (mysqli_num_rows($result) <= 0) {
            return 1; //no such email
        } else {
            $row = mysqli_fetch_assoc($result);
            $passHash = md5($this->password);
            if ($passHash === $row['password']) {

                //login successful
                return $row['id'];
            } else {
                return 0; //email exist, pass different, use forget password
            }
        }
    }


    function checkAdminLogin()
    {
        $sql = "SELECT * FROM `admin` WHERE `email` = '" . $this->email . "' 
        and `password` = '" . $this->password . "'";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0)
            return 1;
        else {
            return 0;
        }
    }

}