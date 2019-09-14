<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_loginapi extends CI_Model {

    public function login($username, $password)
    {
        $query = $this->db->where('username',$username)
        ->where('password',$password)
        ->limit(1)
        ->get('user');
         if ($query->num_rows() == 1) {
            return $query->row();
        }else{
            return false;
        }
    }
}