
<div class="container">


    <div class="card">
        <h4 class="alert alert-warning" style="text-align: center"><font color="#000000">Keterangan</font></h4>
        <div class="row-fluid">
            <table class="table table-bordered table-striped">
            <?php if(isset($dt_penjualan)){
                foreach($dt_penjualan as $row){
                    ?>

            <tbody>
                <tr>
                    <td class="col-2"><font color="#F79346">Kode Penjualan :</font></td>
                    <td bgcolor="#ffffff"><font color="#000000"><i><?php echo $row->pj_id?></i></font></td>
                    <td class="col-2"><font color="#F79346">Nama Supplier :</font></td>
                    <td bgcolor="#ffffff"><font color="#000000"><i><?php echo $row->snama?></i></font></td>
                </tr>      
                <tr>
                    <td class="col-2"><font color="#F79346">Tanggal Penjualan :</font></td>
                    <td bgcolor="#ffffff"><font color="#000000"><i><?php echo date("d M Y",strtotime($row->pj_tanggal));?></i></font></td>
                    <td class="col-2"><font color="#F79346">Alamat Supplier :</font></td>
                    <td bgcolor="#ffffff"><font color="#000000"><i><?php echo $row->salamat?></i></font></td>
                </tr>
                <tr>
                    <td class="col-2"><font color="#F79346">Total Harga :</font></td>
                    <td bgcolor="#ffffff"><font color="#000000"><i><?= currency_format($row->pj_total); ?></i></font></td>
                    <td class="col-2"><font color="#F79346">Telp Supplier :</font></td>
                    <td bgcolor="#ffffff"><font color="#000000"><i><?php echo $row->stelp?></i></font></td>
                </tr>
                <tr>
                    <td class="col-2"><font color="#F79346">Jumlah Tunai :</font></td>
                    <td bgcolor="#ffffff"><font color="#000000"><i><?= currency_format($row->pj_jumlah_uang);?></i></font></td>
                    <td class="col-2"><font color="#F79346">Kembalian :</font></td>
                    <td bgcolor="#ffffff"><font color="#000000"><i><?= currency_format($row->pj_kembalian);?></i></font></td>
                </tr>             
                </tbody>
                <?php }
            }
            ?>

            </table>
        </div>
    </div>
    
    <div class="card">
        <h4 class="alert alert-warning" style="text-align: center"><font color="#000000">Daftar Barang</font></h4>
        <div class="row-fluid">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th bgcolor="#ffffff"><font color="#000000"><center>No</center></th>
                    <th bgcolor="#ffffff"><font color="#000000"><center>Kode Barang</center></th>
                    <th bgcolor="#ffffff"><font color="#000000"><center>Nama Barang</center></th>
                    <th bgcolor="#ffffff"><font color="#000000"><center>Kategori</center></th>
                    <th bgcolor="#ffffff"><font color="#000000"><center>Qty</center></th>
                    <th bgcolor="#ffffff"><font color="#000000"><center>Harga</center></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row ){
                        ?>
                        <tr>
                            <td><center><?php echo $no++; ?></center></td>
                            <td><center><?php echo $row->djual_bid?></center></td>
                            <td><center><?php echo $row->bnama?></center></td>
                            <td><center><?php echo $row->kategori_nama?></center></td>
                            <td><center><?php echo $row->djual_qty?></center></td>
                            <td><center><?php echo currency_format($row->bharga_jual)?></center></td>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>

            <div class="form-actions">
                <a href="<?php echo site_url('penjualan')?>" class="btn btn-warning">
                    <i class="tim-icons icon-user-run"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>