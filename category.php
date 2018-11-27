<?php
if (empty($_SESSION['email']))
    session_start();

include_once 'inc/header.php'; ?>

<?php

use App\BidWarBd\BidWarBD;

include_once('vendor/autoload.php');

/*this checks if user is logged in using session[email]
if(!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])){
    header('location:../index.php');
}
*/
$index = new BidWarBD();

if (array_key_exists('category_id', $_GET)) {
    if (!empty($_GET['category_id'])) {
        $_SESSION['category_id'] = $_GET['category_id'];
    }
} else {
    if (!array_key_exists('pageNumber', $_GET)) {
        unset($_SESSION['category_id']);
    }
}


/*
 * shake's
if (!empty($_GET['category_id']) && array_key_exists('category_id', $_GET))
    $_SESSION['category_id'] = $_GET['category_id'];
*/
if (array_key_exists('itemPerPage', $_SESSION)) {
    if (array_key_exists('itemPerPage', $_GET)) {
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
    }
} else {
    $_SESSION['itemPerPage'] = 5;
}

//Utility::dd($_SESSION['itemPerPage']);

$itemPerPage = $_SESSION['itemPerPage'];

if (array_key_exists('category_id', $_SESSION))
    $totalItem = $index->countForCategoryIndex($_SESSION['category_id']);
else
    $totalItem = $index->countForLoadIndex();


$totalPage = ceil($totalItem / $itemPerPage);


$pagination = "";


if (array_key_exists('pageNumber', $_GET)) {
    $pageNumber = $_GET['pageNumber'];
} else {
    $pageNumber = 1;
}

if ($totalPage > 1) {
    for ($i = 1; $i <= $totalPage; $i++) {
        $class = ($pageNumber == $i) ? "active" : "";
        $pagination .= "<li class='$class'><a href='category.php?pageNumber=$i' >$i</a></li>";
    }
}
$pageStartFrom = $itemPerPage * ($pageNumber - 1);


//paginator ends


if (array_key_exists('category_id', $_SESSION)) {
//   $_SESSION['preference']=$_GET['category_id'];

    $index->prepare($_SESSION);
    $categorizedItems = $index->paginateByCategory($pageStartFrom, $itemPerPage);
    if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
//run functions to sort data by lowest price or highest price
        if ($_POST['filter'] == "lowest_price") {
            $categorizedItems = $index->lowestPriceCategorizedIndex();
        }
        if ($_POST['filter'] == "upcomming_expires") {
            $categorizedItems = $index->expDateCategorizedIndex();
        }
    }
} else {
    $index = new BidWarBD();


// call default index function
    $categorizedItems = $index->paginatorForLoadIndex($pageStartFrom, $itemPerPage);

    // var_dump($categorizedItems); die();
}

?>

<!--================================
        ==*****Category Section Start*****==
        ==================================-->
<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Category</a></li>
                    <li class="active"><span><?php
                            if (!empty($categorizedItems[0]))
                                echo $categorizedItems[0]['product_category'] ?></span></li>
                </ol>
            </div>
        </div>

        <div class="row" style="padding: 20px 0;">
            <div class="col-md-12 col-sm-12">
                <form action="" method="get" class="filter-form">
                    <select class="selectpicker" name='itemPerPage'>
                        <option value="5" <?php if ($itemPerPage == 5) echo "selected" ?> >5</option>
                        <option value="10" <?php if ($itemPerPage == 10) echo "selected" ?> >10</option>
                        <option value="15" <?php if ($itemPerPage == 15) echo "selected" ?> >15</option>
                        <option value="20" <?php if ($itemPerPage == 20) echo "selected" ?> >20</option>
                    </select>
                    <input type="submit" value="Go" class="logout-button go-button"/>
                </form>
            </div>
            <div class="category-base-product col-md-12 col-sm-12 col-xs-12">

                <?php foreach ($categorizedItems as $item) {
                    ?>
                    <div class="product col-md-4 col-sm-6">
                        <div class="product-body">
                            <div class="product-name">
                                <h4>
                                    <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=0"> <?php echo $item['product_name'] ?></a>
                                </h4>
                            </div>
                            <div class="product-auction-id">
                                <p>Auction ID. BB12168</p>
                            </div>
                            <div class="product-image">
                                <a href="product-details.php?product_id=<?php echo $item['id'] ?>&from_active=0"><img
                                            src="assets/images/uploaded_items/<?php echo $item['product_image']; ?>"
                                            alt=""/></a>
                            </div>
                            <div class="product-price-and-time">
                                <div class="product-price">
                                    <p><?php echo $item['product_price'] ?></p>
                                </div>
                                <div class="countdown-time">
                                    <p>11:09:00</p>
                                    <span>Waiting For Bid</span>
                                </div>
                            </div>
                            <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {

                                ?>
                                <div class="product-bid-btn">
                                    <a href="">
                                        <button type="button" class="btn btn-danger">BID NOW</button>
                                    </a>
                                </div>
                            <?php } ?>
                            <div style="clear: both"></div>
                        </div>
                    </div>
                <?php } ?>

                <div style="clear:both"></div>


                <ul class="pagination pull-right">
                    <li

                        <?php
                        if ($pageNumber <= 1) {

                            ?>

                            class="hidden"

                            <?php
                        }
                        ?>

                    ><a href="category.php?pageNumber=<?php echo($pageNumber - 1) ?>>"><span
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


                    ><a href="category.php?pageNumber=<?php echo($pageNumber + 1) ?>>"><span
                                    class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>


            </div>
        </div>


    </div>
</section>
<!--===================================
    ===*****Category Us Section End*****===
    =====================================-->

<?php include_once 'inc/footer.php'; ?>



