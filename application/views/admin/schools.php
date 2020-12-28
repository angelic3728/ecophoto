<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/intlTelInput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/demo.css">

				<section role="main" class="content-body">
					<header class="page-header">
						<h2><?php echo $this->lang->line('schools') ?></h2>
					
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<div class="panel-body">
									<a class="modal-with-form m_add" href="#add_modal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp<?php echo $this->lang->line('add_new_school'); ?></a>
									<br/>
									<br/>
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
										<thead>
											<tr>
												<th class="center"><?php echo $this->lang->line('number') ?></th>
												<th class="center"><?php echo $this->lang->line('name') ?></th>
												<th class="center"><?php echo $this->lang->line('dern') ?></th>
												<th class="center"><?php echo $this->lang->line('iep') ?></th>
												<th class="center"><?php echo $this->lang->line('status') ?></th>
												<th class="center"><?php echo $this->lang->line('school_code') ?></th>
												<th class="center"><?php echo $this->lang->line('action') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i=0; $i < count($data); $i++) { ?>
											<tr class="gradeX">
												<td class="center"><?php echo $i+1; ?></td>
												<td class="center"><?php echo $data[$i]['name']; ?></td>
												<td class="center"><?php echo $data[$i]['dern']; ?></td>
												<td class="center"><?php echo $data[$i]['iep']; ?></td>
												<td class="center"><?php echo ($data[$i]['statut'] == "1")?"Public":"Private"; ?></td>
												<td class="center"><?php echo $data[$i]['code']; ?></td>
												<td class="center">
													<input type="hidden" class="m_hide" value="<?php echo $i; ?>" />
													<a class="" href="<?php echo base_url()?>admin/school_students/<?php echo $data[$i]['code'] ?>" style="color: green;"><?php echo $this->lang->line('students') ?></a> &nbsp|&nbsp
													<a class="modal-with-form m_edit" href="#edit_modal" style="color: blue;"><?php echo $this->lang->line('edit') ?></a> &nbsp|&nbsp
													<a class="modal-basic" href="#modalBasic_<?php echo $i;?>" style="color: red;"><?php echo $this->lang->line('delete') ?></a>

													<div id="modalBasic_<?php echo $i;?>" class="modal-block mfp-hide">
														<section class="panel">
															<header class="panel-heading">
																<h2 class="panel-title"><?php echo $this->lang->line('warning') ?></h2>
															</header>
															<div class="panel-body">
																		<p><?php echo $this->lang->line('delete_item') ?></p>
															</div>
															<footer class="panel-footer">
																<div class="row">
																	<div class="col-md-12 text-right">
																		<a class="btn btn-primary delete_school_btn" data-value="<?php echo $data[$i]['code'] ?>" ><?php echo $this->lang->line('confirm') ?></a>
																		<a class="btn btn-default modal-dismiss"><?php echo $this->lang->line('cancel') ?></a>
																	</div>
																</div>
															</footer>
														</section>
													</div>
													
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>							
								</div>
							</section>
						</div>
					</div>
				</section>
			</div>
		</section>
		<!-- Modal Form -->
		<div id="add_modal" class="modal-block modal-block-primary mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title"><?php echo $this->lang->line('add_new_school') ?></h2>
				</header>
				<div class="panel-body">
					<form id="add-form" action="#" method="post" class="form-horizontal mb-lg" >
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('name') ?></label>
							<div class="col-sm-9">
								<input id="add_name" type="text" name="add_name" class="form-control" placeholder="Type name..."/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('dern') ?></label>
							<div class="col-sm-9">
								<input id="add_dern" type="text" name="add_dern" class="form-control" placeholder="Type DERN..."/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('iep') ?></label>
							<div class="col-sm-9">
								<input id="add_iep" type="text" name="add_iep" class="form-control" placeholder="Type IEP..."/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('status') ?></label>
							<div class="col-sm-9">
								<select id="add_status" name="add_status" class="form-control">
									<option value="1">Public</option>
									<option value="2">Private</option>
								</select>
							</div>
						</div>
						<div class="form-group mt-lg">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('school_code') ?></label>
							<div class="col-sm-6">
								<input id="add_code" name="add_code" type="text"  class="form-control" disabled>
							</div>
							<div class="col-sm-3">
								<button type="button" class="btn btn-success" id="add_generate_digits" class="form-control" style="width: 100%"><?php echo $this->lang->line('generate') ?></button>
							</div>
						</div>
						
					</form>
					<p id="add_warning" style="color: red; text-align: center;" hidden="hidden"><?php echo $this->lang->line('warning') ?> </p>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button id="add_button" class="btn btn-primary"><?php echo $this->lang->line('submit') ?></button>
							<button class="btn btn-default modal-dismiss"><?php echo $this->lang->line('cancel') ?></button>
						</div>
					</div>
				</footer>
			</section>
		</div>
		<!-- Modal Form -->
		<div id="edit_modal" class="modal-block modal-block-primary mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title"><?php echo $this->lang->line('edit_school') ?></h2>
				</header>
				<div class="panel-body">
					<form id="edit-form" action="#" method="post" class="form-horizontal mb-lg" novalidate="novalidate">
						<input id="edit_id" name="edit_id" type="hidden">
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('name') ?></label>
							<div class="col-sm-9">
								<input id="edit_name" type="text" name="edit_name" class="form-control" placeholder="Type name..."/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('dern') ?></label>
							<div class="col-sm-9">
								<input id="edit_dern" type="text" name="edit_dern" class="form-control" placeholder="Type DERN..."/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('iep') ?></label>
							<div class="col-sm-9">
								<input id="edit_iep" type="text" name="edit_iep" class="form-control" placeholder="Type IEP..."/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('status') ?></label>
							<div class="col-sm-9">
								<select id="edit_school_status" name="edit_school_status" class="form-control">
									<option value="1">Public</option>
									<option value="2">Private</option>
								</select>
							</div>
						</div>
						<div class="form-group mt-lg">
							<label class="col-sm-3 control-label"><?php echo $this->lang->line('school_code') ?></label>
							<div class="col-sm-5">
								<input id="edit_code" name="edit_code" type="text"  class="form-control" disabled>
							</div>
							<div class="col-sm-4">
								<button type="button" class="btn btn-success" id="edit_generate_digits" class="form-control" style="width: 100%">Generate</button>
							</div>
						</div>
					</form>
					<p id="edit_warning" style="color: red; text-align: center;" hidden="hidden"><?php echo $this->lang->line('warning') ?> </p>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button id="edit_button" class="btn btn-primary"><?php echo $this->lang->line('submit') ?></button>
							<button class="btn btn-default modal-dismiss"><?php echo $this->lang->line('cancel') ?></button>
						</div>
					</div>
				</footer>
			</section>
		</div>
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
		<!-- Examples -->
		<script src="<?php echo base_url(); ?>/assets/backend/javascripts/ui-elements/examples.modals.js"></script>
		<script src="<?php echo base_url(); ?>/assets/backend/mybuild/js/intlTelInput.js"></script>
<script>
	var data = [];

        <?php for ($i = 0; $i < count($data); $i++) {?>
		data[<?php echo $i; ?>] = [];
		data[<?php echo $i; ?>]['id'] = "<?php echo $data[$i]['id']; ?>";
		data[<?php echo $i; ?>]['name'] = "<?php echo $data[$i]['name']; ?>";
		data[<?php echo $i; ?>]['dern'] = "<?php echo $data[$i]['dern']; ?>";
		data[<?php echo $i; ?>]['iep'] = "<?php echo $data[$i]['iep']; ?>";
		data[<?php echo $i; ?>]['statut'] = "<?php echo $data[$i]['statut']; ?>";
		data[<?php echo $i; ?>]['code'] = "<?php echo $data[$i]['code']; ?>";
        <?php } ?>

        $("a.m_edit").click(function() {
			var i = $(this).parent().find(".m_hide").val();
			$("#edit_id").val(data[i]['id']);
			$("#edit_name").val(data[i]['name']);
			$("#edit_dern").val(data[i]['dern']);
			$("#edit_iep").val(data[i]['iep']);
			$("#edit_school_status").val(data[i]['statut']);
			$("#edit_code").val(data[i]['code']);
			$("#edit_warning").hide();
		});

        $("a.m_add").click(function() {
		$("#add_name").val('');
		$("#add_dern").val('');
		$("#add_iep").val('');
		$("#add_code").val('');
		$("#add_warning").hide();
        });

        $("#add_generate_digits").click(function() {
			$.ajax({
				url : "<?php echo base_url(); ?>admin/generate_digits", 
				data : data, 
				type : 'POST', 
				success: function(result) {
					if (result.length == 5) {
						$("#add_code").val(result);
					} else {
						alert('Error occured!');	
					}
				}
			});
        });

        $("#edit_generate_digits").click(function() {
			$.ajax({
				url : "<?php echo base_url(); ?>admin/generate_digits", 
				data : data, 
				type : 'POST', 
				success: function(result) {
					if (result.length == 5) {
						$("#edit_code").val(result);
					} else {
						alert('Error occured!');	
					}
				}
			});
        });

        $("#add_button").click(function() {
			var name = $("#add_name").val().trim();
			if (name == '') {
				$("#add_warning").show();
				$("#add_warning").text("Please input 'Name' field.");
				$("#add_name").val('');
				return;
			}
			var dern = $("#add_dern").val().trim();
			if (dern == '') {
				$("#add_warning").show();
				$("#add_warning").text("Please input 'DERN' field.");
				$("#add_dern").val('');
				return;
			}
			var iep = $("#add_iep").val().trim();
			if (iep == '') {
				$("#add_warning").show();
				$("#add_warning").text("Please input 'IEP' field.");
				$("#add_iep").val('');
				return;
			}

			var status = $("#add_status").val();

			var school_code = $("#add_code").val().trim();
			console.log(school_code);
			if (school_code == '') {
				$("#add_warning").show();
				$("#add_warning").text("Please click Generate button.");
				$("#add_code").val('');
				return;
			}

			$("#add_warning").hide();
			var data = {
				'name'         : name,
				'dern'         : dern,
				'iep'     	   : iep, 
				'status'       : status, 
				'school_code'  : school_code
			};
			$.ajax({
				url : "<?php echo base_url(); ?>admin/add_school", 
				data : data, 
				type : 'POST', 
				success: function(result) {
					if (result == 200) {
						// window.history.go(0);
						location.reload();
					} else if (result == 400) {
						$("#add_warning").show();
						$("#add_warning").text("School Code already exists. Please generate another school code.");
					} else {
						alert('Add Error');
					}
				}
			});
        });

        $("#edit_button").click(function() {
		var id = $("#edit_id").val().trim();
		var name = $("#edit_name").val().trim();
		if (name == '') {
			$("#edit_warning").show();
			$("#edit_warning").text("Please input 'Name' field.");
			$("#edit_name").val('');
			return;
		}
		var dern = $("#edit_dern").val().trim();
		if (dern == '') {
			$("#edit_warning").show();
			$("#edit_warning").text("Please input 'DERN' field.");
			$("#edit_dern").val('');
			return;
		}
		var iep = $("#edit_iep").val().trim();
		if (iep == '') {
			$("#edit_warning").show();
			$("#edit_warning").text("Please input 'IEP' field.");
			$("#edit_iep").val('');
			return;
		}
		var status = $("#edit_school_status").val();
		var school_code = $("#edit_code").val();
		if (school_code == '') {
			$("#edit_warning").show();
			$("#edit_warning").text("Please click Generate button.");
			$("#school_code").val('');
			return;
		}

		$("#edit_warning").hide();

		var data = {
			'id'           : id,
			'name'         : name,
			'dern'         : dern,
			'iep'     	   : iep, 
			'status'       : status, 
			'school_code'  : school_code
		};

		$.ajax({
			url : "<?php echo base_url(); ?>admin/edit_school", 
			data : data, 
			type : 'POST', 
			success: function(result) {
				if (result == 200) {
					// window.history.go(0);
					location.reload();                    
				} else if (result == 400) {
					$("#edit_warning").show();
					$("#edit_warning").text("School code already exists. Please try again.");
				} else {
					alert('Add Error');
				}
			}
		});
	});

	$(".delete_school_btn").click(function() {
		var s_code = $(this).data("value");
        var data = {
            's_code' : s_code
        }
        $.ajax({
            url: "<?php echo base_url(); ?>admin/delete_school",
            data: data,
            type: 'POST',
            success: function(result) {
                if (result == 200) {
                    // window.history.go(0);
                    location.reload();
                } else {
                    alert('Add Error');
                }
            }
        });
	})

</script>
</body>
</html>
