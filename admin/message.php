<?php
if (empty($_SESSION['admin_email']))
    session_start();
if (!isset($_SESSION['admin_email']) && empty($_SESSION['admin_email'])) {
    header('location:login.php');
}


include 'inc/header.php'; ?>

    <!--In Which Page We Are Name Section Start-->
    <div class="main-bar">
        <h3>
            <i class="fa fa-envelope"></i> Messages
        </h3>
    </div>
    <!--In Which Page We Are Name Section End-->

<?php include 'inc/sidebar.php';

include_once('../vendor/autoload.php');

use App\BidWarBd\Contact;

$contact = new Contact();
$contactData = $contact->getAllContact();
?>
    <!--Main Body Content Section Start-->
    <div id="content">
        <div class="outer">
            <div class="inner bg-light lter">
                <div class="row">
                    <form action="deleteMessageSelected.php" method="post">
                        <div class="col-md-12" style="margin:30px auto 0 auto;">
                            <a href="">
                                <button type="submit" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span> Delete All Selected
                                </button>
                            </a>
                        </div>
                        <div class="col-md-12" style="margin-top:50px;margin-bottom: 50px;">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><input hidden type="text" name="contact_message" value="1"></th>
                                    
                                    <th><input type="checkbox" id="checkall"/></th>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Company Name</th>
                                    <th>Subject</th>
                                    <th>Message Description</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $serialNumber = 1;
                                foreach ($contactData as $contact) {

                                    ?>

                                    <tr>
                                        <td></td>
                                        <td><input type="checkbox" name="mark[]" value="<?php echo $contact->id ?>"
                                                   class="checkthis"/></td>
                                        <td><?php echo $serialNumber++ ?></td>
                                        <td><?php echo $contact->name ?></td>
                                        <td><?php echo $contact->email ?></td>
                                        <td><?php echo $contact->phone ?></td>
                                        <td><?php echo $contact->company_name ?></td>
                                        <td><?php echo $contact->subject ?></td>
                                        <td><?php echo $contact->message ?></td>
                                        <td>

                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-title="Delete"
                                                        data-toggle="modal"
                                                        data-target="#delete<?php echo $contact->id ?>">
                                                    <span class="glyphicon glyphicon-trash"></span></button>
                                            </p>
                                        </td>
                                    </tr>

                                    <!--***Modal For ban, delete Start**-->
                                    <!-- delete modal -->
                                    <div class="modal fade" id="delete<?php echo $contact->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="edit"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">
                                                        <span class="glyphicon glyphicon-remove"
                                                              aria-hidden="true"></span>
                                                    </button>
                                                    <h4 class="modal-title custom_align" id="Heading">Delete this
                                                        message</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-danger"><span
                                                                class="glyphicon glyphicon-trash"></span>
                                                        Are you sure you want to delete this message?
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <!--                                                Need to update-->
                                                    <a href="deleteAMessage.php?id=<?php echo $contact->id ?>">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Main Body Content Section End-->
<?php include 'inc/footer.php'; ?>