<br>
<br>
<br>
<?php 
   error_reporting(0);
   $b=$brg->row_array();
   ?>
<table>
   &nbsp;
   <tr>
      <th style="width:200px;"></th>
      <th>Nama Barang</th>
      <th>Nama Barang</th>
      <th>Satuan</th>
      <th>Harga(Rp)</th>
      <th>Jumlah</th>
      <th>Keterangan</th>
   </tr>
   <tr>
      <td style="width:200px;"></th>
         <input type="hidden" name="rbarang_id" value="<?php echo $b['bid'];?>" readonly>
      <td><input type="text" name="rbarang_nama" value="<?php echo $b['bnama'];?>" style="width:380px;margin-right:5px;" class="form-control input-sm" readonly></td>
      <td><input type="text" name="rbarang_satuan" value="<?php echo $b['bsatuan'];?>" style="width:125px;margin-right:5px;" class="form-control input-sm" readonly></td>
      <td><input type="text" name="rharga_jual" id="harga" value="Rp. <?php echo $b['bharga_jual'];?>" style="width:180px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
      <td><input type="number" name="rqty" id="rqty" value="1" min="1" class="form-control input-sm" style="width:80px;margin-right:5px;" required></td>
      <td><input type="text" name="rketerangan" id="rketerangan" class="form-control input-sm" style="width:240px;margin-right:5px;" required></td>
      <td><button type="submit" id="retur" class="btn btn-sm btn-info"><span class="tim-icons icon-refresh-02"></span> Retur</button></td>
   </tr>
</table>
