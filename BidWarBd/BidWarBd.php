<?php

namespace App\BidWarBd;
class BidWarBD
{
    public $category_id;
    public $filter;
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'bidwarbd');
    }

    public function prepare($data = array())
    {
        if (array_key_exists('category_id', $data)) {
            $this->category_id = $data['category_id'];
        }
        if (array_key_exists('filter', $data)) {
            $this->filter = $data['filter'];
        }
    }

    public function loadIndex()
    {
        $indexData = array();
        $query = "SELECT * FROM product RIGHT JOIN users ON users.id = product.user_id";
        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $indexData[] = $row;
            }
            return $indexData;
        }
    }






    // Add this below code

    // paginate the index by category
    public function countForCategoryIndex($ID)
    {
        $query = "SELECT COUNT(*) AS totalItem FROM `product`
        where approved is not null and category_id = " . $ID;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }

    // paginate the index by category

    public function paginateByCategory($pageStartFrom = 0, $Limit = 5)
    {

        $_allUser = array();

        $query = "SELECT product.id, product.product_image,product.product_launch_date,users.district,product.product_price,product.id,
users.name, product.product_name, category.product_category FROM category JOIN product ON category.id = '" . $this->category_id . "'
AND product.category_id = '" . $this->category_id . "' 
INNER JOIN users on users.id = product.user_id where product.approved is not null LIMIT " . $pageStartFrom . "," . $Limit;

        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $_allUser[] = $row;
        }
        return $_allUser;
    }


    // default pagination for first load
    public function countForLoadIndex()
    {
        $query = "SELECT COUNT(*) AS totalItem FROM `product` where approved is not null";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }


// default pagination for first load

    public function paginatorForLoadIndex($pageStartFrom = 0, $Limit = 5)
    {
        $_allUser = array();
        $query = "SELECT product.product_image,product.product_launch_date,users.district,product.product_price,product.id,
users.name, product.product_name, category.product_category FROM category
 JOIN product ON category.id = product.category_id 
 INNER JOIN users on users.id = product.user_id where product.approved is not null LIMIT " . $pageStartFrom . "," . $Limit;
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $_allUser[] = $row;
        }
        return $_allUser;

    }

    // found active Auctions comparing today date
    public function activeAuctions()
    {
        date_default_timezone_set('Asia/Dhaka');
        //Get today date or another date of you choice
        $today_date = new \DateTime();
        //Format it and convert it to string
        $today_date = date_format($today_date, 'Y-m-d H:i:s');

        $activeBIDList = array();
        //Get the database date, and format it
        $query = "SELECT product_launch_date, product_end_date, product.id, product_name, product_image, product_price, users.name, users.id as user_id FROM product INNER JOIN users 
        ON users.id = product.user_id where 
        product_launch_date < now() and  product_end_date > now() and product.approved is not null";

        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {

                // max bid

                $query2 = "select bid_amount as max_bid from product inner join product_bid on
      product.id = product_bid.product_id
      where product.id = " . $row['id'] . " ORDER BY
       `product_bid`.`bid_amount` DESC";

                if ($result2 = mysqli_query($this->conn, $query2)) {
                    $row2 = mysqli_fetch_assoc($result2);
                    $row['max_bid'] =  $row2['max_bid'];
                }

                $activeBIDList[] = $row;
            }
        }


        return $activeBIDList;
    }

    // found upcoming auctions comparing today date
    public function upcomingAuction()
    {
        date_default_timezone_set('Asia/Dhaka');
        //Get today date or another date of you choice
        $today_date = new \DateTime();
        //Format it and convert it to string
        $today_date = date_format($today_date, 'Y-m-d H:i:s');

        $upcomingBIDList = array();
        //Get the database date, and format it
        $query = "SELECT product_launch_date, product.id, product_name, product_image, product_price, users.name FROM product INNER JOIN users 
        ON users.id = product.user_id where product_launch_date > now() and product.approved is not null LIMIT 0, 4";

        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $upcomingBIDList[] = $row;
            }
        }
        return $upcomingBIDList;
    }

    // found closed auctions comparing today date
    public function closedAuctions()
    {
        date_default_timezone_set('Asia/Dhaka');
        //Get today date or another date of you choice
        $today_date = new \DateTime();
        //Format it and convert it to string
        $today_date = date_format($today_date, 'Y-m-d H:i:s');

        $closedBIDList = array();
        //Get the database date, and format it
        $query = "SELECT product_launch_date, product.id, product_name, product_image, product_price, users.name FROM product INNER JOIN users 
        ON users.id = product.user_id where product_end_date < now() and product.approved is not null LIMIT 0, 4";

        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $closedBIDList[] = $row;
            }
        }
        return $closedBIDList;
    }

//    // found closed auctions comparing today date
//    public function allClosedAuctions()
//    {
//        //Get today date or another date of you choice
//        $today_date = new \DateTime();
//        //Format it and convert it to string
//        $today_date = date_format($today_date, 'Y-m-d');
//
//        $closedBIDList = array();
//        //Get the database date, and format it
//        $query = "SELECT product.id, product_name, product_image, product_price, users.name FROM product INNER JOIN users 
//        ON users.id = product.user_id where product_launch_date < '" . $today_date. "'";
//
//        if ($result = mysqli_query($this->conn, $query)) {
//            while ($row = mysqli_fetch_assoc($result)) {
//                $closedBIDList[] = $row;
//            }
//        }
//        return $closedBIDList;
//    }


    public function countForLoadRecentClosedAuctions()
    {
        //Get today date or another date of you choice
        $today_date = new \DateTime();
        //Format it and convert it to string
        $today_date = date_format($today_date, 'Y-m-d');

        $query = "SELECT COUNT(*) AS totalItem FROM `product` where product_end_date < now() and product.approved is not null";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }


    public function paginateforRecentClosedAuctions($pageStartFrom = 0, $Limit = 5)
    {
        //Get today date or another date of you choice
        $today_date = new \DateTime();
        //Format it and convert it to string
        $today_date = date_format($today_date, 'Y-m-d');

        $_allUser = array();

        $query = "SELECT product.id, product_name, product_image, product_price, users.name FROM product INNER JOIN users 
        ON users.id = product.user_id where product_end_date < now()
         and product.approved is not null LIMIT " . $pageStartFrom . "," . $Limit;

        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $_allUser[] = $row;
        }
        return $_allUser;
    }


}