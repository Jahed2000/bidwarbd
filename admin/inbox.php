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
$transactionData = $user->transactionDealing();
//var_dump($getAllNewUsers); die();
?>

    <!--In Which Page We Are Name Section Start-->
    <div class="main-bar">
        <h3>
            <i class="fa fa-user"></i>&nbsp; Inbox
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

                           

                        </div>
                        <div class="col-md-12" style="margin-top:50px;margin-bottom: 50px;">

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th><input hidden type="text" name="new_user" value="1"></th>
                                    <th><input type="checkbox" id="checkall"/></th>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    

                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $serialNumber = 1;
                                foreach ($transactionData as $trans) {

                                    ?>

                                    <tr>
                                        <td></td>
                                        <td><input type="checkbox" name="mark[]" value="<?php echo $trans->id ?>"
                                                   class="checkthis"/></td>
                                        <td><?php echo $serialNumber++ ?></td>
                                        <td><?php echo $trans->name ?></td>
                                        <td><?php echo $trans->email ?></td>
                                        <td></td>
                                        <td></td>
                                       
                                        <td>
                                            
                                        </td>
                                    </tr>

                                    <!-- approve modal -->
                                 <!--   <div class="modal fade" id="approve<?php echo $trans->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="edit"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true"><span
                                                            class="glyphicon glyphicon-remove"
                                                            aria-hidden="true"></span></button>
                                                    <h4 class="modal-title custom_align" id="Heading">Approve this
                                                        user</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-success"><span
                                                            class="glyphicon glyphicon-thumbs-up"></span>
                                                        Are you sure you want to approve this User?
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <a href="approvedATransaction.php?id=<?php echo $trans->id ?>">
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
-->

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