<?php

namespace App\BidWarBd;
class Item
{
    public $id;
    public $product_id;
    public $product_name;
    public $category_id;
    public $product_description;
    public $product_launch_date;
    public $product_end_date;
    public $product_image = "";
    public $product_price;
    public $user_id;
    public $product_bid = "";
    public $bid_amount;
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", '', "bidwarbd");
    }

    public function prepare($data = array())
    {
        if (array_key_exists('product_id', $data)) {
            $this->product_id = $data['product_id'];
        };
        if (array_key_exists('product_name', $data)) {
            $this->product_name = $data['product_name'];
        };
        if (array_key_exists('category_id', $data)) {
            $this->category_id = $data['category_id'];
        };
        if (array_key_exists('product_description', $data)) {
            $this->product_description = $data['product_description'];
        };
        if (array_key_exists('product_launch_date', $data)) {
            $this->product_launch_date = $data['product_launch_date'];
        };
        if (array_key_exists('product_end_date', $data)) {
            $this->product_end_date = $data['product_end_date'];
        };
        if (array_key_exists('product_image', $data)) {
            $this->product_image = $data['product_image'];
        };
        if (array_key_exists('product_price', $data)) {
            $this->product_price = $data['product_price'];
        };
        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        };
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        };
        if (array_key_exists('product_bid', $data)) {
            $this->product_bid = $data['product_bid'];
        }
        if (array_key_exists('bid_amount', $data)) {
            $this->bid_amount = $data['bid_amount'];
        }
    }

    public function register()
    {
        $price = intval($this->product_price);
        //Enters Item info into database
        $query = "INSERT INTO `product` (`category_id`, `user_id`, `product_name`, 
        `product_description`,`product_image`, `product_price`)
         VALUES ('" . $this->category_id . "', '" . $this->user_id . "', '" . $this->product_name . "', 
         '" . $this->product_description . "', '" . $this->product_image . "', '" . $price . "')";
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;

    }

    public function getcategoryproduct()
    {
        //call from startpage to index
        $products = array();
        $query = "SELECT * FROM `product` WHERE `category_id`=" . $this->category_id;
        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            return $products;
        }
    }

    public function listProducts()
    {
        $products = array();
        $query = "SELECT * From `product`  limit 0,6";
        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            return $products;
        }
    }

    public function singleProduct()
    {
        $query = "SELECT * from users inner join product on product.user_id = users.id where product.id = " . $this->product_id;
        if ($result = mysqli_query($this->conn, $query)) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

    public function getSingleProductMaxBid()
    {
        $query = "select bid_amount as max_bid from product inner join product_bid on
      product.id = product_bid.product_id
      where product.id = " . $this->product_id . " ORDER BY
       `product_bid`.`bid_amount` DESC";

        if ($result = mysqli_query($this->conn, $query)) {
            $row = mysqli_fetch_assoc($result);
            return $row['max_bid'];
        }
    }

    public function getSingleProductBidList()
    {
        $query = "SELECT * FROM `product_bid` inner join users 
        on product_bid.user_id = users.id WHERE product_id = " . $this->product_id;

        $bidlist = array();
        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $bidlist[] = $row;
            }
        }
        return $bidlist;
    }


    public function submitBid()
    {
        $time = time();
        $query = "INSERT INTO `bidwarbd`.`product_bid` (`product_id`, `user_id`, `bid_amount`, `bid_time`) VALUES ('" . $this->product_id . "', '" . $this->user_id . "', '" . $this->bid_amount . "', '" . $time . "')";
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;
    }

    public function itemUpdate()
    {
        if (!empty($this->product_image)) {
            $query = "UPDATE `bidwarbd`.`product` SET `product_name` = '" . $this->product_name . "', `product_description` = '" . $this->product_description . "', `product_image` = '" . $this->product_image . "'  WHERE `product`.`id` =" . $this->id;
        } else {
            $query = "UPDATE `bidwarbd`.`product` SET `product_name` = '" . $this->product_name . "', `product_description` = '" . $this->product_description . "'  WHERE `product`.`id` =" . $this->id;
        }
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;
    }

    public function itemDelete()
    {
        if (!empty($this->bid_amount)) {
            $query = "DELETE FROM `product_bid` WHERE `product_id`=" . $this->id;
            mysqli_query($this->conn, $query);
        }
        $query = "Delete From `product` Where `id`=" . $this->id;
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;
    }

    public function countForLoadUserAds()
    {
        $query = "SELECT COUNT(*) AS totalItem FROM `product` where user_id = " . $this->user_id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }

    public function paginateforUserAllAds($pageStartFrom = 0, $Limit = 5)
    {
        $userAllAd = array();

        $query = "SELECT product.id as 'productId1', product_name, product_image, product_price
 , product.approved FROM `users` INNER JOIN product on users.id = product.user_id WHERE users.id = 
        '" . $this->user_id . "' LIMIT " . $pageStartFrom . "," . $Limit;

        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $userAllAd[] = $row;
        }
        return $userAllAd;
    }

    public function getMyAdsData() {
        $userAllAd = array();

        $query = "SELECT u1.name as 'sales_person', u1.mobile, p.id as 'product_id',
   p.product_name, p.product_image, p.product_price, p.product_description,
   p.product_launch_date,p.product_end_date, pb.id as 'bid_id', u2.name as 
  'bidder_name', pb.bid_amount as winning_price, pb.bid_time FROM `product_bid`
   as pb JOIN Product as p ON (pb.product_id = p.id) JOIN users u1 on (p.user_id = " . $this->user_id . ") 
   JOIN users u2 on (pb.user_id = u2.id) WHERE pb.bid_amount in (select max(bid_amount) 
  from product_bid group by product_id) And p.product_end_date < now() group by pb.product_id";

        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $userAllAd[] = $row;
        }
        return $userAllAd;
    }

    public function countForLoadUserWinningAds()
    {
        $query = "select COUNT(*) AS totalItem from product_bid 
where bid_amount in (select max(bid_amount)
 from product_bid group by product_id) and user_id = " . $this->user_id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }

    public function paginateforUserAllWinningAds($pageStartFrom = 0, $Limit = 5)
    {
        /*
         * select user_id from product_bid where bid_amount in (select max(bid_amount) from product_bid group by product_id) and user_id = 20
         */


        /*
         SELECT product.product_name, product.product_image, product_bid.bid_amount as wiining_price, product_bid.bid_time from product join product_bid on product_bid.product_id = product.id where product_bid.bid_amount in (select max(bid_amount) from product_bid group by product_id) and product_bid.user_id = 20
         */


        $userAllAd = array();

        $query = "SELECT product.product_name, product.product_image, product_bid.bid_amount 
as wiining_price, product_bid.bid_time from product join product_bid on 
product_bid.product_id = product.id where product_bid.bid_amount in (select max(bid_amount)
 from product_bid group by product_id) and product_bid.user_id = 
        '" . $this->user_id . "' and product.approved is not null LIMIT " . $pageStartFrom . "," . $Limit;

        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $userAllAd[] = $row;
        }
        return $userAllAd;
    }

    function auctionWinningPrice()
    {
        $query = "select bid_amount as max_bid from product inner join product_bid on
      product.id = product_bid.product_id
      where product.id = " . $this->product_id . " ORDER BY
       `product_bid`.`bid_amount` DESC";

        if ($result = mysqli_query($this->conn, $query)) {
            $row = mysqli_fetch_assoc($result);
            return $row['max_bid'];
        }
    }

    function totalAdsNumber()
    {
        $query = "select count(*) as totalAds from product";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalAds'];
    }

    function totalCloesAdsNumber()
    {
        $query = "select count(*) as totalClosedAds from product where product_end_date < now() and approved is not null";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalClosedAds'];
    }

    function totalApprovedAdsNumber()
    {
        $query = "select count(*) as totalApprovedAds from product where approved is not null";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalApprovedAds'];
    }

    function totalNewAdsNumber()
    {
        $query = "select count(*) as totalNewAds from product where approved is null";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['totalNewAds'];
    }



    function gettingNewAdsData()
    {
        $newAd = array();

        $query = "SELECT product.id, product_name, product_image,
 product_price, users.name, users.mobile, product_description, product_launch_date, product_end_date 
  FROM product INNER JOIN users 
        ON users.id = product.user_id where product.approved is null";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_object($result)) {
            $newAd[] = $row;
        }
        return $newAd;
    }

    function approvedAAd()
    {

        $query = "UPDATE product SET `product_launch_date` = '"
            . $this->product_launch_date . "', `product_end_date` = '"
            . $this->product_end_date . "', `approved` = 1  WHERE `product`.`id` =" . $this->id;

        if (mysqli_query($this->conn, $query)) {
            return true;
        }
    }

    function deleteAAd()
    {
        $query = "DELETE product, product_bid 
from product inner JOIN product_bid where 
product.id = product_bid.product_id and product.id  =" . $this->id;

        $result = mysqli_query($this->conn, $query);

        $query = "DELETE FROM `bidwarbd`.`product` WHERE `product`.`id` =" . $this->id;

        $result = mysqli_query($this->conn, $query);
    }

    public function gettingClosedAdsData()
    {

        /*
         * Main SQL
         *
SELECT u1.name as 'sales_person', u1.mobile, p.id as 'product_id', p.product_name, p.product_image, p.product_price, p.product_description, p.product_launch_date,p.product_end_date, pb.id as 'bid_id', u2.name as 'bidder_name',
pb.bid_amount as winning_price, pb.bid_time FROM `product_bid` as pb JOIN Product as p ON (pb.product_id = p.id) JOIN users u1 on (p.user_id = u1.id)
JOIN users u2 on (pb.user_id = u2.id) WHERE pb.bid_amount in (select max(bid_amount) from product_bid group by product_id) And
p.product_end_date < now() group by pb.product_id
         */
        $closedBIDList = array();


        $query = "SELECT * FROM `winners`"; //view table

        if ($result = mysqli_query($this->conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $closedBIDList[] = $row;
            }
        }
        return $closedBIDList;

    }
}