<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
 
class Kategori extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }
 
    // show data kategori
    function index_get() {
        $kategori_id = $this->get('kategori_id');
        if ($kategori_id == '') {
            $kategori = $this->db->get('kategori')->result();
        } else {
            $this->db->where('kategori_id', $kategori_id);
            $kategori = $this->db->get('kategori')->result();
        }
        $this->response($kategori, 200);
    }
 
    // insert data kategori
    function index_post() {
        $data = array(
                    'kategori_id'           => $this->post('kategori_id'),
                    'kategori_nama'     => $this->post('kategori_nama')
                    );
        $insert = $this->db->insert('kategori', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // update data kategori
    function index_put() {
        $kategori_id = $this->put('kategori_id');
        $data = array(
                    'kategori_id'           => $this->put('kategori_id'),
                    'kategori_nama'     => $this->put('kategori_nama')
                    );
        $this->db->where('kategori_id', $kategori_id);
        $update = $this->db->update('kategori', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // delete kategori
    function index_delete() {
        $kategori_id = $this->delete('kategori_id');
        $this->db->where('kategori_id', $kategori_id);
        $delete = $this->db->delete('kategori');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
}