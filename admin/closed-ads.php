<?php
if (empty($_SESSION['admin_email']))
    session_start();
if (!isset($_SESSION['admin_email']) && empty($_SESSION['admin_email'])) {
    header('location:login.php');
}

include 'inc/header.php';


include_once('../vendor/autoload.php');

use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;

$item = new Item();
$getAllClosedAds = $item->gettingClosedAdsData();

//var_dump($getAllClosedAds); die();


?>

    <!--In Which Page We Are Name Section Start-->
    <div class="main-bar">
        <h3>
            <i class="fa fa-eye-slash"></i> Closed Ads
        </h3>
    </div>
    <!--In Which Page We Are Name Section End-->

<?php include 'inc/sidebar.php'; ?>

    <!--Main Body Content Section Start-->
    <div id="content">
        <div class="outer">
            <div class="inner bg-light lter">
                <div class="row">
                    <div class="col-md-12" style="margin:30px auto 0 auto;">
                        <a href="">
                            <button type="submit" name="delect_selected" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-trash"></span> Delete All Selected
                            </button>
                        </a>
                    </div>
                    <div class="col-md-12" style="margin-top:50px;margin-bottom: 50px;">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th><input type="checkbox" id="checkall"/></th>
                                <th>SL</th>
                                <th>Username</th>
                                <th>Phone No.</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Auction Price</th>
                                <th>Product Details</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>Bidding Price</th>
                                <th>Winner Name</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>

                            <?php
                            $serialNumber = 1;
                            foreach ($getAllClosedAds as $item) {
                                ?>

                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" class="checkthis"/></td>
                                    <td><?php echo $serialNumber++ ?></td>
                                    <td><?=$item['sales_person']?></td>
                                    <td><?=$item['mobile']?></td>
                                    <td><?=$item['product_name']?></td>
                                    <td style="text-align:center;"><img src="../assets/images/uploaded_items/<?=$item['product_image']?>" alt="product-name"/>
                                    </td>
                                    <td><?=$item['product_price']?></td>
                                    <td><?=$item['product_description']?></td>
                                    <td><?=$item['product_launch_date']?></td>
                                    <td><?=$item['product_end_date']?></td>
                                    <td><?=$item['winning_price']?></td>
                                    <td><?=$item['bidder_name']?></td>
                                    <td>

                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete"
                                                    data-toggle="modal" data-target="#delete<?= $item['product_id'] ?>"><span
                                                        class="glyphicon glyphicon-trash"></span></button>
                                        </p>
                                    </td>
                                </tr>

                                <!-- delete modal -->
                                <div class="modal fade" id="delete<?= $item['product_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">Delete this user</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger"><span class="glyphicon glyphicon-trash"></span>
                                                    Are you sure you want to delete this Ads?
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <a href="deleteAAd.php?id=<?= $item['product_id'] ?>&closed_ads=1">
                                                    <button type="button" class="btn btn-success"><span
                                                                class="glyphicon glyphicon-ok-sign"></span> Yes
                                                    </button>
                                                </a>
                                                <a href="">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                                                class="glyphicon glyphicon-remove"></span> No
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--***Modal For approve, ban, delete End**-->
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Main Body Content Section End-->
<?php include 'inc/footer.php'; ?>