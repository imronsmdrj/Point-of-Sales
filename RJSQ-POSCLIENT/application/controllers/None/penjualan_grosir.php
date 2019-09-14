<?php
class Penjualan extends CI_Controller{
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
			'title' => 'Page Penjualan Grosir',
			'tampil_barang' =>$this->m_apps->getDataBarang(),
		);
		$this->load->view('content/v_penjualan_grosir',$data);
	}

	function getBarang(){
		$kodbar=$this->input->post('bid');
		$q['brg']=$this->m_apps->getBarang($kodbar);
		$this->load->view('content/v_detail_barang_jual_grosir',$q);
	}

	function add_to_cart(){
		$kodbar=$this->input->post('bid');
		$produk=$this->m_apps->getBarang($kodbar);
		$i=$produk->row_array();
		$data = array(
			'id' =>$i['bid'],
			'nama' =>$i['bnama'],
			'satuan' =>$i['bsatuan'],
			'harpok' =>$i['bharga_pokok'],
			'harga' =>str_replace(",", "", $this->input->post('bharga_jual')),
			'qty'	=>$this->input->post('qty'),
			'amount' =>str_replace(",", "", $this->input->post('bharga_jual'))
		);

		if(!empty($this->cart->total_items())){
			foreach ($this->cart->contents() as $items) {
				$id=$items['id'];
				$qtylama=$items['qty'];
				$rowid=$items['rowid'];
				$kodbar=$this->input->post('bid');
				$qty=$this->input->post('qty');
				if($id==$kodbar){
					$up=array(
						'rowid'=> $rowid,
						'qty' => $qtylama+qty
					);
					$this->cart->update($up);
				}else{
					$this->cart->insert($data);
				}
			}
			}else{
				$this->cart->insert($data);
			}
			redirect('penjualan_grosir');
		}
	
	function remove(){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
			'rowid' => $row_id,
			'qty' => 0
		));
		redirect('penjualan_grosir');
	}

	function simpan_penjualan_grosir(){
		$total=$this->input->post('total');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('penjualan_grosir');
			}else{
				$nofak=$this->m_apps->get_nofak();
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->m_apps->simpan_penjualan_grosir($nofak,$total,$jml_uang,$kembalian);
				if($order_proses){
					$this->cart->destroy();
					$this->session->unset_userdata('tglfak');
					$this->session->unset_userdata('supplier');
					$this->load->view('alert/alert_sukses_grosir');	
				}else{
					redirect('penjualan_grosir');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('penjualan_grosir');
		}
	}

	function cetak_faktur(){
		$q['data'] = $this->m_apps->cetak_faktur();
		$this->load->view('laporan/v_faktur_grosir',$q);
	}
}