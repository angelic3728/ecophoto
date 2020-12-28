<?php
// include 'session.inc';
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model');
    }

    function index()
    {
        $this->dashboard();
    }

    public function set_lang()
    {
        $set_lang = $_REQUEST["lang_val"];
        $this->session->set_userdata('site_lang', ($set_lang == "2")?"fr":"en");
        echo(200);
    }

    function dashboard()
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
        $this->model->get_student_total_array_by_school($data_school);
        $this->model->get_student_total_array_by_user($data_user);
        $this->load->view('header', array('page' => 'dashboard', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('dashboard', array('data_school' => $data_school, 'data_user' => $data_user));
    }

    function go_profile()
    {
        $result = $this->model->get_user_profile($_SESSION[S_SITE][S_DATA]['id'], $data);
        if ($result == 200) {
            $_SESSION[S_SITE][S_DATA] = $data['data'];
        }
        $this->load->view('header', array('page' => '', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('profile', array('data' => $data['data']));
        // var_dump($_SESSION[S_SITE][S_DATA]);   
    }
    function update_profile()
    {
        $userid = $_REQUEST['userid'];
        $name = $_REQUEST['name'];
        $cur_password = $_REQUEST['cur_password'];
        $new_password = $_REQUEST['new_password'];
        echo $this->model->update_profile($_SESSION[S_SITE][S_DATA]['id'], $userid, $name, $cur_password, $new_password);
    }

    function go_users()
    {
        $result = $this->model->get_user_array($data);
        $this->load->view('header', array('page' => 'users', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('admin/users', array('data' => $data['data']));
    }

    function go_schools()
    {
        $result = $this->model->get_school_array($data);
        $this->load->view('header', array('page' => 'schools', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('admin/schools', array('data' => $data['data']));
    }

    function go_students()
    {
        $result = $this->model->get_student_array($data);
        $sum = 0;
        $this->load->view('header', array('page' => 'students', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('admin/students', array('data' => $data['data']));   
    }

    function go_unimatched_photos()
    {
        $result = $this->model->get_unimatched_photos_array($data);
        $sum = 0;
        $this->load->view('header', array('page' => 'unimatched_photos', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('admin/unimatched_photos', array('data' => $data['data']));
    }

    function go_accounts()
    {
        $result = $this->model->get_account_array($data);
        $this->load->view('header', array('page' => 'accounts', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('admin/accounts', array('data' => $data['data']));
    }

    function go_api()
    {
        $this->load->view('header', array('page' => 'api', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('admin/api');
    }

    function add_user()
    {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $school = $_REQUEST['school'];
        $phone = $_REQUEST['phone'];
        $country_code = $_REQUEST['country_code'];
        echo ($this->model->add_user($name, $email, $password, $school, $phone, $country_code));
    }
    function edit_user()
    {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $school = $_REQUEST['school'];
        $phone = $_REQUEST['phone'];
        $country_code = $_REQUEST['country_code'];
        echo ($this->model->edit_user($id, $name, $email, $password, $school, $phone, $country_code));
    }

    function generate_digits()
    {
        $rd_digits = rand(10000, 99999);
        $is_existed = $this->model->check_school_code($rd_digits);
        if ($is_existed == 1)
            generate_digits();
        else
            echo ($rd_digits);
    }

    function check_student_id()
    {
        $student_id = $_REQUEST['student_id'];
        $result = $this->model->check_student_id($student_id);
        echo $result;
    }

    function add_school()
    {
        $name = $_REQUEST['name'];
        $dern = $_REQUEST['dern'];
        $iep = $_REQUEST['iep'];
        $status = $_REQUEST['status'];
        $school_code = $_REQUEST['school_code'];
        echo ($this->model->add_school($name, $dern, $iep, $status, $school_code));
    }

    function edit_school()
    {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $dern = $_REQUEST['dern'];
        $iep = $_REQUEST['iep'];
        $status = $_REQUEST['status'];
        $school_code = $_REQUEST['school_code'];
        echo ($this->model->edit_school($id, $name, $dern, $iep, $status, $school_code));
    }

    function school_students($school_code)
    {
        $result = $this->model->get_school_students_array($school_code, $data);
        $school_name = $this->model->get_school_name($school_code);
        $student_photos = $this->model->get_student_photos($school_code);
        $this->load->view('header', array('page' => 'school_students', "lang_val"=>$this->session->userdata("site_lang")));
        $this->load->view('admin/school_students', array(
            'data' => $data['data'], 'school_code' => $school_code,
            'school_name' => $school_name, 'students_photos' => $student_photos
        ));
    }

    function delete_school()
    {
        $s_code = $_REQUEST["s_code"];
        echo ($this->model->delete_school($s_code));
    }

    function add_school_student()
    {
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $extension = explode(".", $_FILES["student_photo"]['name'])[count(explode(".", $_FILES["student_photo"]['name'])) - 1];
        $config['file_name'] = strval(time()) . "." . $extension;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('student_photo')) {
            echo $this->upload->display_errors();
        } else {
            $data = array('upload_data' => $this->upload->data());
            $school_code = $this->input->post('school_code');
            $name = $this->input->post('name');
            $student_id = $this->input->post('student_id');
            $image = $data['upload_data']['file_name'];

            $result = $this->model->add_school_student($school_code, $name, $student_id, $image);

            echo $result;
        }
    }

    function edit_school_student()
    {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        echo ($this->model->edit_school_student($id, $name));
    }

    function delete_school_student()
    {
        $s_id = $_REQUEST['s_id'];
        echo ($this->model->delete_school_student($s_id));
    }

    // photo comparison
    function compare_photo()
    {
        $id = $_REQUEST['id'];
        $checked_value = $_REQUEST['checked'];
        $sid = $_REQUEST['sid'];
        $uploaded = $_REQUEST['uploaded'];
        $userid = $_REQUEST['userid'];
        $school_code = $_REQUEST['school_code'];
        echo ($this->model->check_photo($id, $checked_value, $sid, $uploaded, $userid, $school_code));
    }

    // photo comparison all
    function compare_photo_all()
    {
        $all_photos = $_REQUEST["data"];
        echo ($this->model->check_photo_all($all_photos));
    }

    function delete_item($table, $id)
    {
        $this->model->delete_item($table, $id);
        switch ($table) {
            case 'tbl_user':
                $this->go_users();
                break;
            case 'tbl_student':
                $this->go_students();
                break;
            case 'tbl_account':
                $this->go_accounts();
                break;
            case 'tbl_payment':
                $this->go_payments();
                break;
            case 'tbl_photo_history':
                $this->go_unimatched_photos();
            default:
                break;
        }
    }

    function change_item($table, $id)
    {
        $this->model->change_item($table, $id);
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
        for ($i = 0; $i < count($array[$field2]); $i++) {
            for ($j = 0; $j <= $i; $j++) {
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
