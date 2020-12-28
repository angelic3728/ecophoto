<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend/mybuild/css/demo.css">

<section role="main" class="content-body">
	<header class="page-header">
		<h2><?php echo $this->lang->line('uploaded_photos') ?></h2>
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
					<?php
					if(count($data) != 0) {
					$compare_data = array();
					for ($i = 0; $i < count($data); $i++) {
						array_push($compare_data, array($data[$i]["id"], $data[$i]["standard_img"], $data[$i]["path"], $data[$i]["student_id"], $data[$i]["user_id"], $data[$i]["school_code"]));
					}
					?>
					<script type="text/javascript">
						var compare_data = <?php echo json_encode($compare_data); ?>;
					</script>
					<button class="btn btn-primary" id="compare_all" onclick="compare_all(compare_data)"><?php echo $this->lang->line('compare_all') ?></button>
					<br />
					<br />
					<?php } ?>
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th class="center"><?php echo $this->lang->line('number') ?></th>
								<th class="center"><?php echo $this->lang->line('model_photo') ?></th>
								<th class="center"><?php echo $this->lang->line('new_photo') ?></th>
								<th class="center"><?php echo $this->lang->line('comparison') ?></th>
								<th class="center"><?php echo $this->lang->line('type') ?></th>
								<th class="center"><?php echo $this->lang->line('option') ?></th>
								<th class="center"><?php echo $this->lang->line('student_id') ?></th>
								<th class="center"><?php echo $this->lang->line('school_code') ?></th>
								<th class="center"><?php echo $this->lang->line('class_room') ?></th>
								<th class="center"><?php echo $this->lang->line('date') ?></th>
								<th class="center"><?php echo $this->lang->line('taken_by') ?></th>
								<th class="center"><?php echo $this->lang->line('action') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i = 0; $i < count($data); $i++) { ?>
								<tr class="gradeX">
									<input type="hidden" class="m_hide" value="<?php echo $i; ?>" />
									<td class="center"><?php echo $i + 1; ?></td>
									<td class="center">
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['standard_img']; ?>" class="image-popup-no-margins">
											<img style="height:80px; width: auto;" src="<?php echo base_url() . 'uploads/' . $data[$i]['standard_img']; ?>" id="standard_img_<?php echo $i; ?>" />
										</a><br>
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['standard_img']; ?>" download="<?php $data[$i]['student_id']; ?>_standard.jpg"><?php echo $this->lang->line('download') ?></a>
									</td>
									<td class="center">
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['path']; ?>" class="image-popup-no-margins">
											<img style="height:80px; width: auto;" src="<?php echo base_url() . 'uploads/' . $data[$i]['path']; ?>" id="uploaded_img_<?php echo $i; ?>" />
										</a><br>
										<a href="<?php echo base_url() . 'uploads/' . $data[$i]['path']; ?>" download="<?php $data[$i]['student_id']; ?>.jpg"><?php echo $this->lang->line('download') ?></a>
									</td>
									<td class="center"><button class="btn btn-primary comparison_btn" data-sid="<?php echo $data[$i]['student_id']; ?>" data-value="<?php echo $data[$i]['id']; ?>" data-standard="<?php echo $data[$i]['standard_img'] ?>" data-uploaded="<?php echo $data[$i]['path'] ?>" data-userid="<?php echo $data[$i]['user_id'] ?>" data-code="<?php echo $data[$i]['school_code']; ?>">Compare</button></td>
									<td class="center"><?php echo $data[$i]['type']; ?></td>
									<td class="center"><?php echo $data[$i]['send_option']; ?></td>
									<td class="center"><?php echo $data[$i]['student_id']; ?></td>
									<td class="center"><?php echo $data[$i]['school_code']; ?></td>
									<td class="center"><?php echo $data[$i]['classroom']; ?></td>
									<td class="center"><?php echo $data[$i]['date']; ?></td>
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
															<a class="btn btn-primary" href="<?php echo base_url() . 'admin/delete_item/tbl_student/' . $data[$i]['id']; ?>"><?php echo $this->lang->line('confirm') ?></a>
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
	let descriptors = {
		desc1: null,
		desc2: null
	}

	async function updateResult(img1, img2, object, id, sid, uploaded, userid, school_code) {
      	await faceapi.loadSsdMobilenetv1Model('widgets')
      	await faceapi.loadFaceLandmarkModel('widgets')
      	await faceapi.loadFaceRecognitionModel('widgets')
      	const input1 = img1
      	let FaceDescription1 = await faceapi.detectAllFaces(input1).withFaceLandmarks().withFaceDescriptors()
      	const input2 = img2
      	let FaceDescription2 = await faceapi.detectAllFaces(input2).withFaceLandmarks().withFaceDescriptors()
      	const descriptor1 = (FaceDescription1.length == 0)?await faceapi.computeFaceDescriptor(input1):FaceDescription1[0].descriptor;
      	const descriptor2 = (FaceDescription2.length == 0)?await faceapi.computeFaceDescriptor(input2):FaceDescription2[0].descriptor;
      
      	const distance = faceapi.utils.round(
            faceapi.euclideanDistance(descriptor1, descriptor2)
        )
        var parent = object.parent();
		parent.empty();
		(Number(distance) > 0.4) ? parent.html("<i class='fa fa-times photo-unchecked'>"): parent.html("<i class='fa fa-check photo-checked'>");

        $(".pre_loader").css("display", "none");
		$(".spinner-body").css("display", "none");

		var data = {
			'id': id,
			'checked': (Number(distance) > 0.4) ? 2 : 1,
			'sid':sid,
			'uploaded':uploaded,
			'userid':userid,
			'school_code':school_code
		};

		$.ajax({
			url: "<?php echo base_url(); ?>admin/compare_photo",
			data: data,
			type: 'POST',
			success: function(result) {
				if (result == 200) {} else {
					alert('Add Error');
				}
			}
		});
	}

	$(".comparison_btn").click(async function() {
		var i = $(this).parent().parent().find(".m_hide").val();
		var uploaded = $(this).data("uploaded");
		var id = $(this).data("value");
		var sid = $(this).data("sid");
		var userid = $(this).data("userid");
		var school_code = $(this).data("code");
		$(".pre_loader").css("display", "block");
		$(".spinner-body").css("display", "block");
		img1 = document.getElementById("standard_img_"+i);
		img2 = document.getElementById("uploaded_img_"+i);
		updateResult(img1, img2, $(this), id, sid, uploaded, userid, school_code);
	});

	async function compare_all(data) {
		let compared_photos = {};
		let compared_photos_index = 0;
		$(".pre_loader").css("display", "block");
		$(".spinner-body").css("display", "block");
		const MODEL_URL = 'widgets'
  		await faceapi.loadSsdMobilenetv1Model(MODEL_URL)
  		await faceapi.loadFaceLandmarkModel(MODEL_URL)
  		await faceapi.loadFaceRecognitionModel(MODEL_URL)
		for (var i = 0; i < data.length; i++) {
			var standard = "<?php echo base_url() . "uploads/" ?>" + data[i][1];
			var uploaded = "<?php echo base_url() . "uploads/" ?>" + data[i][2];
			var obj = $("tr").eq(i + 1).children().eq(4);
			var img1 = document.getElementById("standard_img_"+i);
			var img2 = document.getElementById("uploaded_img_"+i);
			if (obj.children("button").length == 1) {
          		const input1 = img1
          		let FaceDescription1 = await faceapi.detectAllFaces(input1).withFaceLandmarks().withFaceDescriptors()
          		const input2 = img2
          		let FaceDescription2 = await faceapi.detectAllFaces(input2).withFaceLandmarks().withFaceDescriptors()
          		const descriptor1 = (FaceDescription1.length == 0)?await faceapi.computeFaceDescriptor(input1):FaceDescription1[0].descriptor;
          		const descriptor2 = (FaceDescription2.length == 0)?await faceapi.computeFaceDescriptor(input2):FaceDescription2[0].descriptor;
          
          		const distance = faceapi.utils.round(
                		faceapi.euclideanDistance(descriptor1, descriptor2)
            		)
				obj.empty();
				(Number(distance) > 0.4) ? obj.html("<i class='fa fa-times photo-unchecked'>"): obj.html("<i class='fa fa-check photo-checked'>");
				compared_photos[compared_photos_index] = {
					"id": data[i][0],
					"path": data[i][2],
					"sid": data[i][3],
					"userid":data[i][4],
					'code':data[i][5],
					"compare_status": (Number(distance) > 0.4) ? 1 : 0
				};
				compared_photos_index++;
			}
		}
		$(".pre_loader").css("display", "none");
		$(".spinner-body").css("display", "none");


		if(compared_photos_index != 0) {
			var data = {data:compared_photos};

			$.ajax({
				url: "<?php echo base_url(); ?>admin/compare_photo_all",
				data: data,
				type: 'POST',
				success: function(result) {
					if (result == 200) {} else {
						alert('Error occured!');
					}
				}
			});
		} else {
			alert('There is no images for comparison.');
		}
	}
</script>

</html>