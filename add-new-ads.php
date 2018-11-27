<?php
if (empty($_SESSION['email']))
    session_start();

if (!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])) {
    header('location:index.php');
}
include_once 'inc/header.php';
?>

        <!--================================
        ==*****Add New Ads Section Start*****==
        ==================================-->
        <section class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ol class="breadcrumb breadcrumb-arrow">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span>Add New Ads</span></li>
                        </ol>
                    </div>
                </div>
                                
                <div class="row"  style="padding-top: 50px">
                    <div class="row contact-wrap">
                        <div class="status alert alert-success" style="display: none"></div>
                        <form method="post" action="itemStore.php" enctype="multipart/form-data" style="margin-left: 15px;">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION["id"]; ?>" />
                            <div class="col-md-12 col-sm-12 ">
                                <div class="form-group contact-input">
                                    <label>Product Name *</label>
                                    <input type="text" name="product_name" class="form-control" required="required">
                                </div>
                                <div class="form-group contact-input">
                                    <label>Auction Price *</label>
                                    <input type="number" name="product_price" class="form-control" required="required">
                                </div>

                                <div class="form-group contact-input">
                                    <select class="form-group contact-input" name="category_id">
                                        <option>Item Category:</option>
                                        <option value="1">books</option>
                                        <option value="2">Cars & Vehicles</option>
                                        <option value="3">Electronics</option>
                                        <option value="4">Furniture</option>
                                        <option value="5">Home and Properties</option>
                                        <option value="6">Sports</option>
                                    </select>
                                </div>

                                <div class="form-group contact-input">
                                    <label>Product Image *</label>
                                    <input type="file" name="product_image" class="form-control" required="required">
                                </div>


                                <div class="form-group ">
                                    <label>Product Details *</label>
                                    <textarea name="product_description"  required="required" class="form-control tinymce" rows="8"></textarea>
                                </div>
                                <div class="form-group contact-input">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div><!--container-->
        </section>
	<!--===================================
        ===*****Add New Ads Section End*****===
        =====================================-->  


<?php include_once 'inc/footer.php';?>
