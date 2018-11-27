<?php
//if (empty($_SESSION['email']))
//    session_start();

use App\BidWarBd\Item;

include_once('vendor/autoload.php');
$index = new Item();
$index->prepare($_GET);
$item = $index->singleProduct();
//var_dump($item);
//die();
$itemBidList = $index->getSingleProductBidList();
$itemMaxBid=$index->getSingleProductMaxBid();
//var_dump($item);
//die();
?>

<?php include_once 'inc/header.php'; ?>


<!--===================================
==*****Product Details Section Start*****==
=====================================-->

<script type="text/javascript">
    $(document).ready(function () {
        //database date -> 2017-07-13 00:00:00
        $("#countdown").countdown({
                date: "<?=$item['product_end_date']?>", //mm/dd/yyyy or add the countdown's end date (i.e. 3 november 2012 12:00:00)
                format: "on" // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
            },

            function () {

                // the code here will run when the countdown ends
                $("#countdown<?php echo $item['id']; ?>").show();
                // alert("Bidding Time Finish");
            });
    });
</script>
<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Auctions</a></li>
					<li class="active"><span><?php
                                echo $item['product_name'];
                                ?></span></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-sm-12 product-details-image">
                    <img src="assets/images/uploaded_items/<?php echo $item['product_image']; ?>"/>
                </div>
                <div class="col-md-6 col-sm-12 product-details">
                    <div class="product-bid col-md-12 col-sm-12">
                        <div class="product-title col-md-12 col-sm-12">
                            <h2 align="center"><?php
                                echo $item['product_name'];
                                ?>
                            </h2>
                        </div>


                        <div align="center" class="timer-box col-md-5 col-sm-5 col-xs-12">
                            <div class="col-md-12 col-sm-12 timer">
                                <p id="countdown"><span class="hours">00</span><span>:</span><span
                                        class="minutes">00</span><span>:</span><span class="seconds">00</span></p>
                                <span class="waiting-for-bid-text">Waiting For Bid</span>
                            </div>
                        </div>

                        <?php
                        //Get today date or another date of you choice
                        $today_date = new \DateTime();
                        //Format it and convert it to string
                        $today_date = date_format($today_date, 'Y-m-d H:i:s');

                        if ($_GET['from_active'] == 1 && (isset($_SESSION['email']) && !empty($_SESSION['email']))
                        && $_SESSION['id'] != $item['user_id']
                        ) {

                            ?>

                            <div class="bid-box col-md-7 col-sm-7 col-xs-12">
                                <div class="col-md-12 col-sm-12 id-btn">
                                        <span><strong><?php
                                                echo $item['product_price'];
                                                ?>
                                            </strong></span><br/><br/>
                                    <form
                                        <?php
                                        if ($_GET['from_active'] == 1) {
                                            ?>
                                            action="submitBid.php?product_id=<?= $_GET['product_id'] ?>&from_active=1"

                                        <?php } else { ?>
                                            action="submitBid.php?product_id=<?= $_GET['product_id'] ?>&from_active=0"

                                        <?php } ?>

                                        method="POST" id="main-contact-form"

                                        class="contact-form" name="contact-form">
                                        <div class="form-group">

                                            <input type="number" name="bid_amount" class="form-control"
                                                   required="required" placeholder="Enter Your Bidding Price..">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="product_price" value="<?php echo $item['product_price'];?>" />
                                            <input type="hidden" name="product_id" value="<?php echo $_GET['product_id'];?>" />
                                            <input type="hidden" name="old_bid" value="<?php echo $itemMaxBid;?>" />
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']?>"/>
                                            <input type="hidden" name="product_id" value="<?php echo $item['id']?>"/>

                                            <button type="submit" value="submitBid" name="bidnow" class="btn btn-danger">BID NOW</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        <?php } ?>

                        <div class="product-details-tab col-md-12 col-sm-12 col-xs-12">
                            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group"
                                 aria-label="...">
                                <div class="btn-group" role="group">
                                    <button type="button" id="auction-info" class="active btn btn-primary" href="#tab1"
                                            data-toggle="tab">
                                        Auction Information
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" id="bidding-history" class="btn btn-default" href="#tab2"
                                            data-toggle="tab">
                                        Bidding History
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" id="delivery-info" class="btn btn-default" href="#tab3"
                                            data-toggle="tab">
                                        Delivery Information
                                    </button>
                                </div>
                            </div>

                            <div class="well">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1">
                                        <ul>
                                            <li>Auction ID <span>BB 12128</span></li>
                                            <li>Price <span><?php
                                                    echo $item['product_price'];
                                                    ?>
                                            </span></li>
                                            <li>Shipping & Processing Fees <span>150 Tk</span></li>
                                            <li>Bid Reset Time <span>15 Second</span></li>
                                            <!--<li> <span></span></li>
                                            <li> <span></span></li>-->
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade in" id="tab2">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Price</th>
                                                <th>Bid Time</th>
                                                <th>User</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($itemBidList as $itemList) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $itemList['bid_amount'] ?></td>
                                                    <td><?php echo $itemList['bid_time'] ?></td>
                                                    <td><?php echo $itemList['name'] ?></td>
                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade in" id="tab3">
                                        <p>Delivered in 2-3 days</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="clear: both;"></div>

                    </div>
                </div>
                <div class="col-md-12 col-sm-12 product-overview">
                    <div class="heading-text col-md-12 col-sm-12 col-xs-12">
                        <h3><strong>Product Overview</strong></h3>
                    </div>
                    <div class=" col-md-12 col-sm-12 col-xs-12">
                        <div class="product-title col-md-12 col-sm-12">
                            <h2><?php
                                echo $item['product_name'];
                                ?>
                            </h2>
                        </div>
                        <div class="product-specification col-md-12 col-sm-12">
                            <div class="specification-header-title col-md-12 col-sm-12">
                                <h4>SPECIFICATIONS</h4>
                            </div>
                            <div class="specification-details">
                                <p>
                                    <?php
                                    echo $item['product_description'];
                                    ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>

    </div>
</section>
<!--===================================
    ===*****Product Details Section End*****===
    =====================================-->

<script>
    $(document).ready(function () {
        $(".btn-pref .btn").click(function () {
            $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
            // $(".tab").addClass("active"); // instead of this do the below
            $(this).removeClass("btn-default").addClass("btn-primary");
        });
    });
</script>
<?php include_once 'inc/footer.php'; ?>

