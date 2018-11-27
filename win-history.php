<?php
if (empty($_SESSION['email']))
    session_start();

if (!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])) {
    header('location:index.php');
}
include_once 'inc/header.php';
?>

<?php

use App\BidWarBd\Auth;
use App\Message\Message;
use App\BidWarBd\User;
use App\BidWarBd\Item;
use App\BidWarBd\BidWarBD;

include_once('vendor/autoload.php');
$items = new Item();

$user_id['user_id'] = $_SESSION['id'];

$items->prepare($user_id);

//var_dump($user_id);
//die();


if (array_key_exists('itemPerPage', $_SESSION)) {
    if (array_key_exists('itemPerPage', $_GET)) {
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
    }
} else {
    $_SESSION['itemPerPage'] = 5;
}

$itemPerPage = $_SESSION['itemPerPage'];

$totalItem = $items->countForLoadUserWinningAds();
$totalPage = ceil($totalItem / $itemPerPage);
$pagination = "";

//var_dump($totalItem);
//die();

if (array_key_exists('pageNumber', $_GET)) {
    $pageNumber = $_GET['pageNumber'];
} else {
    $pageNumber = 1;
}

if ($totalPage > 1) {
    for ($i = 1; $i <= $totalPage; $i++) {
        $class = ($pageNumber == $i) ? "active" : "";
        $pagination .= "<li class='$class'><a href=win-history.php?pageNumber=$i' >$i</a></li>";
    }
}
$pageStartFrom = $itemPerPage * ($pageNumber - 1);


$allUserWinningItems = $items->paginateforUserAllWinningAds($pageStartFrom, $itemPerPage);
$sl = 1;

// getting auction max bid , winning price
$items->prepare($allUserWinningItems[0]);
$auction_price = $items->auctionWinningPrice();
// ending auction max bid , winning price
//
//var_dump($allUserWinningItems);
//die();

$sl = 1;
?>


<!--===================================
        ==*****Win History Section Start*****==
        =====================================-->
        <section class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ol class="breadcrumb breadcrumb-arrow">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span>Win History</span></li>
                        </ol>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <th>SN.</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Winning Price</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                
                                <?php foreach ($allUserWinningItems as $item) {
                                ?>
                                    <tr>
                                        <td><?php echo $sl++ ?></td>
                                        <td><?php echo $item['product_name'] ?></td>

                                        <td><img src="assets/images/uploaded_items/<?php echo $item['product_image']; ?>" alt=""
                                                 style="max-width:100px;max-height: 100px;"/></td>
                                        <td><?php echo $item['wiining_price'] ?></td>
                                        <td><?php echo $item['bid_time'] ?></td>

                                    </tr>

                                <?php } ?>
                                </tbody>
                            </table>
                            <ul class="pagination pull-right">
                                <li

                                    <?php
                                    if ($pageNumber <= 1) {

                                        ?>

                                        class="hidden"

                                        <?php
                                    }
                                    ?>

                                ><a href="win-history.php?pageNumber=<?php echo($pageNumber - 1) ?>>"><span
                                            class="glyphicon glyphicon-chevron-left"></span></a></li>

                                <?php echo $pagination ?>


                                <li

                                    <?php
                                    if ($pageNumber >= $totalPage) {

                                        ?>
                                        class="hidden"

                                        <?php
                                    }
                                    ?>


                                ><a href="win-history.php?pageNumber=<?php echo($pageNumber + 1) ?>>"><span
                                            class="glyphicon glyphicon-chevron-right"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                  
                
            </div><!--container-->
        </section>
	<!--===================================
        ===*****Win History Section End*****===
        =====================================-->

<?php include_once 'inc/footer.php';?>

