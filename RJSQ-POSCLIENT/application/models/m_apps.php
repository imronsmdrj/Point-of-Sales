<?php
class M_apps extends CI_Model{
    function __construct(){
        parent::__construct();
    }


// CODE OTOMATIS

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }

    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }
    
    function manualQuery($q)
    {
        return $this->db->query($q);
    }

        //    KODE BARANG
    function getKodeBarang(){
        $q = $this->db->query("select MAX(RIGHT(bid,3)) as 	bid_max from barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->bid_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "BRG-".$kd;
    }

    function getBarang($bid){
        $hsl = $this->db->query("select * from barang where bid='$bid'");
        return $hsl;
    }


        // KODE SUPPLIER
    function getKodeSupplier(){
        $q = $this->db->query("select MAX(RIGHT(sid,3)) as sid_max from suplier");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->sid_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "SUP-".$kd;
    }


        // DATA BARANG
    function getDataBarang(){
        return $this->db->query("SELECT * from barang a
        left join kategori b on a.bkategori_id=b.kategori_id")->result();
    }

    function brg(){
        $hsl=$this->db->query("SELECT bid,bnama,bsatuan,bharga_pokok,bharga_jual,bstok,bkategori_id,kategori_nama FROM barang JOIN kategori ON bkategori_id=kategori_id");
        return $hsl;
    }


        // DATA KATEGORI
    function getDataKategori(){
        $hsl=$this->db->query("select * from kategori order by kategori_id desc");
        return $hsl;
    }

    function get_stok_barang(){
        $hsl=$this->db->query("SELECT kategori_id,kategori_nama,bnama,bstok FROM kategori JOIN barang ON kategori_id=bkategori_id GROUP BY kategori_id,bnama");
        return $hsl;
    }


        // LOGIN APP
    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

        // PENJUALAN

    public function getKodePenjualan()
    {
        $q = $this->db->query("select MAX(RIGHT(pj_id,3)) as kd_max from penjualan");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PJ-".$kd;
    }

    function getAllDataPenjualan(){
        return $this->db->query("SELECT
                a.pj_id,
                a.pj_tanggal,
                a.pj_total,
                a.pj_jumlah_uang,
                a.pj_kembalian,
                s.snama,
                (select count(pj_id) as jum from detail_penjualan where pj_id=a.pj_id) as jumlah
                from penjualan a inner join suplier s on a.pj_supplier_id = s.sid 
                ORDER BY a.pj_id DESC")->result();

        
        // $this->db->join('detail_penjualan d','p.pj_id = d.pj_id');
        // $this->db->join('suplier s','p.pj_supplier_id = s.sid');
        // $this->db->select('count(p.pj_id) as jum,p.pj_tanggal,p.pj_total,p.pj_jumlah_uang,p.pj_kembalian,s.snama as jumlah');
        // $q = $this->db->get('penjualan p');
        // return $q->result();
    }

    function getBarangJual(){
        return $this->db->query("select * from barang where bstok > 0")->result();
    }

    function getDataPenjualan($id){
        return $this->db->query("SELECT * from penjualan a
                left join suplier b on a.pj_supplier_id=b.sid
                where a.pj_id = '$id'")->result();
    }    

    function getBarangPenjualan($id){
        return $this->db->query("
                select a.djual_bid,a.djual_qty,b.bnama,b.bharga_jual,c.kategori_nama
                from detail_penjualan a
                left join barang b on a.djual_bid=b.bid
                left join kategori c on b.bkategori_id=c.kategori_id
                where a.pj_id = '$id'")->result();
    }

    public function getTambahStok($bid,$tambah)
    {
        $q = $this->db->query("select bstok from barang where bid='".$bid."'");
        $bstok = "";
        foreach($q->result() as $d)
        {
            $bstok = $d->bstok + $tambah;
        }
        return $bstok;
    }
    public function getKurangStok($bid,$kurangi)
    {
        $q = $this->db->query("select bstok from barang where bid='".$bid."'");
        $bstok = "";
        foreach($q->result() as $d)
        {
            $bstok = $d->bstok - $kurangi;
        }
        return $bstok;
    }
    public function getKembalikanStok($bid)
    {
        $q = $this->db->query("select bstok from barang where bid='".$bid."'");
        $bstok = "";
        foreach($q->result() as $d)
        {
            $bstok = $d->bstok;
        }
        return $bstok;
    }

    public function get_id_kode_barang($bid)
    {
        $q = $this->db->query("
        select * from barang where bid = $bid")->result_array();
        $new = json_encode($q);
        echo $new;
    }

//RETUR

    function tampil_retur(){
        return $this->db->query("SELECT rid,DATE_FORMAT(rtanggal,'%d/%m/%Y') as rtanggal,rbarang_id,rbarang_nama,rbarang_satuan,rharga_jual,rqty,rsubtotal,rketerangan FROM retur
            ORDER BY rid DESC")->result();
    }

//GRAFIK

    function getBulanJual(){
        $hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(pj_tanggal,'%M %Y') AS bulan FROM penjualan");
        return $hsl;
    }

    function statistik_stok(){
        $query = $this->db->query("SELECT kategori_nama,SUM(bstok) AS tot_stok FROM barang JOIN kategori ON bkategori_id=kategori_id GROUP BY kategori_nama");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function graf_penjualan_perbulan($bulan){ 
        $query = $this->db->query("SELECT DATE_FORMAT(pj_tanggal,'%d') AS tanggal,SUM(pj_total) total FROM penjualan WHERE DATE_FORMAT(pj_tanggal,'%M %Y')='$bulan' GROUP BY DAY(pj_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

//LAPORAN

    function get_data_penjualan(){
        $hsl=$this->db->query("SELECT penjualan.pj_id,DATE_FORMAT(penjualan.pj_tanggal,'%d %M %Y') AS pj_tanggal,penjualan.pj_total,detail_penjualan.djual_bid,barang.bnama,barang.bsatuan,barang.bharga_pokok,barang.bharga_jual,detail_penjualan.djual_qty FROM penjualan INNER JOIN detail_penjualan ON detail_penjualan.id_dj = penjualan.pj_id INNER JOIN barang ON barang.bid = penjualan.pj_id ORDER BY penjualan.pj_id DESC");
        return $hsl;
    }

    function get_total_penjualan(){
        $hsl=$this->db->query("SELECT penjualan.pj_id,DATE_FORMAT(penjualan.pj_tanggal,'%d %M %Y') AS pj_tanggal,penjualan.pj_total,detail_penjualan.djual_bid,barang.bnama,barang.bsatuan,barang.bharga_pokok,barang.bharga_jual,detail_penjualan.djual_qty,sum(penjualan.pj_total) as total FROM penjualan INNER JOIN detail_penjualan ON detail_penjualan.id_dj = penjualan.pj_id INNER JOIN barang ON barang.bid = penjualan.pj_id ORDER BY penjualan.pj_id DESC");
        return $hsl;
    }

    function get_jual_perbulan($bulan){
        $hsl=$this->db->query("SELECT penjualan.pj_id,DATE_FORMAT(penjualan.pj_tanggal,'%M %Y') AS bulan,DATE_FORMAT(penjualan.pj_tanggal,'%d %M %Y') AS pj_tanggal,detail_penjualan.djual_bid,barang.bnama,barang.bsatuan,barang.bharga_pokok,barang.bharga_jual,detail_penjualan.djual_qty,penjualan.pj_total FROM penjualan INNER JOIN detail_penjualan ON detail_penjualan.id_dj = penjualan.pj_id INNER JOIN barang ON barang.bid = penjualan.pj_id WHERE DATE_FORMAT(penjualan.pj_tanggal,'%M %Y')='$bulan' ORDER BY penjualan.pj_id DESC");
        return $hsl;
    }

    function get_total_jual_perbulan($bulan){
        $hsl=$this->db->query("SELECT penjualan.pj_id,DATE_FORMAT(penjualan.pj_tanggal,'%M %Y') AS bulan,DATE_FORMAT(penjualan.pj_tanggal,'%d %M %Y') AS pj_tanggal,detail_penjualan.djual_bid,barang.bnama,barang.bsatuan,barang.bharga_pokok,barang.bharga_jual,detail_penjualan.djual_qty,SUM(penjualan.pj_total) as total FROM penjualan INNER JOIN detail_penjualan ON detail_penjualan.id_dj = penjualan.pj_id INNER JOIN barang ON barang.bid = penjualan.pj_id WHERE DATE_FORMAT(penjualan.pj_tanggal,'%M %Y')='$bulan' ORDER BY penjualan.pj_id DESC");
        return $hsl;
    }

    function sql($awal, $akhir){
        $sql  = $this->db->query("
            select distinct c.djual_bid, a.bnama
            from barang a, penjualan b, detail_penjualan c
            where a.bid = c.djual_bid and b.pj_id = c.pj_id and
            b.pj_tanggal between '".$awal."' and '".$akhir."' order by b.pj_tanggal asc");
        // return $sql->result_array();    
    }

    function sql2($awal, $akhir){
        $sql  = $this->db->query("
            select distinct c.djual_bid, a.bnama
            from barang a, penjualan b, detail_penjualan c
            where a.bid = c.djual_bid and b.pj_id = c.pj_id and
            b.pj_tanggal between '".$awal."' and '".$akhir."' order by b.pj_tanggal asc");
        return $sql->result_array();    
    }

    function sql3($awal, $akhir){
        $sql  = $this->db->query("
            select distinct c.djual_bid, a.bnama
            from barang a, penjualan b, detail_penjualan c
            where a.bid = c.djual_bid and b.pj_id = c.pj_id and
            b.pj_tanggal between '".$awal."' and '".$akhir."' order by b.pj_tanggal asc");
        return $sql->result_array();    
    }

    function sqlAandB($awal, $akhir, $lo0, $lo1){
        $sql = $this->db->query("
            select count(distinct a.pj_id) as count
            from penjualan a, detail_penjualan b
            where   a.pj_id=b.pj_id and (b.djual_bid = '".$lo0."' or b.djual_bid = '".$lo1."') and
                    a.pj_tanggal between '".$awal."' and '".$akhir."'");
        return $sql->row_array();
    }    

    function sqlA($awal, $akhir, $lo2){
        $sql = $this->db->query("
            select count(distinct a.pj_id) as count
            from penjualan a, detail_penjualan b
            where   a.pj_id=b.pj_id and b.djual_bid = '".$lo2."' and a.pj_tanggal between '".$awal."' and '".$akhir."'");

        return $sql->row_array();
    }

    function sqlTotalTrx($awal, $akhir){
        $sql = $this->db->query("
            select count(pj_id) as count
            from penjualan
            where pj_tanggal between '".$awal."' and '".$akhir."'");
        return $sql->row_array();
    }
}
    
    // function get_nofak(){
    //     $q = $this->db->query("select MAX(RIGHT(pj_nofaktur,6)) AS kd_max FROM penjualan WHERE DATE(pj_tanggal)=CURDATE()");
    //     $kd = "";
    //     if($q->num_rows()>0){
    //         foreach ($q->unbuffered_row() as $k) {
    //             $tmp = ((int)$k->kd_max)+1;
    //             $kd = sprintf("%06s", $tmp);
    //         }
    //     }else{
    //         $kd = "000001";
    //     }
    //     return date('dmy').$kd;
    // }

    // function simpan_penjualan($nofak,$total,$jml_uang,$kembalian){
    //     $this->db->query("INSERT INTO penjualan (pj_nofaktur,pj_total,pj_jumlah_uang,pj_kembalian,pj_keterangan) VALUES ('$nofak','$total','$jml_uang','$kembalian','eceran')");
    //     foreach ($this->cart->contents() as $item) {
    //         $data=array(
    //             'djual_nofaktur'          =>  $nofak,
    //             'djual_barang_id'      =>  $item['id'],
    //             'djual_barang_nama'    =>  $item['nama'],
    //             'djual_barang_satuan'  =>  $item['satuan'],
    //             'djual_barang_harga_pokok'  =>  $item['harpok'],
    //             'djual_barang_harga_jual'  =>  $item['amount'],
    //             'djual_qty'            =>  $item['qty'],
    //             'djual_total'          =>  $item['subtotal']
    //         );
    //         $this->db->insert('detail_penjualan',$data);
    //         $this->db->query("update barang set bstok=bstok-'$item[qty]' where bid='$item[id]'");
    //     }
    //     return true;
    // }

    // function cetak_faktur(){
    //     $nofak=$this->session->userdata('nofak');
    //     $hsl=$this->db->query("SELECT pj_nofaktur,DATE_FORMAT(pj_tanggal,'%d/%m/%Y %H:%i:%s') AS pj_tanggal,pj_total,pj_jumlah_uang,pj_kembalian,pj_keterangan,djual_barang_nama,djual_barang_satuan,djual_barang_harga_jual,djual_qty,djual_total FROM penjualan JOIN detail_penjualan ON pj_nofaktur=djual_nofaktur WHERE pj_nofaktur='$nofak'");
    //     return $hsl;
    // }

    // //PENJUALAN GROSIR

    // function simpan_penjualan_grosir($nofak,$total,$jml_uang,$kembalian){
    //     $this->db->query("INSERT INTO penjualan (pj_nofaktur,pj_total,pj_jumlah_uang,pj_kembalian,pj_keterangan) VALUES ('$nofak','$total','$jml_uang','$kembalian','grosir')");
    //     foreach ($this->cart->contents() as $item) {
    //         $data=array(
    //             'djual_nofaktur'          =>  $nofak,
    //             'djual_barang_id'      =>  $item['id'],
    //             'djual_barang_nama'    =>  $item['nama'],
    //             'djual_barang_satuan'  =>  $item['satuan'],
    //             'djual_barang_harga_pokok'  =>  $item['harpok'],
    //             'djual_barang_harga_jual'  =>  $item['amount'],
    //             'djual_qty'            =>  $item['qty'],
    //             'djual_total'          =>  $item['subtotal']
    //         );
    //         $this->db->insert('detail_penjualan',$data);
    //         $this->db->query("update barang set bstok=bstok-'$item[qty]' where bid='$item[id]'");
    //     }
    //     return true;
    // }