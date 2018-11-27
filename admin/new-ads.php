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
$getAllNewAds = $item->gettingNewAdsData();

//var_dump($getAllNewAds); die();
?>

    <!--In Which Page We Are Name Section Start-->
    <div class="main-bar">
        <h3>
            <i class="fa fa-plus-square"></i>&nbsp; New Ads
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
                               cellspacing="0"
                               width="100%">
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
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>

                            <?php
                            $serialNumber = 1;
                            foreach ($getAllNewAds as $item) {
                                ?>
                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" name="mark[]" value="<?php echo $item->id ?>"
                                               class="checkthis"/></td>
                                    <td><?php echo $serialNumber++ ?></td>
                                    <td><?php echo $item->name ?></td>
                                    <td><?php echo $item->mobile ?></td>
                                    <td><?php echo $item->product_name ?></td>
                                    <td style="text-align:center;"><img
                                                src="../assets/images/uploaded_items/<?= $item->product_image ?>"
                                                alt="product-name"/></td>
                                    <td><?php echo $item->product_price ?></td>
                                    <td><?php echo $item->product_description ?></td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="View">
                                            <button class="btn btn-success btn-xs" data-title="View" data-toggle="modal"
                                                    data-target="#view<?= $item->id ?>"><span
                                                        class="glyphicon glyphicon-eye-open"></span></button>
                                        </p>



                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete"
                                                    data-toggle="modal"
                                                    data-target="#delete<?= $item->id ?>"><span
                                                        class="glyphicon glyphicon-trash"></span></button>
                                        </p>
                                    </td>
                                </tr>

                                <!-- approve modal -->
                                <div class="modal fade" id="view<?= $item->id ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                                <h4 class="modal-title custom_align" id="Heading">Approve this ads</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="approveAAd.php"
                                                      enctype="multipart/form-data"
                                                      style="margin-left: 15px;">

                                                    <input type="number" name="id" value="<?=$item->id?>" hidden>

                                                    <div class="form-group">
                                                        <label>Userame</label>
                                                        <input type="text" name="name" value="<?= $item->name ?>"
                                                               class="form-control" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contact Number</label>
                                                        <input type="number" name="mobile" value="<?= $item->mobile ?>"
                                                               class="form-control" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Product Name</label>
                                                        <input type="text" name="product_name"
                                                               value="<?= $item->product_name ?>" class="form-control"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Product Image *</label>
                                                        <img disabled src="../assets/images/uploaded_items/<?= $item->product_image ?>"
                                                             alt="" style="width:100px;height:100px;"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Auction Price *</label>
                                                        <input type="number" value="<?= $item->product_price ?>"
                                                               name="product_price" class="form-control"
                                                               disabled>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>Product Details *</label>
                                                        <textarea name="product_description" disabled
                                                                  class="form-control tinymce"
                                                                  rows="8"><?= $item->product_description ?></textarea>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class='input-group date1' id='datetimepicker<?=$item->id?>'>
                                                            <input required name="product_launch_date" type='text' class="form-control" />
                                                            <span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class='input-group date2' id='datetimepicker<?=$item->id?>'>
                                                            <input required name="product_end_date" type='text' class="form-control" />
                                                            <span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group contact-input">
                                                        <button type="submit" class="btn btn-success">APPROVE</button>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer ">

                                                <a href="">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"><span
                                                                class="glyphicon glyphicon-remove"></span> Close
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!-- delete modal -->
                                <div class="modal fade" id="delete<?= $item->id ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                                <h4 class="modal-title custom_align" id="Heading">Delete this ads</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger"><span
                                                            class="glyphicon glyphicon-trash"></span> Are you sure you
                                                    want
                                                    to delete this Ads?
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <a href="deleteAAd.php?id=<?= $item->id ?>&new_ads=1">
                                                    <button type="button" class="btn btn-success"><span
                                                                class="glyphicon glyphicon-ok-sign"></span> Yes
                                                    </button>
                                                </a>
                                                <a href="">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"><span
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