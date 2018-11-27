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

$user = new User();
$getAllApprovedUsers = $user->allApprovedUsers();
?>

    <!--In Which Page We Are Name Section Start-->
    <div class="main-bar">
        <h3>
            <i class="fa fa-check-circle"></i> Approved Users
        </h3>
    </div>
    <!--In Which Page We Are Name Section End-->

<?php include 'inc/sidebar.php'; ?>

    <!--Main Body Content Section Start-->
    <div id="content">
        <div class="outer">
            <div class="inner bg-light lter">
                <div class="row">
                    <form action="deleteSelected.php" method="post">
                        <div class="col-md-12" style="margin:30px auto 0 auto;">

                            <button type="submit" class="btn btn-danger"><span
                                    class="glyphicon glyphicon-trash"></span> Delete All Selected
                            </button>

                        </div>
                        <div class="col-md-12" style="margin-top:50px;margin-bottom: 50px;">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><input hidden type="text" name="approved_user" value="1"></th>
                                    <th><input type="checkbox" id="checkall"/></th>
                                    <th>SL</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Address</th>
                                    <th>Zipcode</th>
                                    <th>City</th>
                                    <th>District</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $serialNumber = 1;
                                foreach ($getAllApprovedUsers as $user) {
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td><input type="checkbox" name="mark[]" value="<?php echo $user->id ?>"
                                                   class="checkthis"/></td>

                                        <td><?php echo $serialNumber++ ?></td>
                                        <td><?php echo $user->name ?></td>
                                        <td><?php echo $user->email ?></td>
                                        <td><?php echo $user->mobile ?></td>
                                        <td><?php echo $user->address ?></td>
                                        <td><?php echo $user->zipcode ?></td>
                                        <td><?php echo $user->city ?></td>
                                        <td><?php echo $user->district ?></td>

                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Ban">
                                                <a class="btn btn-warning btn-xs" data-title="Ban"
                                                        data-toggle="modal"
                                                        data-target="#ban<?= $user->id ?>"><span
                                                        class="glyphicon glyphicon-ban-circle"></span></a>
                                            </p>

                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <a class="btn btn-danger btn-xs" data-title="Delete"
                                                        data-toggle="modal" data-target="#delete<?= $user->id ?>">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
                                            </p>
                                        </td>
                                    </tr>

                                    <!--***Modal For ban, delete Start**-->
                                    <!-- ban modal -->
                                    <div class="modal fade" id="ban<?= $user->id ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="edit"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true"><span
                                                            class="glyphicon glyphicon-remove"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                    <h4 class="modal-title custom_align" id="Heading">Ban this user</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-warning"><span
                                                            class="glyphicon glyphicon-ban-circle"></span> Are you sure
                                                        you want to ban this User?
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <a href="banAUser.php?id=<?= $user->id ?>&approved_user=1">
                                                        <button type="button" class="btn btn-success"><span
                                                                class="glyphicon glyphicon-ok-sign"></span>
                                                            Yes
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

                                    <!-- delete modal -->
                                    <div class="modal fade" id="delete<?= $user->id ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="edit"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true"><span
                                                            class="glyphicon glyphicon-remove"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                    <h4 class="modal-title custom_align" id="Heading">Delete this
                                                        user</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-danger"><span
                                                            class="glyphicon glyphicon-trash"></span>
                                                        Are you sure you
                                                        want to delete this User?
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <a href="deleteAUser.php?id=<?= $user->id ?>&new_user=1">
                                                        <button type="button" class="btn btn-success"><span
                                                                class="glyphicon glyphicon-ok-sign"></span>
                                                            Yes
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Main Body Content Section End-->
<?php include 'inc/footer.php'; ?>