<?php
class Laporan extends CI_Controller{
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
            'title'=>'Page Laporan',
            'active_laporan'=>'active',
            'contact'=>$this->m_apps->getAllData('contact'),
            'tampil_barang'=>$this->m_apps->getDataBarang(),
        );
        $data['data']=$this->m_apps->brg();
		$data['kat']=$this->m_apps->getDataKategori();
		$data['jual_bln']=$this->m_apps->getBulanJual();
		$this->load->view('temanbody/header',$data);
		$this->load->view('temanbody/navbar');
        $this->load->view('content/v_laporan',$data);
        $this->load->view('temanbody/footer');
	}

	function lap_stok_barang(){
		$x['data']=$this->m_apps->get_stok_barang();
		$this->load->view('laporan/v_lap_stok_barang',$x);
	}

	function lap_data_barang(){
		$x['tampil_barang']=$this->m_apps->getDataBarang();
		$this->load->view('laporan/v_lap_barang',$x);
	}

	function lap_data_penjualan(){
		$x['data']=$this->m_apps->get_data_penjualan();
		$x['jml']=$this->m_apps->get_total_penjualan();
		$this->load->view('laporan/v_lap_penjualan',$x);
	}

	function lap_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_apps->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_apps->get_jual_perbulan($bulan);
		$this->load->view('laporan/v_lap_jual_perbulan',$x);
	}

}