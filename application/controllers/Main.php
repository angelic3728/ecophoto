<?php

class Main extends CI_Controller
{
	// protected $username = 'root';
	// protected $password = 'root';
    
    function __construct()
    {
        parent::__construct();
    	$this->load->helper('url');    
        $this->load->library('session');
    }
    
    function index()
    {
    	$this->redirect_by_user_type();
    }

    function redirect_by_user_type()
    {
    	if ($_SESSION[S_SITE][S_DATA]['type'] == ADMIN) {
    		redirect('/admin/dashboard');
    	} else {
    		redirect('/user');
    	}
    }


	
	
}
?>