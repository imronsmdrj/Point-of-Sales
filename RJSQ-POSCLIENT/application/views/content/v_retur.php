
<div class="container">

<a href="#modalAddReturBarang" class="btn btn-success pull-right" data-toggle="modal">
<i class="tim-icons icon-send"></i>  Pilih Barang</a>

<div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'retur/simpan_retur'?>" method="post">
            <table>
                <tr>
                    <th>Kode Barang</th>
                </tr>
                <tr>
                    <th><input type="text" name="bid" id="bid" class="form-control input-sm"></th>                     
                </tr>
                    <div id="detail_barang" style="position:absolute;">
                    </div>
            </table>
             </form>
             <br>
             <br>
             <br>
             <br>
             <br>
    <div class="card card-body" style="width: 1110px">
    <table class="table table-bordered table-hover" style="" id="mydata2">
    <thead>
      <tr>
      <th style="text-align:center;width:10px">Tanggal</th>
      <th style="text-align:center;width:10px">Kode Barang</th>
      <th style="text-align:center;width:160px">Nama Barang</th>
      <th style="text-align:center;width:10px">Satuan</th>
      <th style="text-align:center;width:50px">Harga</th>
      <th style="text-align:center;width:10px">Jumlah</th>
      <th style="text-align:center;width:50px">Subtotal</th>
      <th style="text-align:center;width:10px">Ket</th>
      <th style="width:50px;text-align:center;">Aksi</th>
      </tr>
    </thead>
    <tbody>

                <?php
                if(isset($data_retur)){
                	foreach ($data_retur as $row) {               
                ?>

                <tr class="table-info">
                    <td><?php echo $row->rtanggal; ?></td>
                    <td><?php echo $row->rbarang_id; ?></td>
                    <td style="text-align:center;"><?php echo $row->rbarang_nama; ?></td>
                    <td style="text-align:center;"><?php echo $row->rbarang_satuan; ?></td>
                    <td style="text-align:center;"><?php echo currency_format($row->rharga_jual); ?></td>
                    <td style="text-align:center;"><?php echo $row->rqty; ?></td>
                    <td style="text-align:center;"><?php echo currency_format($row->rsubtotal); ?></td>
                    <td style="text-align:center;"><?php echo $row->rketerangan; ?></td>
                <td style="text-align:center;"><a href="<?php echo site_url('retur/hapus_retur/'.$row->rid)?>" class="btn btn-warning btn-sm"><span class="fa fa-close"></span> Batal</a></td>
                </tr>
           <?php }
			}
			?>
		</tbody>
	</table>
</div>

		<!-- MODAL ADD RETUR -->
	<div id="modalAddReturBarang" class="modal fade modal-primary" tabindex="-1" role="dialog">
	   <div class="modal-dialog modal-lg">
   	<div class="modal-content">
   		<!-- <div class="modal-header justify-content-center"> -->
<!--    			<div class="text-muted text-center ml-auto mr-auto"> -->
                <!-- <h5 class="title title-up">Pilih Retur Barang</h5> -->	
<!--    		</div> -->
   		<div class="modal-body">
   		<br>
   		<br>
   			<table class="table table-bordered table-hover table-striped nowrap" cellspacing="0" width="100%" style="font-size:12px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th style="width:120px;text-align:center;">Kode Barang</th>
                            <th style="width:240px;text-align:center;">Nama Barang</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="width:100px;text-align:center;">Harga</th>
                            <th style="text-align:center;">Stok</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
						$no=1;
						if(isset($data_barang)){
							foreach ($data_barang as $row) {
						?>

						<tr class="table-primary">
                            <td style="text-align:center;"><?php echo $no++; ?></td>
                            <td style="text-align:center;"><?php echo $row->bid;?></td>
                            <td style="text-align:center;"><?php echo $row->bnama;?></td>
                            <td style="text-align:center;"><?php echo $row->bsatuan;?></td>
                            <td style="text-align:center;">Rp. <?php echo $row->bharga_jual;?></td>
                            <td style="text-align:center;"><?php echo $row->bstok;?></td>
                            <td style="text-align:center;">
                            <form action="<?php echo base_url().'retur/simpan_retur'?>" method="post">
                            <input type="hidden" name="rbarang_id" value="<?php echo $row->bid?>">
                            <input type="hidden" name="rbarang_nama" value="<?php echo $row->bnama;?>">
                            <input type="hidden" name="rbarang_satuan" value="<?php echo $row->bsatuan;?>">
                            <input type="hidden" name="rharga_jual" value="Rp. <?php echo $row->bharga_jual;?>">
                            <input type="hidden" name="rqty" value="1" required>
                            <input type="hidden" name="rketerangan" value="Rusak" required>
                            	<button type="submit" class="btn btn-sm btn-info" title="Pilih"><span class="tim-icons icon-refresh-02"></span> Retur</button>
                            </form>
                            </td>
                        </tr>
                     <?php }
					}
					?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
        	</div>
        	<br>
        <!-- </div> -->
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
<script type="text/javascript">
        $(document).ready(function() {
            $('#mydata2').DataTable();
        } );
    </script>

<script type="text/javascript">
        $(document).ready(function(){
           
            $("#bid").focus();
            $("#bid").on("input",function(){
                var kobar = {bid:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'retur/getBarang';?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            });

            $("#bid").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>