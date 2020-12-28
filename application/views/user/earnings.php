
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Earnings: <?php echo $sum; ?></h2>
						<button class="btn btn-primary my_btn" onclick="fnExcelReport()" style="width:200px !important; margin-left:77%">Export to Excel</button>

					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<div class="panel-body">
									<a class="modal-with-form m_add" href="#add_modal"><i class="fa fa-plus" aria-hidden="true"></i>&nbspAdd New Earning</a>
									<br/>
									<br/>
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
										<thead>
											<tr>
												<th>No</th>
												<th>Date</th>
												<th>Amount</th>
												<th>Payment source</th>
												<th>Tasks</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i=0; $i < count($data); $i++) { ?>
											<tr class="gradeX">
												<td><?php echo $i+1; ?></td>
												<td><?php echo $data[$i]['date'];?></td>
												<td><?php echo $data[$i]['amount'];?></td>
												<td><?php echo $data[$i]['info'];?></td>
												<td><?php echo $data[$i]['task'];?></td>
												<td class="center">
													<?php if($data[$i]['locked']==0){ ?>
	                                                <input type="hidden" class="m_hide" value="<?php echo $i; ?>">
													<a class="modal-with-form m_edit" href="#edit_modal" style="color: blue;">EDIT</a> &nbsp|&nbsp
													<?php } ?>
													<a class="modal-basic" href="#modalBasic_<?php echo $i;?>" style="color: red;">DELETE</a>

													<div id="modalBasic_<?php echo $i;?>" class="modal-block mfp-hide">
														<section class="panel">
															<header class="panel-heading">
																<h2 class="panel-title">Warning</h2>
															</header>
															<div class="panel-body">
																		<p>Are you sure to delete this item?</p>
															</div>
															<footer class="panel-footer">
																<div class="row">
																	<div class="col-md-12 text-right">
																		<a class="btn btn-primary" href="<?php echo base_url().'user/delete_item/tbl_earning/'.$data[$i]['id']; ?>" >Confirm</a>
																		<a class="btn btn-default modal-dismiss">Cancel</a>
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
												<h2 class="panel-title">Add New Earning</h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" action="#" method="post" class="form-horizontal mb-lg" novalidate="novalidate">
													<div class="form-group">
														<label class="col-sm-3 control-label">Amount</label>
														<div class="col-sm-9">
															<input id="add_amount" type="number" name="amount" class="form-control" placeholder="Type amount..." required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Payment source</label>
														<div class="col-sm-9">
															<input id="add_payment_email" type="email" name="info" class="form-control" placeholder="Type payment source..." required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Task</label>
														<div class="col-sm-9">
															<input id="add_task" type="text" name="task" class="form-control" placeholder="Type your task..." required/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Released on</label>
														<div class="col-sm-5">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input id="add_date" type="text" data-plugin-datepicker class="form-control" name="date">
															</div>												
														</div>
													</div>
												</form>
												<p id="add_warning" style="color: red; text-align: center;" hidden="hidden">Warning </p>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button id="add_button" class="btn btn-primary">Submit</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

									<!-- Modal Form -->
									<div id="edit_modal" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Edit Earning</h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" action="#" method="post" class="form-horizontal mb-lg" novalidate="novalidate">
									                <input id="edit_id" name="edit_id" type="hidden">
													<div class="form-group">
														<label class="col-sm-3 control-label">Amount</label>
														<div class="col-sm-9">
															<input id="edit_amount" type="number" name="amount" class="form-control" placeholder="Type amount..." required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Payment source</label>
														<div class="col-sm-9">
															<input id="edit_payment_email" type="email" name="info" class="form-control" placeholder="Type payment source..." required/>
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Task</label>
														<div class="col-sm-9">
															<input id="edit_task" type="text" name="task" class="form-control" placeholder="Type your task..." required/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Released on</label>
														<div class="col-sm-5">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input id="edit_date" type="text" data-plugin-datepicker class="form-control" name="date">
															</div>												
														</div>
													</div>
												</form>
												<p id="edit_warning" style="color: red; text-align: center;" hidden="hidden">Warning </p>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button id="edit_button" class="btn btn-primary">Submit</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
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
	$('#add_date').datepicker({
		autoclose:true,
		format: 'yyyy-mm-dd',
		language: 'en',
		minViewMode:0,
	});
	$('#edit_date').datepicker({
		autoclose:true,
		format: 'yyyy-mm-dd',
		language: 'en',
		minViewMode:0,
	});
        var data = [];
        <?php for ($i = 0; $i < count($data); $i++) {?>
            data[<?php echo $i; ?>] = [];
            data[<?php echo $i; ?>]['id'] = "<?php echo $data[$i]['id']; ?>";
            data[<?php echo $i; ?>]['info'] = "<?php echo $data[$i]['info']; ?>";
            data[<?php echo $i; ?>]['amount'] = "<?php echo $data[$i]['amount']; ?>";
            data[<?php echo $i; ?>]['task'] = "<?php echo $data[$i]['task']; ?>";
            data[<?php echo $i; ?>]['date'] = "<?php echo $data[$i]['date']; ?>";
        <?php } ?>
        $("a.m_edit").click(function() {
            var i = $(this).parent().find(".m_hide").val();
            $("#edit_id").val(data[i]['id']);
            $("#edit_payment_email").val(data[i]['info']);
            $("#edit_amount").val(data[i]['amount']);
            $("#edit_task").val(data[i]['task']);
            $("#edit_date").val(data[i]['date']);
            $("#edit_warning").hide();
        });
        $("a.m_add").click(function() {
            $("#add_payment_email").val("");
            $("#add_task").val('');
            $("#add_date").val('');
            $("#add_amount").val('');
            $("#add_warning").hide();
        });
        $("#add_button").click(function() {
            var amount = $("#add_amount").val().trim();
            if (amount == '') {
                $("#add_warning").show();
                $("#add_warning").text("Please input 'Amount' field.");
                $("#add_amount").val('');
                return;
            }
            var info = $("#add_payment_email").val().trim();
            if (info == '') {
                $("#add_warning").show();
                $("#add_warning").text("Please input 'Payment Email' field.");
                $("#add_payment_email").val('');
                return;
            }
            var task = $("#add_task").val().trim();
            if (task == '') {
                $("#add_warning").show();
                $("#add_warning").text("Please input 'Task' field.");
                $("#add_task").val('');
                return;
            }
            var date = $("#add_date").val().trim();
            if (date == '') {
                $("#add_warning").show();
                $("#add_warning").text("Please input 'Released on' field.");
                $("#add_date").val('');
                return;
            }

            $("#add_warning").hide();
            var data = {'info':info, 'task':task, 'amount':amount, 'date':date};
            $.ajax({url: "<?php echo base_url(); ?>user/add_earning", data:data, type:'POST', success: function(result){
                if (result == 200) {
                    // window.history.go(0);
                    location.reload();
                } else if (result == 400) {
	                $("#add_warning").show();
	                $("#add_warning").text("Payment email is not correct.");
                } else {
                    alert('Add Error');
                }
            }});
        });

        $("#edit_button").click(function() {
            var id = $("#edit_id").val().trim();
            var amount = $("#edit_amount").val().trim();
            if (amount == '') {
                $("#edit_warning").show();
                $("#edit_warning").text("Please input 'Amount' field.");
                $("#edit_amount").val('');
                return;
            }
            var info = $("#edit_payment_email").val().trim();
            if (info == '') {
                $("#edit_warning").show();
                $("#edit_warning").text("Please input 'Payment Email' field.");
                $("#edit_payment_email").val('');
                return;
            }
            var task = $("#edit_task").val().trim();
            if (task == '') {
                $("#edit_warning").show();
                $("#edit_warning").text("Please input 'Task' field.");
                $("#edit_task").val('');
                return;
            }
            var date = $("#edit_date").val().trim();
            if (date == '') {
                $("#edit_warning").show();
                $("#edit_warning").text("Please input 'Released on' field.");
                $("#edit_date").val('');
                return;
            }
            var amount = $("#edit_amount").val().trim();
            if (amount == '') {
                $("#edit_warning").show();
                $("#edit_warning").text("Please input 'Amount' field.");
                $("#edit_amount").val('');
                return;
            }

            $("#edit_warning").hide();
            var data = {'id':id, 'info':info, 'amount':amount, 'task':task, 'date':date};
            $.ajax({url: "<?php echo base_url(); ?>user/edit_earning", data:data, type:'POST', success: function(result){
                if (result == 200) {
                    // window.history.go(0);
                    location.reload();                    
                } else if (result == 400) {
	                $("#edit_warning").show();
	                $("#add_warning").text("Payment email is not correct.");
                } else {
                    alert('Add Error');
                }
            }});
        });
}).apply( this, [ jQuery ]);

		</script>
	</body>
	<script type="text/javascript">
function fnExcelReport()
{

    var dt = new Date();
    var day = dt.getDate();
    var month = dt.getMonth() + 1;
    var year = dt.getFullYear();
    var hour = dt.getHours();
    var mins = dt.getMinutes();
    var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
    //creating a temporary HTML link element (they support setting file names)
    var a = document.createElement('a');
    //getting data from our div that contains the HTML table
    var data_type = 'data:application/vnd.ms-excel';
    var thead = '<th>Date</th><th>Amount</th><th>Payment Source</th><th>Task</th>';
    var tbody = '<tbody>';
    <?php for ($i = 0; $i < count($data); $i++) { ?>
        tbody += "<tr><td><?php echo $data[$i]['date']; ?></td><td><?php echo $data[$i]['amount']; ?></td><td><?php echo $data[$i]['info']; ?></td><td><?php echo $data[$i]['task']; ?></td></tr>";
    <?php } ?>
    tbody += '</tbody>';
    var table_html = '<table>'+ thead + tbody + '</table>';
    a.href = data_type + ', ' + table_html;
    //setting the file name
    a.download = 'Manager_earning(' + postfix + ').xls';
    //triggering the function
    a.click();
    //just in case, prevent default behaviour
    //e.preventDefault();
}
</script>

</html>