<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/demo.css">

<section role="main" class="content-body">
	<header class="page-header">
		<h2><?php echo $this->lang->line('unimatched_photos') ?></h2>
	</header>

	<!-- start: page -->
	<div class="row">
		<div class="pre_loader">
			<div class="spinner-body">
				<div class="spinner-border text-success"></div>
			</div>
		</div>
		<div class="col-md-12">
			<section class="panel">
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th class="center"><?php echo $this->lang->line('number') ?></th>
								<th class="center"><?php echo $this->lang->line('model_photo') ?></th>
								<th class="center"><?php echo $this->lang->line('unimatched_photo') ?></th>
								<th class="center"><?php echo $this->lang->line('student_id') ?></th>
								<th class="center"><?php echo $this->lang->line('compared_at') ?></th>
								<th class="center"><?php echo $this->lang->line('taken_by') ?></th>
								<th class="center"><?php echo $this->lang->line('action') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i = 0; $i < count($data); $i++) { ?>
								<tr class="gradeX">
									<td class="center"><?php echo $i + 1; ?></td>
									<td class="center">
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['standard_img']; ?>" class="image-popup-no-margins">
											<img style="height:80px; width: auto;" src="<?php echo base_url() . 'uploads/' . $data[$i]['standard_img']; ?>" />
										</a><br>
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['standard_img']; ?>" download="<?php $data[$i]['student_id']; ?>_standard.jpg"><?php echo $this->lang->line('download') ?></a>
									</td>
									<td class="center">
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['photo_path']; ?>" class="image-popup-no-margins">
											<img style="height:80px; width: auto;" src="<?php echo base_url() . 'uploads/' . $data[$i]['photo_path']; ?>" />
										</a><br>
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['photo_path']; ?>" download="<?php $data[$i]['student_id']; ?>.jpg"><?php echo $this->lang->line('download') ?></a>
									</td>
									<td class="center"><?php echo $data[$i]['student_id']; ?></td>
									<td class="center"><?php echo $data[$i]['uploaded_at']; ?></td>
									<td class="center"><?php echo $data[$i]['user']; ?></td>
									<td class="center">
										<a class="modal-basic" href="#modalBasic_<?php echo $i; ?>" style="color: red;"><?php echo $this->lang->line('delete') ?></a>
										<div id="modalBasic_<?php echo $i; ?>" class="modal-block mfp-hide">
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
															<a class="btn btn-primary" href="<?php echo base_url() . 'admin/delete_item/tbl_photo_history/' . $data[$i]['id']; ?>"><?php echo $this->lang->line('confirm') ?></a>
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

<!-- Specific Page Vendor -->
<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/vendor/magnific-popup/jquery.magnific-popup.js"></script>

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
<script src="<?php echo base_url(); ?>/assets/backend/javascripts/ui-elements/examples.modals.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/javascripts/ui-elements/examples.lightbox.js"></script>
<script src="<?php echo base_url(); ?>/assets/backend/face_similarity/face-api.js"></script>

</body>
<script type="text/javascript">
</script>

</html>