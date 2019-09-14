<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Barang extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
	}

	//Show data barang

	function index_get() {
		$bid = $this->get('bid');
		if ($bid == '') {
			$this->db->join('kategori', 'kategori.kategori_id = barang.bkategori_id');
			$barang = $this->db->get('barang')->result_array();
		} else {
			$this->db->where('bid', $bid);
			$this->db->join('kategori', 'kategori.kategori_id = barang.bkategori_id');
			$barang = $this->db->get('barang')->result_array();
		}
		$this->response($barang, 200);
	}

//input barang

	function index_post() {
		$data = array(
			'bid' => $this->post('bid'),
			'bnama' => $this->post('bnama'),
			'bsatuan' => $this->post('bsatuan'),
			'bharga_pokok' => $this->post('bharga_pokok'),
			'bharga_jual' => $this->post('bharga_jual'),
			'bharga_jual_grosir' => $this->post('bharga_jual_grosir'),
			'bstok' => $this->post('bstok'),
			'bkategori_id' => $this->put('kategori_id'));
		$insert = $this->db->insert('barang', $data);
	if ($insert) {
		$this->response($data, 200);
	} else {
	$this->response(array('status' => 'fail', 502));
	}
}

//edit barang

	function index_put() {
		$bid = $this->put('bid');
		$data = array(
			'bid' => $this->put('bid'),
			'bnama' => $this->put('bnama'),
			'bsatuan' => $this->put('bsatuan'),
			'bharga_pokok' => $this->put('bharga_pokok'),
			'bharga_jual' => $this->put('bharga_jual'),
			'bstok' => $this->put('bstok'),
			'bkategori_id' => $this->put('kategori_id'));
		$this->db->where('bid', $bid);
		$update = $this->db->update('barang', $data);
		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
	}
}

//delte barang


	function index_delete() {
		$bid = $this->delete('bid');
		$this->db->where('bid', $bid);
		$delete = $this->db->delete('barang');
	if ($delete) {
		$this->response(array('status' => 'success'), 201);
	} else {
	$this->response(array('status' => 'fail', 502));
			}

		}
	}

?>