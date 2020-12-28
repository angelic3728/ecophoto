<?php

    class Mobile extends CI_Controller
    {
	    function __construct()
	    {
	        parent::__construct();
			$this->load->database();
			$this->load->helper('url');    
			$this->load->model('model');
	    }
        
        function index()
        {
        	$status = 400;
        	$in_array = array();
			$out_array = array('reason' => '');
			// var_dump ($_REQUEST);
			$type = $_REQUEST['type'];
			switch ($type) {
				case 'ping':
					$status = 200;
					break;
				case 'check_info':
						$status = $this->model->check_info($_REQUEST['student_id'], $_REQUEST['school_code']);
						break;
				case 'check_secret':
					$status = $this->model->check_secret($_REQUEST['secret'], $_REQUEST['id'], $out_array);
					break;
				case 'login':
					$status = $this->model->login($_REQUEST['country_code'], $_REQUEST['number'], $_REQUEST['password'], $out_array);
					break;
				case 'get_profile':
					$status = $this->model->get_profile($_REQUEST['id'], $out_array);
					break;
				case 'update_profile':
					$filename = strval(time()).".jpg";
					$path = FCPATH."assets/user/".$filename;
					file_put_contents($path,base64_decode($_REQUEST['photo']));
					$status = $this->model->update_profile($_REQUEST['id'], $filename, $out_array);
					break;
				case 'add_student':
					$filename = strval(time()).".jpg";
					$path = FCPATH."uploads/".$filename;
					file_put_contents($path,base64_decode($_REQUEST['photo']));
					$in_array = array('student_id' => $_REQUEST['student_id'], 'school_code' => $_REQUEST['school_code'], 'classroom' => $_REQUEST['classroom'], 
						'user_id' => $_REQUEST['user_id'], 'photo' => $_REQUEST['photo'], 'send_option' => $_REQUEST['send_option'], 'type' => $_REQUEST['photo_type'], 'path' => $filename, 'date' => $_REQUEST['date']);
					$status = $this->model->add_student($in_array);
					break;
				case 'get_students':
					$status = $this->model->get_students($_REQUEST['user_id'], $out_array);
					break;
				default:
					break;
			} //$out_array = $in_array;
			echo json_encode(array('status' => $status, 'data' => $out_array));
        }
   }
