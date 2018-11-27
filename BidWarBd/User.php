<?php

namespace App\BidWarBd;
class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $mobile;
    public $profilepic;
    public $district;
    public $city;
    public $zipcode;
    public $address = "";
    public $image = "";
    public $conn;
    public $user_id;
    private $transaction_id;
    private $user_cash;
    private $trans_approved;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "bidwarbd");
    }

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
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
        if (array_key_exists('mobile', $data)) {
            $this->mobile = $data['mobile'];
        }
        if (array_key_exists('profilepic', $data)) {
            $this->profilepic = $data['profilepic'];
        }
        if (array_key_exists('district', $data)) {
            $this->district = $data['district'];
        }
        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }
        if (array_key_exists('city', $data)) {
            $this->city = $data['city'];
        }
        if (array_key_exists('zipcode', $data)) {
            $this->zipcode = $data['zipcode'];
        }
        if (array_key_exists('image', $data)) {
            $this->image = $data['image'];
        }
        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }

        if (array_key_exists('transaction_id', $data)) {
            $this->transaction_id = $data['transaction_id'];
        }

        if (array_key_exists('user_cash', $data)) {
            $this->user_cash = $data['user_cash'];
        }

        if (array_key_exists('trans_approved', $data)) {
            $this->trans_approved = $data['trans_approved'];
        }
    }

    public function register()
    {
        //if Auth-> register is successful, then call this function to register user in the database
        $passHash = md5($this->password);
        $query = "Insert Into `users`(`name`,`email`,`password`,`mobile`,`address`) VALUES ('" . $this->name . "','" . $this->email . "','" . $passHash . "','" . $this->mobile . "','" . $this->address . "')";
        // var_dump($query);die();
        if (mysqli_query($this->conn, $query)) return true;
        else return false;
    }

    public function getID()
    {
        $query = "SELECT `id` from `users` Where `email`='" . $this->email . "'";
        if ($result = mysqli_query($this->conn, $query)) {
            $row = mysqli_fetch_assoc($result);
            return $row['id'];
        }
    }

    public function listusers()
    {
        //for admin panel. LISTS ALL USER
        $allusers = array();
        $query = "SELECT users.id, users.name,users.email from `users`";
        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $allusers[] = $row;
            }
            return $allusers;
        }
    }

    public function getSingleUserInfo()
    {
        //to display in view profile
        $query = "Select * from `users` where `id`=" . $this->id;
        if ($result = mysqli_query($this->conn, $query)) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    public function updateProfile()
    {
        if (empty($this->image)) {
            $query = "UPDATE `users` SET `name`= '" . $this->name . "',`mobile`='" . $this->mobile . "',`city`='" .
                $this->city .
                "',`zipcode`='" . $this->zipcode .
                "',`district`='" . $this->district .
                "',`address`='" . $this->address . "' WHERE `id`=" . $this->user_id;
        } else {
            $query = "UPDATE `users` SET `name`= '" . $this->name .
                "',`mobile`='" . $this->mobile . "',`city`='" . $this->city .
                "',`zipcode`='" . $this->zipcode .
                "',`district`='" . $this->district .
                "',`image`= '" . $this->image . "',`address`='" . $this->address . "'
                 WHERE `id`=" . $this->user_id;
        }
        if (mysqli_query($this->conn, $query)) return true;
        else return false;

    }

    public function changePassword()
    {
        $passHash = md5($this->password);
        $query = "UPDATE `users` SET `password`= '" . $passHash . "' WHERE `id`=" . $this->id;
        if (mysqli_query($this->conn, $query)) return true;
        else return false;
    }


    // Below code all are for admin panel
    function ban()
    {
        $this->ban = time();

        $sql = "UPDATE `users` SET `ban` = '" . $this->ban . "' WHERE `users`.`id` =" . $this->id;
        $result = mysqli_query($this->conn, $sql);


    }

    function bannedUsers()
    {
        $allBannedUserData = array();
        $sql = "SELECT * FROM `users` where ban is not null";
        $result = mysqli_query($this->conn, $sql);


        while ($row = mysqli_fetch_object($result))
            $allBannedUserData[] = $row;

        return $allBannedUserData;
    }

    function totalUsers()
    {
        $allUserData = array();
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($this->conn, $sql);


        while ($row = mysqli_fetch_object($result))
            $allUserData[] = $row;

        return $allUserData;
    }

    function newUsers()
    {
        $allNewUserData = array();
        $sql = "SELECT * FROM `users` where approved is null and ban is null";
        $result = mysqli_query($this->conn, $sql);


        while ($row = mysqli_fetch_object($result))
            $allNewUserData[] = $row;

        return $allNewUserData;
    }

    function allApprovedUsers()
    {
        $allApprovedUserData = array();
        $sql = "SELECT * FROM `users` where approved is not null and ban is null";
        $result = mysqli_query($this->conn, $sql);


        while ($row = mysqli_fetch_object($result))
            $allApprovedUserData[] = $row;

        return $allApprovedUserData;
    }

    function unban()
    {
        $sql = "update users set ban = null where id = " . $this->id;
        $result = mysqli_query($this->conn, $sql);
    }


    function approvedUser()
    {
        $approval = time();

        $sql = "UPDATE `users` SET `approved` = '" . $approval . "' WHERE `users`.`id` =" . $this->id;
        $result = mysqli_query($this->conn, $sql);
    }

    function unbanSelected($ids = array())
    {
        if (is_array($ids) && count($ids) > 0) {
            $IDs = implode(",", $ids);

            $sql = "update users set ban = NULL WHERE id IN (" . $IDs . ")";
            $result = mysqli_query($this->conn, $sql);


        }
    }

    function delete()
    {
        $query = "DELETE FROM `users` WHERE `users`.`id` =" . $this->id;

        $result = mysqli_query($this->conn, $query);

    }

    function deleteSelected($IDs = array())
    {
        if (is_array($IDs) && count($IDs) > 0) {
            $ids = implode(",", $IDs);

            $sql = 'delete from `users` where id IN (' . $ids . ')';

            $result = mysqli_query($this->conn, $sql);


        }
    }

    public function count()
    {
        $query = "SELECT COUNT(*) AS totalItem FROM `users` WHERE `ban` IS NULL
  AND `approved` IS NOT NULL";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }


    // admin panel
    public function paginator($pageStartFrom = 0, $Limit = 5)
    {
        $_allUser = array();
        $query = "SELECT * FROM `users` WHERE `ban` IS NULL AND 
 `approved` IS NOT NULL LIMIT " . $pageStartFrom . "," . $Limit;
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $_allUser[] = $row;
        }
        return $_allUser;

    }

    function getAdOfAUser()
    {
        $_allAd = array();
        $sql = "SELECT * FROM `users` INNER JOIN product on users.id = product.user_id WHERE users.id =" . $this->id;
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $_allAd[] = $row;
        }

        return $_allAd;
    }

    public function deleteUserInfofromProductBidTable()
    {
        $query = "DELETE FROM `bidwarbd`.`product_bid` WHERE
    `product_bid`.`user_id` = " . $this->id;

        $result = mysqli_query($this->conn, $query);


        return $result;
    }

    public function deleteUserInfofromProductTable()
    {


        $query = "DELETE FROM `bidwarbd`.`product` WHERE `product`.`user_id` = " . $this->id;

        $result = mysqli_query($this->conn, $query);

        return $result;
    }


    public function deleteUserInfofromUsersTable()
    {

        $query = "DELETE FROM `bidwarbd`.`users` WHERE `users`.`id` = " . $this->id;

        $result = mysqli_query($this->conn, $query);

        if ($result) {

        } else {

        }
    }

    function getUserClosedAd()
    {
        $getAllCloesdAds = array();
        $sql = "SELECT * FROM `product` inner join users on product.user_id = users.id
WHERE product_end_date < now() and product.approved is not null 
        ORDER BY `product`.`product_end_date` ASC";

        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $getAllCloesdAds[] = $row;
        }

        return $getAllCloesdAds;

    }

    function gettingDataForSendingEmail()
    {
        $sql = "SELECT u.name as heighst_bidder_name
, u.email as heighst_bidder_email, u.mobile as heighst_bidder_mobile,
pb.bid_amount
FROM `users` AS u LEFT JOIN `product_bid` AS pb ON u.id=pb.user_id AND 
pb.product_id= " . $this->id . " ORDER BY `bid_amount` DESC LIMIT 1";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }


    public function deleteAllExpiredAddsByAdmin()
    {
        $sql = "DELETE FROM product WHERE product_expire_date<= CURDATE()";
        $result = mysqli_query($this->conn, $sql);

    }

    function submitTransaction() {
        $sql = "update users set transaction_id = '" . $this->transaction_id . "', 
        user_cash = '" . $this->user_cash . "', 
        trans_approved = null where users.id = " . $this->id;
        $result = mysqli_query($this->conn, $sql);
    }

    function transactionDealing()
    {

        $transData = array();

        $sql = "select * from users where trans_approved is NULL";
        $result = mysqli_query($this->conn, $sql);

        while ($row = mysqli_fetch_object($result))
            $transData[] = $row;

        return $transData;
    }

    function approvedATransaction()
    {
        $sql = "select amount, user_cash from users where id = ". $this->id;
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $updateUserAmount = $row['amount'] + $row['user_cash'] ;

        $approval = time();

        $sql = "UPDATE `users` SET `trans_approved` = '" . $approval . "', 
        `user_cash` = 0, amount = '" . $updateUserAmount . "' WHERE `users`.`id` =" . $this->id;
        $result = mysqli_query($this->conn, $sql);
    }



}