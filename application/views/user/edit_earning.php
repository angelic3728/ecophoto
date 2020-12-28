
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Earning</h2>
					
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<div class="panel-body">
									<br><br><br>
									<form id="demo-form" action="#" method="post" class="form-horizontal mb-lg col-sm-9" novalidate="novalidate">
										<div class="form-group">
											<label class="col-sm-3 control-label">Amount</label>
											<div class="col-sm-9">
												<input type="number" name="email" class="form-control" placeholder="Type amount..." required/>
											</div>
										</div>
										<div class="form-group mt-lg">
											<label class="col-sm-3 control-label">Payment source</label>
											<div class="col-sm-9">
												<input type="email" name="name" class="form-control" placeholder="Type payment source..." required/>
											</div>
										</div>
										<div class="form-group mt-lg">
											<label class="col-sm-3 control-label">Task</label>
											<div class="col-sm-9">
												<input type="text" name="name" class="form-control" placeholder="Type your task..." required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Released on</label>
											<div class="col-sm-5">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
													<input id="date_picker" type="text" data-plugin-datepicker class="form-control">
												</div>												
											</div>
										</div>
									</form>
								</div>
								<footer class="panel-footer">
									<div class="row">
										<div class="col-md-12 text-right">
											<button class="btn btn-primary modal-confirm">Submit</button>
											<a href="<?php echo base_url();?>user/go_earnings" class="btn btn-default modal-dismiss">Cancel</a>
										</div>
									</div>
								</footer>							
							</section>
						</div>
					</div>
				</section>
			</div>
		</section>

		<!-- Specific Page Vendor -->
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/select2/select2.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/tables/examples.datatables.tabletools.js"></script>
		<!-- Examples -->
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

		<script type="text/javascript">

(function( $ ) {
	$('#date_picker').datepicker({
		autoclose:true,
		format: 'yyyy-mm-dd',
		language: 'en',
		minViewMode:0,
	});

}).apply( this, [ jQuery ]);

		</script>
	</body>

</html>