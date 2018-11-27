<?php include 'inc/header.php';
if (empty($_SESSION['admin_email']))
    session_start();
if (!isset($_SESSION['admin_email']) && empty($_SESSION['admin_email'])) {
    header('location:login.php');
}
?>

    <!--In Which Page We Are Name Section Start-->
	<div class="main-bar">
		<h3>
			<i class="fa fa-ban"></i> Banned Users
		</h3>
	</div>
	<!--In Which Page We Are Name Section End-->
                                
<?php include 'inc/sidebar.php';?>
	
	<!--Main Body Content Section Start--> 			
	<div id="content">
		<div class="outer">
			<div class="inner bg-light lter">                                              
				<div class="row">
					<div class="col-md-12"   style="margin:30px auto 0 auto;">
						<a href="">
							<button type="submit" name="delect_selected" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete All Selected</button>
						</a>
					</div>
					<div class="col-md-12"   style="margin-top:50px;margin-bottom: 50px;">
						<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th></th>
									<th><input type="checkbox" id="checkall" /></th>
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
								<tr>
									<td></td>
									<td><input type="checkbox" class="checkthis" /></td>
									<td>1</td>
									<td>Shaon</td>
									<td>01521401595</td>
									<td>Samsung Glaxy S8</td>
									<td style="text-align:center;"><img src="assets/img/s8.png" alt="product-name"/></td>
									<td>30000.00 Tk</td>
									<td>Lorem Ipsum Manu Sinu Denu Lipum Bori Cheena Kittu...</td>
									<td>
										<p data-placement="top" data-toggle="tooltip" title="Unban"><button class="btn btn-primary btn-xs" data-title="Unban" data-toggle="modal" data-target="#unban" ><span class="glyphicon glyphicon-ok-circle"></span></button></p>
									
										<p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
									</td>
								</tr>
								
								
								

							</tbody>
						</table>
						
						<!-- approve modal -->
						<div class="modal fade" id="unban" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
										<h4 class="modal-title custom_align" id="Heading">Unban this ads</h4>
									</div>
									<div class="modal-body">      
										<div class="alert alert-info"><span class="glyphicon glyphicon-ok-circle"></span> Are you sure you want to unban this Ads?</div>      
									</div>
									<div class="modal-footer ">
										<a href="unban.php"><button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button></a>
										<a href=""><button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button></a>
									</div>
								</div>
							</div>
						</div>
					   
						<!-- delete modal -->
						<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
										<h4 class="modal-title custom_align" id="Heading">Delete this ads</h4>
									</div>
									<div class="modal-body">      
										<div class="alert alert-danger"><span class="glyphicon glyphicon-trash"></span> Are you sure you want to delete this Ads?</div>      
									</div>
									<div class="modal-footer ">
										<a href="delete.php"><button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button></a>
										<a href=""><button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button></a>
									</div>
								</div>
							</div>
						</div>
						<!--***Modal For approve, ban, delete End**-->  
					</div>
				</div>                       
			</div>
		</div>
	</div>
	<!--Main Body Content Section End--> 
<?php include 'inc/footer.php';?>            