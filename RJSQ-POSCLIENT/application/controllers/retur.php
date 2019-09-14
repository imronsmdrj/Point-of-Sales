<?php
class Retur extends CI_Controller{
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
    		'title'=>' Page Retur',
            'active_retur' =>'active',
    		'data_barang'=>$this->m_apps->getDataBarang(),
    		'data_retur'=>$this->m_apps->tampil_retur(),	
    	);
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/v_retur',$data);
        $this->load->view('temanbody/footer');
    }

    function getBarang(){
    	$bid = $this->input->post('bid');
    	$q['brg'] = $this->m_apps->getBarang($bid);
    	$this->load->view('content/v_detail_barang_retur',$q);
    }

    function simpan_retur(){
        $harga = str_replace("Rp.", "", $this->input->post('rharga_jual'));;
        $qty = $this->input->post('rqty');
        $total = $harga * $qty;
    	$data=array(
    		'rbarang_id' => $this->input->post('rbarang_id'),
    		'rbarang_nama' => $this->input->post('rbarang_nama'),
    		'rbarang_satuan' => $this->input->post('rbarang_satuan'),
    		'rharga_jual' => $harga,
    		'rqty' => $this->input->post('rqty'),
    		'rketerangan' => $this->input->post('rketerangan'),
            'rsubtotal' => $total,
    	);
        // print_r($data); die;
    	$this->m_apps->insertData('retur',$data);
        redirect('retur');
	}

	function hapus_retur(){
        $hapus['rid'] = $this->uri->segment(3);
		$this->m_apps->deleteData('retur',$hapus);
		redirect('retur');
	}

}