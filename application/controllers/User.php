<?php
// include 'session.inc';
class User extends CI_Controller
{
    private $user_id;
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model');
        $this->user_id = $_SESSION[S_SITE][S_DATA]['id'];
    }
    
    function index()
    {
        $this->go_dashboard();
    }   

    function dashboard_submit()
    {
        $this->go_dashboard($_REQUEST['month']);
    }

    function go_dashboard($month = '')
    {
        if ($month == '') {
            $month = date('Y-m');
        }
        $this->model->get_earning_array_by_user_month($data1, $this->user_id);
        $this->model->get_earning_total_array_by_users_month($data2);

        $this->model->get_earning_array_by_users_month($data3, $month);
        $clone_data3 = $data3;
        $this->order_array_by_earning($clone_data3, 'user', 'earning');
        $this->load->view('header', array('page' => 'dashboard'));
        $this->load->view('dashboard', array('month' => $month, 'data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'clone_data3' => $clone_data3));
        // var_dump($data3);
    }
    
    function go_profile()
    {
        $result = $this->model->get_user_profile($_SESSION[S_SITE][S_DATA]['id'], $data);
        if ($result == 200) {
            $_SESSION[S_SITE][S_DATA] = $data['data'];
        }
        $this->load->view('header', array('page' => ''));   
        $this->load->view('profile', array('data' => $data['data']));
        // var_dump($_SESSION[S_SITE][S_DATA]);   
    }
    function update_profile()
    {
        $userid = $_REQUEST['userid'];        
        $name = $_REQUEST['name'];        
        $cur_password = $_REQUEST['cur_password'];        
        $new_password = $_REQUEST['new_password'];        
        echo $this->model->update_profile($_SESSION[S_SITE][S_DATA]['id'], $userid,$name, $cur_password, $new_password);
    }

    function go_earnings()
    {
        $result = $this->model->get_user_earning_array($data, $_SESSION[S_SITE][S_DATA]['id']);
		$sum = 0;
        for ($i = 0; $i < count($data['data']); $i++) {
            $sum += $data['data'][$i]['amount'];
        }
        $this->load->view('header', array('page' => 'earnings'));   
        $this->load->view('user/earnings', array('data' => $data['data'], 'sum' => $sum));   
    }

    function add_earning()
    {
        $info = $_REQUEST['info'];        
        $task = $_REQUEST['task'];        
        $date = $_REQUEST['date'];
        $amount = $_REQUEST['amount'];
        echo $this->model->add_earning($info, $task, $amount, $date, $_SESSION[S_SITE][S_DATA]['id']);
    }

    function edit_earning()
    {
        $id = $_REQUEST['id'];
        $info = $_REQUEST['info'];
        $task = $_REQUEST['task'];
        $date = $_REQUEST['date'];
        $amount = $_REQUEST['amount'];
        echo $this->model->edit_earning($info, $task, $amount, $date, $id);
    }

    function add_account()
    {
        $email = $_REQUEST['email'];
        $payment_email = $_REQUEST['payment_email'];        
        $site = $_REQUEST['site'];        
        $date = $_REQUEST['date'];
        $review = $_REQUEST['review'];
        echo $this->model->add_account($email, $payment_email, $site, $date, $review, $_SESSION[S_SITE][S_DATA]['id']);
    }

    function edit_account()
    {
        $id = $_REQUEST['id'];        
        $email = $_REQUEST['email'];
        $payment_email = $_REQUEST['payment_email'];        
        $site = $_REQUEST['site'];        
        $date = $_REQUEST['date'];
        $review = $_REQUEST['review'];
        echo $this->model->edit_account($email, $payment_email, $site, $date, $review, $id);
    }

    function go_accounts()
    {
        $result = $this->model->get_user_account_array($data, $_SESSION[S_SITE][S_DATA]['id']);
        $this->load->view('header', array('page' => 'accounts'));   
        $this->load->view('user/accounts', array('data' => $data['data']));   
    }

    function go_edit_account()
    {
        $this->load->view('header', array('page' => 'accounts'));   
        $this->load->view('user/edit_account');   
    }

    function go_edit_earning()
    {
        $this->load->view('header', array('page' => 'earnings'));   
        $this->load->view('user/edit_earning');   
    }
    
    function delete_item($table, $id)
    {
        $this->model->delete_item($table, $id);
        switch ($table) {
            case 'tbl_user':
                $this->go_users();
                break;
            case 'tbl_earning':
                $this->go_earnings();
                break;
            case 'tbl_account':
                $this->go_accounts();
                break;
            case 'tbl_payment':
                $this->go_payments();
                break;
            default:
                break;
        }
    }
    function order_array_by_earning(&$array, $field1, $field2)
    {
        for ($i=0; $i < count($array[$field2]); $i++) { 
            for ($j=0; $j <= $i; $j++) { 
                if ($array[$field2][$i] > $array[$field2][$j]) {
                    $tmp1 = $array[$field1][$i];
                    $tmp2 = $array[$field2][$i];
                    $array[$field1][$i] = $array[$field1][$j];
                    $array[$field1][$j] = $tmp1;
                    $array[$field2][$i] = $array[$field2][$j];
                    $array[$field2][$j] = $tmp2;
                }
            }
        }
    }

}
?>