<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/demo.css">
<style>
::placeholder {
  color: #aaaaaa;
  font-size: 1.2em;
}
.api-input {
	border: solid 0.5px;
    text-indent: 5px;
    width: 110px;
    height: 30px;
	font-size: 13px;
	margin-left:3px;
}
</style>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>API</h2>
					
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col">
												<div class="summary">
													<p style="color:red; font-size:20px;"><?php echo $this->lang->line('get_photo') ?></p>
													<div class="info">
														<p style="font-size:15px;">Request</p>
														<div class="row">
															<div class="col-sm-6">
																<p style="font-size:14px; color:#309ea5;"><?php echo base_url();?>api/get_photo/<input id="student_id" class="api-input" placeholder="student_id" /></p>
															</div>
															<div class="col-sm-6">
																<button id="btn_photo" class="btn btn-primary" style="width:100px;" ><?php echo $this->lang->line('run') ?></button>
															</div>
														</div>
														<hr>
														<p style="font-size:15px;">Reponse (base64 encoded string)</p>
														<div class="row">
															<div class="col-sm-12">
																<p id="response_photo" style="font-size:13px; color:gray;"></p>
																<a id="full_photo" target="_blank" style="display: none;" href="#" ><img id="photo" style="height:80px; width: auto;" src=""/>&nbsp; <?php echo $this->lang->line('see_full_iamge') ?></a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
								<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col">
												<div class="summary">
													<p style="color:red; font-size:20px;"><?php echo $this->lang->line('get_photos_by_school_code') ?></p>
													<div class="info">
														<p style="font-size:15px;">Request</p>
														<div class="row">
															<div class="col-sm-6">
																<p style="font-size:14px; color:#309ea5;"><?php echo base_url();?>api/get_photo_school/<input id="school_code" class="api-input" placeholder="school_code" /></p>
															</div>
															<div class="col-sm-6">
																<button id="btn_photo_school" class="btn btn-primary" style="width:100px;" ><?php echo $this->lang->line('run') ?></button>
															</div>
														</div>
														<hr>
														<p style="font-size:15px;">Reponse (base64 encoded string)</p>
														<div class="row">
															<div class="col-sm-12">
																<p id="response_photo_school" style="font-size:13px; color:gray;"></p>
																<!-- <a id="full_photo" target="_blank" style="display: none;" href="#" ><img id="photo" style="height:80px; width: auto;" src=""/>&nbsp; See full image</a> -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</section>
						</div>
					</div>
				</section>
			</div>
		</section>

		<!-- Specific Page Vendor -->
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
		<script src="<?php echo base_url(); ?>/assets/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

		<!-- Examples -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/ui-elements/examples.modals.js"></script>

		<script type="text/javascript">

(function( $ ) {
	$("#btn_photo").click(function() {
		var id = $("#student_id").val().trim();
		console.log(id);
		if(id.length == 0) {
			return;
		}
		$.ajax({url: "<?php echo base_url(); ?>api/get_photo/"+id, type:'POST', success: function(result){
			var status = JSON.parse(result)['status'];
			if (status == 200) {
				var base64Code = JSON.parse(result)['data'];
				console.log(base64Code);
				$("#response_photo").text('{"status":200,"data":"'+base64Code.substr(0, 100)+'..."}');
				$("#photo").attr("src", "data:image/jpg;base64,"+base64Code);
				$("#full_photo").attr("href", "<?php echo base_url(); ?>api/display_photo/"+id);
				$("#full_photo").show();
				// $("#response_photo").text(result);
			} else {
				$("#response_photo").text('{"status":400,"error":"Invalid student_id"}');
				$("#full_photo").hide();
			}
		}});
	});
	$("#btn_photo_school").click(function() {
		var id = $("#school_code").val().trim();
		console.log(id);
		if(id.length == 0) {
			return;
		}
		$.ajax({url: "<?php echo base_url(); ?>api/get_photo_school/"+id, type:'POST', success: function(result){
			var status = JSON.parse(result)['status'];
			if (status == 200) {
				var array = JSON.parse(result)['data'];
				var data="";
				for (var i = 0; i < array.length; i++) {
					var base64Code = array[i]['photo'];
					var student_id = array[i]['student_id'];
					console.log(base64Code);
					if(i == 0) {
						data += "[";
						data += '{"student_id":"'+student_id+'","photo":"'+base64Code.substr(0, 100)+'..."},';
					} else {
						data += '{"student_id":"'+student_id+'","photo":"'+base64Code.substr(0, 100)+'..."}';
						data += "]";
					}
				}
				$("#response_photo_school").text('{"status":200,"data":'+data);
			} else {
				$("#response_photo_school").text('{"status":400,"error":"Invalid school_code"}');
				$("#full_photo_school").hide();
			}
		}});
	});

}).apply( this, [ jQuery ]);

		</script>
	</body>

</html>