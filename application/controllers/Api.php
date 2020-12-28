<?php

    class Api extends CI_Controller
    {
	    function __construct()
	    {
	        parent::__construct();
			$this->load->database();
			$this->load->model('model');
	    }
		
		function get_photo($student_id) {
			$status = $this->model->get_student($student_id, $out_array);
			if ($status == 200) {
				echo json_encode(array('status' => $status, 'data' => $out_array['photo']));
			} else {
				echo json_encode(array('status' => $status, 'error' => $out_array));
			}
		}

		function display_photo($student_id) {
			$status = $this->model->get_student($student_id, $out_array);
			if ($status == 200) {
				echo '<img style="" src="data:image/jpg;base64,'.$out_array['photo'].'"/>';
			} else {
				echo 'Invalid student_id.';
			}
		}
		function display_photo_small($student_id) {
			$status = $this->model->get_student($student_id, $out_array);
			if ($status == 200) {
				echo '<img style="width:auto; height:80px;" src="data:image/jpg;base64,'.$out_array['photo'].'"/>';
			} else {
				echo 'Invalid student_id.';
			}
		}
		function display_photo_small_popup($student_id) {
			$status = $this->model->get_student($student_id, $out_array);
			if ($status == 200) {
				echo '<a href="data:image/jpg;base64,'.$out_array['photo'].'" class="image-popup-no-margins">';//</a>
			} else {
				echo 'Invalid student_id.';
			}
		}

		function download_photo($student_id) {
			$status = $this->model->get_student($student_id, $out_array);
			if ($status == 200) {
				echo '<a href="data:application/octet-stream;base64,'.$out_array['photo'].'" download="'.$out_array['student_id'].'.jpg">download</a>';
			} else {
				echo 'Invalid student_id.';
			}
		}
        function get_photo_school($school_code) {
			$status = $this->model->get_students_school($school_code, $out_array);
			if ($status == 200) {
				echo json_encode(array('status' => $status, 'data' => $out_array));
			} else {
				echo json_encode(array('status' => $status, 'error' => $out_array));
			}
		}
   }
?>