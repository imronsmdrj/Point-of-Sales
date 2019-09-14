<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

        

        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('m_apps');
    }

    function index(){
        $data=array(
            'title'=>'Dashboard',
            'active_dashboard'=>'active',
			'contact'=>$this->m_apps->getAllData('contact'),
            'data_barang'=>$this->m_apps->getDataBarang(),
            'data_graf_perbulan'=>$this->m_apps->GetBulanJual(),
        );
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/v_dashboard');
        $this->load->view('temanbody/footer');
    }

    // function graf_penjualan_perbulan(){
    //     $bulan=$this->input->post('bln');
    //     $x['report']=$this->m_apps->graf_penjualan_perbulan($bulan);
    //     $x['bln']=$bulan;
    //     // print_r($x['report']); die;
    //     $this->load->view('content/grafik/v_graf_penjualan_perbulan',$x);
    // }
}