<?php
class Penjualan extends CI_Controller{
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
			'title' => 'Page Penjualan',
			'active_penjualan'=>'active',
			'data_penjualan' =>$this->m_apps->getAllDataPenjualan(),
		);
		$this->load->view('temanbody/header',$data);
		$this->load->view('temanbody/navbar',$data);
		$this->load->view('content/v_penjualan');
		$this->load->view('temanbody/footer');

		$this->session->unset_userdata('limit_add_cart');
		$this->cart->destroy();
	}

	// AMBIL DATA

	function pages_tambah_penjualan(){
		$data=array(
			'title'=>'Tambah Penjualan Barang',
			'active_penjualan'=>'active',
            'pj_id'=>$this->m_apps->getKodePenjualan(),
            'data_barang'=>$this->m_apps->getBarangJual(),
            'data_supplier'=>$this->m_apps->getAllData('suplier'),
		);
		$this->load->view('temanbody/header',$data);
		$this->load->view('temanbody/navbar',$data);
		$this->load->view('content/v_add_penjualan');
		$this->load->view('temanbody/footer');
	}

	function detail_penjualan(){
		$id= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Penjualan Barang',
            'active_penjualan'=>'active',
            'dt_penjualan'=>$this->m_apps->getDataPenjualan($id),
            'barang_jual'=>$this->m_apps->getBarangPenjualan($id),
        );
        // $data['dt_penjualan']=$this->m_apps->getDataPenjualan($id);
        //  $data['barang_jual']=$this->m_apps->getBarangPenjualan($id);
        // print_r($data); die;
		$this->load->view('temanbody/header',$data);
		$this->load->view('temanbody/navbar',$data);
		$this->load->view('content/v_detail_penjualan');
        $this->load->view('temanbody/footer');
	}

		function get_detail_barang(){
		$id['bid']=$this->input->post('bid');
        $data=array(
            'detail_barang'=>$this->m_apps->getSelectedData('barang',$id)->result(),
        );
        $this->load->view('content/v_detail_barang',$data);
	}

	    function get_detail_supplier(){
        $id['sid']=$this->input->post('sid');
        $data=array(
            'detail_supplier'=>$this->m_apps->getSelectedData('suplier',$id)->result(),
        );
        $this->load->view('content/v_detail_supplier',$data);
	}
	
		// function get_id_kode_barang(){
		// $bid=$this->input->post('bid');
		// $this->m_apps->get_id_kode_barang($bid);
		// }

	// INSERT DATA

	function tambah_penjualan_to_cart(){
        $data = array(
            'id'    => $this->input->post('djual_bid'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('harga'),
            'kategori' => $this->input->post('kategori_nama'),
            'name'  => $this->input->post('bnama'),
        );
        // print_r($data); die;
        $this->cart->insert($data);
        usleep(1000000);
        // if($i){
        // 	echo 'su'; die;
        // }else{
        // 	echo 'ga'; die;
        // }
        redirect('penjualan/pages_tambah_penjualan');
    }

    function hapus_cart($hps){
    	// echo 'aw'; die;
    	$data = array(
    		'rowid' => $hps,
    		'qty' => 0
    	);
    	$this->cart->update($data);
        redirect('penjualan/pages_tambah_penjualan');
    }


	function simpan_penjualan(){
		$jmluang = str_replace(",", "", $this->input->post('pj_jumlah_uang'));
		$total = $this->input->post('pj_total');
		$kembalian = $jmluang - $total;
		if(!empty($total) && !empty($jmluang)){
			if($jmluang < $total){
				// echo 'aw'; die;
				echo $this->session->set_flashdata('notif','Jumlah Uang yang anda masukan Kurang');
		redirect('penjualan/pages_tambah_penjualan');
			}else{
		$data=array(
			'pj_id'=>$this->input->post('pj_id'),
			'pj_total'=>$this->input->post('pj_total'),
			'pj_jumlah_uang'=> $jmluang,
			'pj_kembalian'=> $kembalian,
			'pj_tanggal'=>date("Y-m-d",strtotime($this->input->post('pj_tanggal'))),
			'pj_supplier_id'=>$this->input->post('pj_supplier_id'),
		);
		$this->m_apps->insertData("penjualan",$data);

		foreach ($this->cart->contents() as $items){
			$bid = $items['id'];
			$qty = $items['qty'];
			$data_detail = array (
				'pj_id' => $this->input->post('pj_id'),
				'djual_bid' => $bid,
				'djual_qty' => $qty,
			);
			$this->m_apps->insertData("detail_penjualan",$data_detail);

			$update['bstok'] = $this->m_apps->getKurangStok($bid,$qty);
			$key['bid'] = $bid;
			$this->m_apps->updateData("barang",$update,$key);
		}
		$this->session->unset_userdata('limit_add_cart');
		$this->cart->destroy();
		redirect('penjualan');
	}
}
}

	//DELETE

		function hapus_barang(){
			$id = $this->uri->segment(3);
			$bc = $this->m_apps->getSelectedData("penjualan",$id);
			foreach ($bc->result() as $dph) {
				$sess_data['pj_id'] = $dph->pj_id;
				$this->session->set_userdata($sess_data);
			}

			$kode = explode("/",$_GET['kode']);
			if($kode[0]=="tambah")
			{
				$data = array(
					'rowid' => $kode[1],
					'djual_qty' => 0
				);
				$this->cart->update($data);
			}
		else if ($kode[0]=="edit") 
		{
			$data = array(
				'rowid' => $kode[1],
				'djual_qty' => 0
			);
			$this->cart->update($data);
			$hps['pj_id'] = $kode[2];
			$hps['bid'] = $kode[3];
			$this->m_apps->deleteData("detail_penjualan",$hps);

			$key_barang['bid'] = $hps['bid'];
			$d_u['bstok'] = $kode[4]+$kode[5];
			$this->m_apps->updateData("barang",$d_u,$key_barang);
		}
		redirect('penjualan/pages_edit/'.$this->session->userdata('pj_id'));
	}

		function hapus(){
			$hapus['pj_id'] = $this->uri->segment(3);
			$q = $this->m_apps->getSelectedData("detail_penjualan",$hapus);
			foreach ($q->result() as $d) {
				$d_u['bstok'] = $this->m_apps->getTambahStok($d->djual_bid,$d->djual_qty);
				$key['bid'] = $d->djual_bid;
				$this->m_apps->updateData("barang",$d_u,$key);
			}
			$this->m_apps->deleteData("penjualan",$hapus);
			$this->m_apps->deleteData("detail_penjualan",$hapus);
			redirect('penjualan');
		}
}
