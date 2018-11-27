<?php
if (empty($_SESSION['admin_email']))
    session_start();
if (!isset($_SESSION['admin_email']) && empty($_SESSION['admin_email'])) {
    header('location:login.php');
}
include 'inc/header.php';?>


<?php
include_once ('../vendor/autoload.php');
use App\BidWarBd\User;
use App\BidWarBd\Auth;
use App\BidWarBd\BidWarBD;
use App\BidWarBd\Item;
use  App\BidWarBd\Contact;




$user = new User();
$item = new Item();
$contact = new Contact();

$getAllUsers = $user->totalUsers();
$totalUsers = count($getAllUsers);

$getAllApprovedUsers = $user->allApprovedUsers();
$totalApprovedUsers = count($getAllApprovedUsers);

$getAllBannedUsers = $user->bannedUsers();
$banned = count($getAllBannedUsers);

$getAllNewUsers = $user->newUsers();
$totalNewUser = count($getAllNewUsers);

$getAllClosedAds = $user->getUserClosedAd();
$totalClosedAds = count($getAllClosedAds);

$totalAdsNO = $item->totalAdsNumber();
//$totalClosedAdsNO = $item->totalCloesAdsNumber();
$totalApprovedAdsNo = $item->totalApprovedAdsNumber();
$totalNewAdsNo = $item->totalNewAdsNumber();
$totalMessage = $contact->totalMessageNumber();
//var_dump($totalCloedAds); die();
?>
    <!--In Which Page We Are Name Section Start-->
	<div class="main-bar">
		<h3>
			<i class="fa fa-home"></i>&nbsp; Home
		</h3>
	</div>
	<!--In Which Page We Are Name Section End-->
                               
<?php include 'inc/sidebar.php';?>
            
	<!--Main Body Content Section Start-->
	<div id="content">
		<div class="outer">
			<div class="inner bg-light lter">
				<div class="text-center">
					<ul class="stats_box">
						
						<li>
							<div class="stat_text">
								<i class=" fa fa-user fa-2x"></i> 	 
								<a href="new-users.php"><strong><?=$totalNewUser?></strong>
								<small>New Users</small></a>
							</div>
						</li>
						<li>
							<div class="stat_text">
								<i class=" fa fa-check-circle fa-2x"></i> 	 
								<a href="approved-users.php"><strong><?=$totalApprovedUsers?></strong>
								<small>Approved Users</small></a>
							</div>
						</li>
						<li>
							<div class="stat_text">
								<i class=" fa fa-ban fa-2x"></i> 	 
								<a href="banned-users.php"><strong><?=$banned?></strong>
								<small>Banned Users</small></a>
							</div>
						</li>
						<!--<li>
							<div class="stat_text">
								<i class=" fa fa-columns fa-2x"></i> 	 
								<strong><?=$totalAdsNO?></strong>
								<small>Total Ads</small>
							</div>
						</li>-->
						<li>
							<div class="stat_text">
								<i class=" fa fa-plus-square fa-2x"></i> 	 
								<a href="new-ads.php"> <strong><?=$totalNewAdsNo?></strong>
								<small>New Ads</small></a>
							</div>
						</li>
						<li>
							<div class="stat_text">
								<i class=" fa fa-check-square fa-2x"></i> 	 
								<a href="inbox.php"> <strong><?=$totalMessage?></strong>
								<small>Messages</small></a>
							</div>
						</li>
						

						<li>
							<div class="stat_text">
								<i class=" fa fa-eye-slash fa-2x"></i> 	 
								<a href="closed-ads.php"><strong><?=$totalClosedAds?></strong>
								<small>Closed Ads</small><a/>
							</div>
						</li>


						<li>
							<div class="stat_text">
								<i class=" fa fa-credit-card fa-2x"></i>
								<a href="transaction.php"><strong><?=$totalClosedAds?></strong>
								<small>Transactions</small></a>
							</div>
						</li>
					</ul>
				</div>
				<hr>

				<div class="row">
					<div class="col-lg-12">
						<div class="box">
							<header>
							<h5>Line Chart</h5>
							</header>
							<div class="body" id="trigo" style="height: 250px;"></div>
						</div>
					</div> 
				</div>
			</div>
			<!-- /.inner -->
		</div>
		<!-- /.outer -->
	</div>
	<!--Main Body Content Section End-->
            
            
<?php include 'inc/footer.php';?>        