
				<section role="main" class="content-body">
					<header class="page-header">
						<h2><?php echo $this->lang->line('profile') ?></h2>
					
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<div class="panel-body">
									<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title"><?php echo $this->lang->line('edit_profile') ?></h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" action="#" method="post" class="form-horizontal mb-lg" novalidate="novalidate">
													<div class="form-group">
														<label class="col-sm-3 control-label"><?php echo $this->lang->line('user_id') ?></label>
														<div class="col-sm-9">
															<input id="userid" type="text" name="userid" class="form-control" placeholder="Type your UserID..." required value="<?php echo $data['userid'];?>" />
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><?php echo $this->lang->line('name') ?></label>
														<div class="col-sm-9">
															<input id="name" type="text" name="name" class="form-control" placeholder="Type your name..." required value="<?php echo $data['name'];?>" />
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><?php echo $this->lang->line('current_pwd') ?></label>
														<div class="col-sm-9">
															<input id="cur_password" type="text" name="cur_password" class="form-control" placeholder="Type site password..." required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><?php echo $this->lang->line('new_pwd') ?></label>
														<div class="col-sm-9">
															<input id="new_password" type="text" name="new_password" class="form-control" placeholder="Type site password..." required/>
														</div>
													</div>
												</form>
												<p id="warning" style="color: red; text-align: center;" hidden="hidden"><?php echo $this->lang->line('warning') ?> </p>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button id="submit" class="btn btn-primary"><?php echo $this->lang->line('submit') ?></button>
													</div>
												</div>
											</footer>
										</section>							
								</div>
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
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/ui-elements/examples.modals.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

		<script type="text/javascript">

(function( $ ) {

        $("#submit").click(function() {
            var userid = $("#userid").val().trim();
            var name = $("#name").val().trim();
            var cur_password = $("#cur_password").val();
            var new_password = $("#new_password").val();
            if (userid == '') {
                $("#warning").show();
                $("#warning").text("Please input 'UserID' field.");
                $("#userid").val('');
                return;
            }
            if (name == '') {
                $("#warning").show();
                $("#warning").text("Please input 'Name' field.");
                $("#name").val('');
                return;
            }
            if (cur_password == '') {
                $("#warning").show();
                $("#warning").text("Please input 'Current Password' field.");
                $("#cur_password").val('');
                return;
            }
            if (new_password == '') {
                $("#warning").show();
                $("#warning").text("Please input 'New Password' field.");
                $("#new_password").val('');
                return;
            }
            $("#warning").hide();
            var data = {'userid':userid,'name':name, 'cur_password':cur_password, 'new_password':new_password};
			var url = "<?php echo base_url().$_SESSION[S_SITE][S_DATA]['type'].'/update_profile'?>";
            $.ajax({url: url, data:data, type:'POST', success: function(result){
				// var_dump($result);
				if (result == 200) {
                    // window.history.go(0);
                    alert('Successfully updated!');
                    location.reload();                    
                } else if (result == 400) {
	                $("#warning").text("Current password is not correct.");
					$("#warning").show();
                } else if (result == 401) {
	                $("#warning").text("UserID already exists.");
					$("#warning").show();
                } else {
                    alert('Update Error');
                }
            }});
        });
}).apply( this, [ jQuery ]);

		</script>
	</body>

</html>