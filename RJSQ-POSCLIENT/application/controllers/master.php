<?php
class Master extends CI_Controller{
    function __construct(){
        parent::__construct();
         if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
 
        $this->load->model('m_apps');
        $this->load->helper('currency_helper');
        $this->API="http://localhost:/RJSQ-POSERVER/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index(){
        $data=array(
            'title'=>'Master Data',
            'active_master'=>'active',
            'bid'=>$this->m_apps->getKodeBarang(),
            'kd_supplier'=>$this->m_apps->getKodeSupplier(),
            'gd_barang'=>$this->m_apps->getDataBarang(),
            'gd_kategori'=>$this->m_apps->getDataKategori(),
            'data_barang'=>$this->m_apps->getAllData('barang'),
            'data_kategori'=>$this->m_apps->getAllData('kategori'),
            'data_supplier'=>$this->m_apps->getAllData('suplier'),
            'data_pegawai'=>$this->m_apps->getAllData('user'),
        );
         // print_r($data['data_kategori']); die;
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/v_master');
        $this->load->view('temanbody/footer');
    }


    public function barang(){
        $data=array(
            'title'=>'Master Data',
            'active_master'=>'active',
            'gd_barang'=>$this->m_apps->getDataBarang(),
            'gd_kategori'=>$this->m_apps->getDataKategori(),
            'data_barang'=>$this->m_apps->getAllData('barang'),
            'data_kategori'=>$this->m_apps->getAllData('kategori'),
        );
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/master_barang');
        $this->load->view('temanbody/footer');
    }

    public function kategori(){
        $data=array(
            'title'=>'Master Data',
            'active_master'=>'active',
            'gd_kategori'=>$this->m_apps->getDataKategori(),
            'data_kategori'=>$this->m_apps->getAllData('kategori')
    );
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/master_kategori');
        $this->load->view('temanbody/footer');
    }

    public function supplier(){
        $data=array(
            'title'=>'Master Data',
            'active_master'=>'active',
            'kd_supplier'=>$this->m_apps->getKodeSupplier(),
            'data_supplier'=>$this->m_apps->getAllData('suplier'),
    );
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/master_supplier');
        $this->load->view('temanbody/footer');
    }

    public function pegawai(){
        $data=array(
            'title'=>'Master Data',
            'active_master'=>'active',
            'bid'=>$this->m_apps->getKodeBarang(),
            'data_pegawai'=>$this->m_apps->getAllData('user'),
    );
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/master_pegawai');
        $this->load->view('temanbody/footer');
    }

//    ===================== INSERT =====================
    function tambah_barang(){
        $data=array(
        'bid'=>$this->input->post('bid'),
        'bnama'=>$this->input->post('bnama'),
        'bsatuan'=>$this->input->post('bsatuan'),
        // 'bharga_pokok'=>$this->input->post('bharga_pokok'),
        'bharga_jual'=>$this->input->post('bharga_jual'),
        'bharga_jual_grosir'=>$this->input->post('bharga_jual_grosir'),
        'bstok'=>$this->input->post('bstok'),
        'bkategori_id'=>$this->input->post('kategori_id'),
        );
        $this->m_apps->insertData('barang',$data);
        redirect("master/barang");
    }


    function tambah_kategori(){
        if(isset($_POST['kategori_id'])){
            $this->load->helper('form');
        $data=array(
            'kategori_id'=>$this->input->post('kategori_id'),
            'kategori_nama'=>$this->input->post('kategori_nama')
        );
        $insert =  $this->curl->simple_post($this->API.'/kategori', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
               
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
               
            }
            redirect("master/kategori");
    }
}

    function tambah_supplier(){
        $data=array(
            'sid'=> $this->input->post('sid'),
            'snama'=>$this->input->post('snama'),
            'salamat'=>$this->input->post('salamat'),
            'stelp'=> $this->input->post('stelp'),
        );
        $this->m_apps->insertData('suplier',$data);
        redirect("master/supplier");
    }

    function tambah_pegawai(){
        $data=array(
            // 'user_id' => $this->input->post('user_id'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'user_level' => $this->input->post('user_level'),
        );
        $this->m_apps->insertData('user',$data);
        redirect("master/pegawai");
    }


//    ========================== DELETE =======================
    function hapus_barang(){
        $bid['bid'] = $this->uri->segment(3);
        $this->m_apps->deleteData('barang',$bid);
        redirect("master/barang");
    }

    function hapus_kategori(){
        $params = array('kategori_id'=>  $this->uri->segment(3));
            $delete =  $this->curl->simple_delete($this->API.'/kategori', $params, array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('master/kategori');
        
    }

    function hapus_supplier(){
        $id['sid'] = $this->uri->segment(3);
        $this->m_apps->deleteData('suplier',$id);
        redirect("master/supplier");
    }

    function hapus_pegawai(){
        $id['user_id'] = $this->uri->segment(3);
        $this->m_apps->deleteData('user',$id);
        redirect("master/pegawai");
    }


//    ======================== EDIT =======================
    function edit_barang(){
        $bid['bid'] = $this->input->post('bid');
        $data=array(
            'bnama'=>$this->input->post('bnama'),
            'bsatuan'=>$this->input->post('bsatuan'),
            // 'bharga_pokok'=>$this->input->post('bharga_pokok'),
            'bharga_jual'=>$this->input->post('bharga_jual'),
            'bharga_jual_grosir'=>$this->input->post('bharga_jual_grosir'),
            'bstok'=>$this->input->post('bstok'),
            'bkategori_id'=>$this->input->post('kategori_id'),

        );
        $this->m_apps->updateData('barang',$data,$bid);
        redirect("master/barang");
    }

    function edit_kategori(){
        if(isset($_POST['kategori_id'])){

        $data = array(
            'kategori_id'=>$this->input->post('kategori_id'),
            'kategori_nama'=>$this->input->post('kategori_nama')
        );
        $update =  $this->curl->simple_put($this->API.'/kategori', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('master/kategori');
    }
}

    function edit_supplier(){
        $id['sid'] = $this->input->post('sid');
        $data=array(
            'snama'=>$this->input->post('snama'),
            'salamat'=>$this->input->post('salamat'),
            'stelp'=> $this->input->post('stelp'),
        );
        $this->m_apps->updateData('suplier',$data,$id);
        redirect("master/supplier");
    }

    function edit_pegawai(){   
        $id['user_id'] = $this->input->post('user_id');
        $data=array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'user_level' => $this->input->post('user_level'),
        );
        $this->m_apps->updateData('user',$data,$id);
        redirect("master/pegawai");
}

}
