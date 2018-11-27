<?php include_once 'inc/header.php';?>

<?php
use App\BidWarBd\BidWarBD;

include_once('vendor/autoload.php');
$index = new BidWarBD();


if (array_key_exists('itemPerPage', $_SESSION)) {
    if (array_key_exists('itemPerPage', $_GET)) {
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
    }
} else {
    $_SESSION['itemPerPage'] = 5;
}

$itemPerPage = $_SESSION['itemPerPage'];

$totalItem = $index->countForLoadRecentClosedAuctions();
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
        $pagination .= "<li class='$class'><a href=recently-closed-auctions.php?pageNumber=$i' >$i</a></li>";
    }
}
$pageStartFrom = $itemPerPage * ($pageNumber - 1);


$allClosedItems = $index->paginateforRecentClosedAuctions($pageStartFrom, $itemPerPage);


?>



<!--=======================================
        ==*****Closed Auctions Section Start*****==
        =========================================-->
        <section class="container-fluid" id="closed-auction">
            <div class="container">
                <div class="row" style="padding: 0;margin-top: 70px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ol class="breadcrumb breadcrumb-arrow">
                            <li><a href="index.php">Home</a></li>
                            <li class="active"><span>Recently Closed Auctions</span></li>
                        </ol>
                    </div>
                </div>
                
                <div class="row" style="padding:20px 10px; margin-bottom: 70px;">
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
                    <?php foreach ($allClosedItems as $item) {
                    ?>
                    <!--**Item-1**-->
                    <div class="closed-item col-md-3 col-sm-6 col-xs-12">
                        <div class="closed-item-body">
                            <div class="closed-item-name">
                                <h4><a href="product-details.php?product_id=<?php echo $item['id'] ?>"><?php echo $item['product_name'] ?></a></h4>
                            </div>
                            <div class="closed-item-auction-id">
                                <p>Auction ID. BB12168</p>
                            </div>
                            <div class="closed-item-image">
                                <a href="product-details.php?product_id=<?php echo $item['id'] ?>"><img src="assets/images/uploaded_items/<?php echo $item['product_image']; ?>" alt=""/></a>
                            </div>
                            <div class="closed-item-winner-name">
                                <div class="closed"><p>CLOSED</p></div>
                                <div class="winner-name"><p><span class="glyphicon glyphicon-tower"></span> Arman</p></div>
                            </div>
                            <div class="closed-item-price">
                                <p>Ended 500000.00 Tk</p>
                            </div>
                        </div>                                    
                    </div>
                    <!--**Item-1**-->
                    <?php } ?>

                    <div style="clear: both"></div>


                    <ul class="pagination pull-right">
                        <li

                            <?php
                            if ($pageNumber <= 1) {

                                ?>

                                class="hidden"

                                <?php
                            }
                            ?>

                        ><a href="recently-closed-auctions.php?pageNumber=<?php echo($pageNumber - 1) ?>>"><span
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


                        ><a href="recently-closed-auctions.php?pageNumber=<?php echo($pageNumber + 1) ?>>"><span
                                    class="glyphicon glyphicon-chevron-right"></span></a></li>
                    </ul>
                </div>
                                                      
                        
            </div>
        </section>
        <!--=====================================
        ==*****Closed Auctions Section End*****==
        =======================================-->

<?php include_once 'inc/footer.php';?>

