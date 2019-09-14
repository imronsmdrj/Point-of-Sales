<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_loginapi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_loginapi');
    }

    public function index()
    {
        $data = array (
            'username' => $this->input->get('username'),
            'password' => $this->input->get('password')
            );
        $user = $this->m_loginapi->login($data['username'], $data['password']);
        $data_login = array (
            'nama' => $user->nama,
            'username' => $user->username,
            'user_level' => $user->user_level
            );
        echo json_encode($data_login);
    }