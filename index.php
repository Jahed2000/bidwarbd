<?php
include_once 'inc/header.php';
include_once 'inc/slider.php';

use App\BidWarBd\BidWarBD;

include_once('vendor/autoload.php');
$index = new BidWarBD();
$activeItems = $index->activeAuctions();
//
//var_dump($activeItems);
//die();

$upcomingItems = $index->upcomingAuction();
$closedItems = $index->closedAuctions();

?>


<!--=================================
==*****Body Text Section Start*****==
===================================-->

<section class="container-fluid" id="body-text">
    <div class="container">
        <div class="row">
            <h1>Bangladesh No#1 Auction Bidding Platform</h1>
            <p>
                100% Risk free online auction, win or buy branded new products at up to 89% huge discount
                5 free credits on sign up, worldwide shipping, latest gadgets, click to bid easy auction's
                40000+ members, 10000+ completed auction's, always fair auction guaranteed.
            </p>
            <a href='login.php'>
                <button type="button" class="btn btn-danger" id="join-now-btn">JOIN NOW</button>
            </a>
        </div>
    </div>
</section>
<!--===============================
==*****Body Text Section End*****==
=================================-->

<!--||||||||||||||||||||||||||-->

<!--==============================
==*****Bid On Section Start*****==
================================-->
<section class="container-fluid" id="bid-on">
    <div class="container">
        <div class="row">
            <div class="heading col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>BID ON</h3>
            </div>
            <div class="bid-on-categories">
                <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><span class="glyphicon glyphicon-check"></span>
                        Books
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><span class="glyphicon glyphicon-check"></span> Cars
                        and Vehicles
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><span class="glyphicon glyphicon-check"></span>
                        Electronics
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><span class="glyphicon glyphicon-check"></span>
                        Furniture
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><span class="glyphicon glyphicon-check"></span> Home
                        and Property
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><span class="glyphicon glyphicon-check"></span>
                        Sports
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>
<!--============================
==*****Bid On Section End*****==
==============================-->

<!--||||||||||||||||||||||||||-->

