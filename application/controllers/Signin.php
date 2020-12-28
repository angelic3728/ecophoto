<?php
// include_once 'Utils.php';
class Signin extends CI_Controller
{
	// protected $userid = 'root';
	// protected $pwd = 'root';
    
    function __construct()
    {
        parent::__construct();
    	$this->load->helper('url');
        $this->load->model('model');
        $this->load->library('session');
    }
    
    function index()
    {
        $this->unset_session();
        $this->go_signin_view();
    }

    function go_signin_view($error = '', $userid = '', $pwd = '')
    {
        $data = array('userid' => $userid, 'pwd' => $pwd, 'error' => $error);
        $this->load->view('signin',  $data);   
    }

    function go_signup_view($error = '', $name = '', $userid = '', $pwd = '', $pwd_confirm = '')
    {
        $data = array('name' => $name, 'userid' => $userid, 'pwd' => $pwd, 'pwd_confirm' => $pwd_confirm, 'error' => $error);
        $this->load->view('signup',  $data);   
    }

    function go_recover_view($error = '', $email = '')
    {
        $data = array('email' => $email, 'error' => $error);
        $this->load->view('recover_pwd',  $data);   
    }

    function do_signin()
    {
        if (!isset($_REQUEST['userid']) || !isset($_REQUEST['pwd'])) {
            $this->go_signin_view('Invalid submit!');
            return;
        }
        $userid = trim($_REQUEST['userid']);
        $pwd = trim($_REQUEST['pwd']);
        if (($userid == '') || ($pwd == '')) {
            $this->go_signin_view('Please fill in empty field(s)!', $userid, $pwd);
            return;
        }
        $result = $this->model->get_user_info($userid, $pwd, $data);
        if ($result != 200) {
            $this->go_signin_view($data['error'], $userid, $pwd);
            return;
        }
        $this->set_session($data['data']);
        redirect('/main');
    }

    function do_signup()
    {
        if (!isset($_REQUEST['name']) || !isset($_REQUEST['userid']) || !isset($_REQUEST['pwd']) || !isset($_REQUEST['pwd_confirm'])) {
            $this->go_signup_view('Invalid submit!');
            return;
        }
        $name = trim($_REQUEST['name']);
        $userid = trim($_REQUEST['userid']);
        $pwd = trim($_REQUEST['pwd']);
        $pwd_confirm = trim($_REQUEST['pwd_confirm']);
        if (($name == '') || ($userid == '') || ($pwd == '') || ($pwd_confirm == '')) {
            $this->go_signup_view('Please fill in empty field(s)!', $name, $userid, $pwd, $pwd_confirm);
            return;
        }
        if ($pwd != $pwd_confirm) {
            $this->go_signup_view('Password does not match!', $name, $userid, $pwd, $pwd_confirm);
            return;
        }
        $result = $this->model->set_user_info($name, $userid, $pwd, $data);
        if ($result != 200) {
            $this->go_signup_view($data['error'], $name, $userid, $pwd, $pwd_confirm);
            return;
        }
        $this->set_session($data['data']);
        redirect('/main');
    }

    function reset_password() {
        $email = trim($_REQUEST['email']);
        if (strlen($email) == 0) {
            $this->go_recover_view("Please input your email", $email);
            return;
        }
        $result = $this->model->confirm_email($email, $data);
        if ($result != 200) {
            $this->go_recover_view($data['error'], $email);
            return;
        }
        $this->send_email($email, $data['data']['id']);
        $error = "We've sent an email to reset your password.";
        $this->go_recover_view($error, $email);
    }

    function set_session($session_data)
    {
        $_SESSION = array();
        $_SESSION[S_SITE] = array(S_LOG => true, S_DATA => $session_data);
    }

    function unset_session()
    {
        $_SESSION = array();
        session_destroy();
    }
	
    function send_email($email, $user_id)
    {
        $site_email = SERVER_EMAIL;	//who does this mail get sent from (must be in the same domain as this site)
        $recipient = $email; 	//who does this mail get sent to?
        $body = "Please click the following url to reset your password. \n".base_url().'verify/forgot_password/'.$user_id;
        $subject = "Reset password";
        $headers = "From: ". $site_email . "\r\n";
        
        if (!mail ($recipient, $subject, $body, $headers))
            echo "Couldn't send mail";
    
    }
}
?>