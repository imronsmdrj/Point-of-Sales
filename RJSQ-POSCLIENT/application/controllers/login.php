<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_apps');
    }

    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('content/v_login',$data);
    }

    function cek_login() {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query the database
        $result = $this->m_apps->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'ID' => $row->user_id,
                    'USERNAME' => $row->username,
                    'PASS'=>$row->password,
                    'NAME'=>$row->nama,
                    'LEVEL' => $row->user_level,
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);
                usleep(1000000);
                redirect('dashboard','refresh');
            }
            return TRUE;
        } else {
            //if form validate false
            redirect('dashboard','refresh');
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('LEVEL');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('login');
    }
}