<!--=====================================
==*****Live Auctions Section Start*****==
=======================================-->
<section class="container-fluid" id="live-auction">
    <div class="container">
        <div class="row">
            <div class="heading heading-v1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>LIVE AUCTIONS</h3>
            </div>
            <div class="live-auction-ads col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="demo">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                                <div class=" ">
                                    <div class="customNavigation">
                                        <a class="btn prev">
                                            <i class="fa fa-caret-left"></i>
                                        </a>
                                        <a class="btn next">
                                            <i class="fa fa-caret-right"></i>
                                        </a>
                                    </div>
                                    <div id="owl-demo" class="owl-carousel">
                                        <!--**Item-1**-->

                                        <?php foreach ($activeItems as $item) {

                                            ?>
                                            <div class="item">
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        //database date -> 2017-07-13 00:00:00
                                                        $("#countdown<?php echo $item['id']; ?>").countdown({
                                                                date: "<?=$item['product_end_date']?>", //mm/dd/yyyy or add the countdown's end date (i.e. 3 november 2012 12:00:00)
                                                                //format: "on" // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
                                                            },

                                                            function () {

                                                                // the code here will run when the countdown ends
                                                                $("#countdown<?php echo $item['id']; ?>").show();
                                                                // alert("Bidding Time Finish");
                                                            });
                                                    });
                                                </script>
                                                <div class="item-body">
                                                    <div class="item-name">
                                                        <h4>
                                                            <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=1"><?php echo $item['product_name'] ?></a>
                                                        </h4>
                                                    </div>
                                                    <div class="item-image">
                                                        <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=1"><img
                                                                src="assets/images/uploaded_items/<?php echo $item['product_image']; ?>"
                                                                alt=""/></a>
                                                    </div>
                                                    <div class="item-price-and-time">
                                                        <div class="item-price">
                                                            <p><?php echo $item['product_price'] ?> BDT</p>
                                                        </div>
                                                        <div class="countdown-time">
                                                            <p id="countdown<?php echo $item['id']; ?>"><span
                                                                    class="hours">00</span><span>:</span><span
                                                                    class="minutes">00</span><span>:</span><span
                                                                    class="seconds">00</span></p>
                                                            <span><?php echo $item['name'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="item-bid-btn">
                                                        <div class="item-auction-id">
                                                            <p>Max BID: <?php echo $item['max_bid'] ?> BDT</p>
                                                        </div>
                                                        <?php
                                                        if (isset($_SESSION['email']) && !empty($_SESSION['email'])
                                                            && $_SESSION['id'] != $item['user_id'] ) {

                                                            ?>
                                                            <div class="bid-btn">
                                                                <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=1"
                                                                   type="button" class="btn btn-danger">BID NOW
                                                                </a>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!--**Item-1**-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--===================================
==*****Live Auctions Section End*****==
=====================================-->

<!--|||||||||||||||||||||||||||||||||-->

<!--=========================================
==*****Upcoming Auctions Section Start*****==
===========================================-->
<section class="container-fluid" id="upcoming-auction">
    <div class="container">
        <div class="row">
            <div class="heading heading-v1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>UPCOMING AUCTIONS</h3>
            </div>
            <div class="upcoming-auction-ads col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="container">
                    <div class="row">
                        <!--**Item-1**-->

                        <?php foreach ($upcomingItems as $item) {
                            ?>


                            <div class="upcoming-item col-md-3 col-sm-6 col-xs-12">
                                <div class="upcoming-item-body">
                                    <div class="upcoming-item-name">
                                        <h4>
                                            <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=0"><?php echo $item['product_name'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="upcoming-item-image">
                                        <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=0"><img
                                                src="assets/images/uploaded_items/<?php echo $item['product_image']; ?>"
                                                alt=""/></a>
                                    </div>
                                    <div class="upcoming-item-price">
                                        <p><?php echo $item['product_price'] ?></p>
                                    </div>
                                    <div class="upcoming-item-open-time">

                                        <p>Open After 23 Hours</p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--**Item-1**-->

                        <div style="clear: both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=======================================
==*****Upcoming Auctions Section End*****==
=========================================-->

<!--|||||||||||||||||||||||||||||||||-->

<!--=======================================
==*****Closed Auctions Section Start*****==
=========================================-->
<section class="container-fluid" id="closed-auction">
    <div class="container">
        <div class="row">
            <div class="heading heading-v1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>CLOSED AUCTIONS</h3>
            </div>
            <div class="closed-auction-ads col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="container">
                    <div class="row" style="padding-bottom: 0; ">
                        <!--**Item-1**-->
                        <?php foreach ($closedItems as $item) {
                            ?>
                            <div class="closed-item col-md-3 col-sm-6 col-xs-12">
                                <div class="closed-item-body">
                                    <div class="closed-item-name">
                                        <h4>
                                            <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=0"><?php echo $item['product_name'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="closed-item-auction-id">
                                        <p>Auction ID. BB12168</p>
                                    </div>
                                    <div class="closed-item-image">
                                        <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=0"><img
                                                src="assets/images/uploaded_items/<?php echo $item['product_image']; ?>"
                                                alt=""/></a>
                                    </div>
                                    <div class="closed-item-winner-name">
                                        <div class="closed"><p>CLOSED</p></div>
                                        <div class="winner-name"><p><span class="glyphicon glyphicon-tower"></span>
                                                Arman
                                            </p></div>
                                    </div>
                                    <div class="closed-item-price">
                                        <p>Ended 500000.00 Tk</p>
                                    </div>
                                </div>
                            </div>
                            <!--**Item-1**-->

                        <?php } ?>


                    </div>
                    <div class="row" style="margin: 0;padding: 0 0 30px 0;">
                        <div class="col-md-12 col-sm-12 col-sx-12 view-all-btn" style="margin: 0;padding: 0">
                            <a href="recently-closed-auctions.php" style="float: right;">
                                <button type="button" class="btn btn-danger ">VIEW ALL</button>
                            </a>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
==*****Closed Auctions Section End*****==
=======================================-->


<?php include_once 'inc/footer.php'; ?>
