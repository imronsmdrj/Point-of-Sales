<?php
class Apriori extends CI_Controller{
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
            'title'=>'Apriori',
            'active_apriori'=>'active',
            'data_penjualan'=>$this->m_apps->getAllDataPenjualan(),
        );
        $this->load->view('temanbody/header',$data);
        $this->load->view('temanbody/navbar');
        $this->load->view('content/v_apriori',$data);
        $this->load->view('temanbody/footer');
	}

    function hasil_rule(){
            $awal=$_POST['awal'];
            $akhir=$_POST['akhir'];
            $kombinasi=$_POST['kombinasi'];
            $support=$_POST['support'];
            $sxc=$_POST['sxc'];
        // print_r($aw); die;
      $sql  =$this->db->query("
            select distinct c.djual_bid, a.bnama
            from barang a, penjualan b, detail_penjualan c
            where a.bid = c.djual_bid and b.pj_id = c.pj_id and
            b.pj_tanggal between '".$awal."' and '".$akhir."' order by b.pj_tanggal asc");


      // print_r($sql); die;
      // $data =  $sql->result();
      
        $listKode       = array();
        $listName       = array();
        $listSupport    = array();
        $listConfidence = array();
        $listRsxc       = array();

        while($data     = $sql->result_array()){
        $sql2    = $this->db->query("select distinct c.djual_bid, a.bnama
            from barang a, penjualan b, detail_penjualan c
            where a.bid = c.djual_bid and b.pj_id = c.pj_id and
            b.pj_tanggal between '".$awal."' and '".$akhir."' order by b.pj_tanggal asc");

        while($data2    = $sql2->result_array()){

            $sql3    = $this->db->query("select distinct c.djual_bid, a.bnama
            from barang a, penjualan b, detail_penjualan c
            where a.bid = c.djual_bid and b.pj_id = c.pj_id and
            b.pj_tanggal between '".$awal."' and '".$akhir."' order by b.pj_tanggal asc");

            while($data3    = $sql3->result_array()){
            print_r($data); die;
                // print_r($data); die;
                    if(count($listKode)>0){

                    $v  = 0;

                    for($k=0; $k<count($listKode); $k++){

                        if($listKode[$k] == $data['djual_bid'] && $listKode[$k] == $data2['djual_bid'] && $listKode[$k] == $data3['djual_bid']){

                            $v =1;

                        }

                    }

                    if($v == 0){

                        if($data['djual_bid'] != $data2['djual_bid'] && $data3['djual_bid'] != $data2['djual_bid'] && $data['djual_bid'] != $data3['djual_bid']){

                            $listKode[] = array($data['djual_bid'],$data2['djual_bid'],$data3['djual_bid']);
                            $listName[] = array($data->bnama,$data2->bnama,$data3->bnama);

                        }

                    }
                } else {

                    if($data['djual_bid'] != $data2['djual_bid'] && $data3['djual_bid'] != $data2['djual_bid'] && $data['djual_bid'] != $data3['djual_bid']){

                        $listKode[] = array($data['djual_bid'],$data2['djual_bid'],$data3['djual_bid']);
                        $listName[] = array($data->bnama,$data2->bnama,$data3->bnama);

                    }

                }

            }

        }

    }    
            for($o=0; $o < count($listKode); $o++){
             
             // $lo0 = $listKode[$o][0];   
             // $lo1 = $listKode[$o][1];   
             // $lo2 = $listKode[$o][2];

        $sqlAandB       = $this->db->query("select count(distinct a.pj_id) as count
            from penjualan a, detail_penjualan b
            where   a.pj_id=b.pj_id and (b.djual_bid = '".$listKode[$o][0]."' or b.djual_bid = '".$listKode[$o][1]."') and
                    a.pj_tanggal between '".$awal."' and '".$akhir."'");

        $sqlA           = $this->db->query("
            select count(distinct a.pj_id) as count
            from penjualan a, detail_penjualan b
            where   a.pj_id=b.pj_id and b.djual_bid = '".$listKode[$o][2]."' and a.pj_tanggal between '".$awal."' and '".$akhir."'");

        $sqlTotalTrx    =  $this->db->query("
            select count(pj_id) as count
            from penjualan
            where pj_tanggal between '".$awal."' and '".$akhir."'");

        $AandB              =$sqlAandB->result_array();
        $TotalTrx           =$sqlTotalTrx->result_array();
        $A                  =$sqlA->result_array();

        // print_r($A); die;

        $rSupport           = $AandB['count']/$TotalTrx['count'];
        $rConfidence        = $AandB['count']/$A['count'];
        $rSxc               = $rSupport*$rConfidence;
        $listConfidence[]   = $rConfidence;

        if($rSupport >= $support){
            $listSupport[]      = array($rSupport, 1);
        } else {
            $listSupport[]      = array($rSupport, 0);
        }

        if($rSxc >= $sxc){
            $listRsxc[]         = array($rSxc, 1);
        } else {
            $listRsxc[]         = array($rSxc, 0);
        }
    }

        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $data['kombinasi'] = $kombinasi;
        $data['support'] = $support;
        $data['sxc'] = $sxc;
        $data['listKode'] = $listKode;
        $data['listName0'] = $listName[$o][0];
        $data['listName1'] = $listName[$o][1];
        $data['listName2'] = $listName[$o][2];
        $data['listSupport0'] = $listSupport[$o][0];
        $data['listSupport1'] = $listSupport[$o][1];
        $data['listConfidence'] = $listConfidence[$o];
        $data['listRsxc0'] = $listRsxc[$o][0];
        $data['listRsxc1'] = $listRsxc[$o][1];

        $this->load->view('temanbody/header');
        $this->load->view('content/hasil_rule',$data);
        $this->load->view('temanbody/footer');
        // );
      // if($a){
      //   echo 'aw'; die;
      // }else{

      //   echo 'awa'; die;
      // }
        // $data=array(
        //     'title'=>'Apriori',
        //     'active_apriori'=>'active',
        //     'data_penjualan'=>$this->m_apps->getAllDataPenjualan(),
    }

}