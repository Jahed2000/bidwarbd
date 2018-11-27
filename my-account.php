<?php
if (empty($_SESSION['email']))
    session_start();

if (!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])) {
    header('location:index.php');
}
include_once 'inc/header.php';

?>
<?php

include_once('vendor/autoload.php');
use App\BidWarBd\User;
use App\Message\Message;



$user = new User();
$user->prepare($_SESSION);
$singleUserInfo = $user->getSingleUserInfo();
//var_dump($singleUserInfo);die();
?>

<!--====================================
==*****My Account Section Start*****====
======================================-->
<section id="my-account">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><span>My Account</span></li>
                </ol>
            </div>
        </div>

        <div id="message">
            <?php
            if (!empty($_SESSION['message'])) {
                Message::blue($_SESSION['message']);
                $_SESSION['message'] = "";
            }
            ?>
        </div>

        <div class="row">

            <!--<div class="status alert alert-success col-md-12 col-sm-12 col-xs-12" style="display: none"></div>-->
            <div class="edit-profile-section ">
                <div class="edit-profile-body col-md-12 col-sm-12 col-xs-12">
                    <div class="heading-text col-md-12 col-sm-12 col-xs-12">
                        <h3><strong>EDIT PROFILE</strong></h3>
                    </div>
                    <div class="profile-body col-md-12 col-sm-12 col-xs-12">
                        <form method="post" action="editMyAccount.php" enctype="multipart/form-data">
                            <div class="col-md-12 col-sm-12 ">

                                <div class="form-group contact-input">
                                    <label>Upload Your Photo</label>
                                    <input type="file" name="image" accept="image/*" onchange="preview_image(event)"
                                           class="form-control">
                                </div>
                                <div align="center" class="form-group">
                                    <img id="output_image"
                                         src="assets/images/profile_pictures/<?php echo $singleUserInfo['image']; ?>"
                                         class="single-img-tag"/>
                                </div>


                                <div class="form-group contact-input">
                                    <label>Username *</label>
                                    <input value="<?php echo $singleUserInfo['name']; ?> " type="text" name="name"
                                           class="form-control" required="required">
                                </div>
                                <div class="form-group contact-input">
                                    <label>Email</label>
                                    <input disabled value="<?php echo $singleUserInfo['email']; ?> " type="email"
                                           name="email"
                                           class="form-control" required="required">
                                </div>
                                <div class="form-group contact-input">
                                    <label>Phone *</label>
                                    <input value="<?php echo $singleUserInfo['mobile']; ?>" name="mobile" type="number"
                                           class="form-control">
                                </div>
                                <div class="form-group contact-input">
                                    <label>Address *</label>
                                    <input value="<?php echo $singleUserInfo['address']; ?>" name="address"
                                           id="message" required="required" class="form-control" rows="8"></input>
                                </div>
                                <div class="form-group contact-input">
                                    <label>City *</label>
                                    <input value="<?php echo $singleUserInfo['city']; ?> " type="text" name="city"
                                           class="form-control" required="required">
                                </div>

                                <div class="form-group contact-input">
                                    <label>Zipcode *</label>
                                    <input value="<?php echo $singleUserInfo['zipcode']; ?> " type="text" name="zipcode"
                                           class="form-control" required="required">
                                </div>

                                <div class="form-group contact-input">
                                    <label>District *</label>
                                    <input value="<?php echo $singleUserInfo['district']; ?> " type="text"
                                           name="district"
                                           class="form-control" required="required">
                                </div>

                                <div class="form-group contact-input">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="statistics-and-password-change-section">
                <!--Statistics Start-->
                <div class="statistics-body col-md-6 col-sm-12 col-xs-12">
                    <div class="heading-text col-md-12 col-sm-12 col-xs-12">
                        <h3><strong>Balance</strong></h3>
                    </div>
                    <div class="statistics-body-form col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="subject" class="form-control" value="<?php echo $singleUserInfo['amount']; ?>" disabled>
                        </div>
						<div class="form-group contact-input">
						<a href='transaction-form.php'>
                                        <button type="submit" name="recharge" class="tn btn-primary btn-lg">RECHARGE</button>
										</a>
                                    </div>
                        
                    </div>
                </div>
                <!--Statistics End-->
                <!--Password Change Start-->
                <div class="password-body col-md-6 col-sm-12 col-xs-12">
                    <div class="heading-text col-md-12 col-sm-12 col-xs-12">
                        <h3><strong>CHANGE PASSWORD</strong></h3>
                    </div>
                    <div class="password-change-form col-md-12 col-sm-12 col-xs-12">
                        <form action="changeUserPassword.php" method="post">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="txtNewPassword" type="password" class="form-control" name="new_password"
                                           placeholder="New Password *" required="required">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="txtConfirmPassword" type="password" class="form-control" name="password"
                                           placeholder="Confirm Password *" required="required"
                                           onchange="checkPasswordMatch();">
                                </div>
                                <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>

                                <div class="form-group">
                                    <div class="form-group contact-input">
                                        <button type="submit" name="changePassword" class="tn btn-primary btn-lg">CHANGE PASSWORD</button>
                                    </div>
<!--                                    <a id="changePasswordButton" href=""-->
<!--                                       name="changePassword"-->
<!--                                       class="btn btn-primary btn-lg">-->
<!--                                        <span class="glyphicon glyphicon-refresh"></span> CHANGE PASSWORD-->
<!--                                    </a>-->

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Password Change End-->
            </div>

            <!--**Govt. ID Proof Start**-->
            <div class="national-id-upload-section">
                <div class="national-id-upload col-md-12 col-sm-12 col-xs-12">
                    <div class="heading-text col-md-12 col-sm-12 col-xs-12">
                        <h3><strong>GOVERNMENT ID PROOF</strong> (DRIVING LICENSE, NID, PASSPORT)</h3>
                    </div>
                    <div class="national-id-upload-form col-md-12 col-sm-12 col-xs-12">
                        <form method="post" action=" " enctype="multipart/form-data">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="form-group contact-input">
                                    <label>Goverment ID Proof *</label>
                                    <input type="file" name="subject" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <img src="assets/images/" class="govt-proof-img" alt=""/>
                                </div>
                                <div class="form-group">
                                    <a href="" name="upload" class="btn btn-primary btn-lg">
                                        <span class="glyphicon glyphicon-upload"></span> UPLOAD
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
            <!--**Govt. ID Proof End**-->
        </div>
    </div>
</section>
<!--====================================
    ===*****My Account Section End*****=====
    ======================================-->

<?php include_once 'inc/footer.php'; ?>

