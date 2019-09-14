<?php
class Grafik extends CI_Controller{
    function __construct(){
        parent::__construct();
            if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };

        $this->load->model('m_apps');
        $this->load->helper('currency_helper');
    }

    function index(){
    	$data=array(
    		'data_barang'=>$this->m_apps->getDataBarang(),
    		'data_graf_perbulan'=>$this->m_apps->GetBulanJual(),	
    	);
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/v_dashboard',$data);
        $this->load->view('temanbody/footer');
    }

    function graf_stok_barang(){
		$x['report']=$this->m_apps->statistik_stok();
		$this->load->view('content/grafik/v_graf_stok_barang',$x);
	}


    // function graf_penjualan_perbulan(){
    //     $data=array();
    //     foreach ($this->m_apps->get()->result_array() as $row)
    //         $data[] = (int) $row['hasil'];
    //     $this->load->view('content/grafik/v_graf_penjualan_perbulan',array('data'=>$data));
    //     // print_r($x['report']); die;
    // }

	function graf_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['report']=$this->m_apps->graf_penjualan_perbulan($bulan);
		$x['bln']=$bulan;
		$this->load->view('content/grafik/v_graf_penjualan_perbulan',$x);
        // print_r($x['report']); die;
	}

}