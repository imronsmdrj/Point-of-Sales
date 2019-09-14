<?php

class Cetak extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('m_apps');
        $this->load->helper('currency_helper');
    }

    function print_penjualan(){
        $id=$this->uri->segment(3);
        $data=array(
            'title'=>'Penjualan',
            'contact'=>$this->m_apps->getAllData('contact'),
            'dt_penjualan'=>$this->m_apps->getDataPenjualan($id),
            'barang_jual'=>$this->m_apps->getBarangPenjualan($id),
        );
        $this->load->view('content/v_print_penjualan',$data);
    }

}