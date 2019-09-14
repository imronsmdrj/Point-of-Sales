<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

 -->

<style>
    .others {
        color:red
    }
</style>

<div class="pull-right"><button a href="#modalAddBarang" class="btn btn-sm btn-primary" data-toggle="modal">Tambah Barang</a></button></div>

<table class="table table-bordered table-hover" id="example">
    <thead>
    <tr>
        <th><center>No</center></th>
        <th><center>Kode Barang</center></th>
        <th><center>Nama Barang</center></th>
        <th style="width:5px"><center>Satuan</center></th>
<!--         <th><center>Harga Pokok</center></th> -->
        <th><center>Harga Pokok</center></th>
        <th><center>Harga Eceran</center></th>
        <th><center>Stok</center></th>
        <th><center>Kategori</center></th>
        <th><center>Aksi</center></th>
    </tr>
    </thead>
    <tbody>

    <?php
    $no=1;
    if(isset($gd_barang)){
    foreach($gd_barang as $row){
    ?>
    <tr class="table-info">
        <td><center><?php echo $no++; ?></center></td>
        <td><center><?php echo $row->bid; ?></center></td>
        <td><center><?php echo $row->bnama; ?></center></td>
        <td><center><?php echo $row->bsatuan; ?></center></td>
<!--         <td><center><?php echo currency_format($row->bharga_pokok);?></center></td> -->
        <td><center><?php echo currency_format($row->bharga_jual);?></center></td>
        <td><center><?php echo currency_format($row->bharga_jual_grosir);?></center></td>
        <td><center><?php echo $row->bstok; ?></center></td>
        <td><center><?php echo $row->kategori_nama; ?></center></td>
        <td><center>
        <a class="btn btn-sm btn-success" href="#modalEditBarang<?php echo $row->bid?>" data-toggle="modal"><span class='fa fa-edit'></span></a>
        <a class="btn btn-sm btn-danger" href="<?php echo site_url('master/hapus_barang/'.$row->bid);?>"
               onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')"><span class='fa fa-trash'></span></a>
        </center></td>
    </tr>


<!-- ============ MODAL EDIT BARANG =============== -->

<div id="modalEditBarang<?php echo $row->bid?>" class="modal fade modal-danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove text-white"></i>
                </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 id="myModalLabel" class="mb-0">Edit Data Barang</h3>
            </div>
        </div>

            <div class="modal-body">
                <form role="form" method="post" action="<?php echo site_url('master/edit_barang');?>">
                    <div class="form-group mb-3">
                        <div class="control-label">
                            <label class="control-label">Kode Barang</label>
                        </div>
                            <input name="bid" class="form-control" type="text" value="<?php echo $row->bid;?>" readonly>
                    </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label" >Nama Barang</label>
                </div>
                    <input name="bnama" class="form-control" type="text" value="<?php echo $row->bnama;?>" required>  
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label" >Satuan</label>
                </div>
                   <input name="bsatuan" class="form-control" type="text" value="<?php echo $row->bsatuan;?>" required>
            </div>

<!--             <div class="form-group">
                <div class="control-label">
                    <label class="control-label">Harga Pokok</label>
                </div>
                    <input name="bharga_pokok" class="form-control" type="text" value="<?php echo $row->bharga_pokok;?>" required>
            </div> -->

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label">Harga Pokok</label>
                </div>
                    <input name="bharga_jual" class="form-control" type="number" value="<?php echo $row->bharga_jual;?>" required>
                        </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label">Harga Eceran</label>
                </div>
                    <input name="bharga_jual_grosir" class="form-control" type="number" value="<?php echo $row->bharga_jual_grosir;?>" required>
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label">Stok</label>
                </div>
                    <input name="bstok" class="form-control" type="number" value="<?php echo $row->bstok;?>" required>
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label">Kategori Barang</label>
                </div>
                    <select class="form-control" id="kategori_id" name="kategori_id" data-placeholder="Pilih Kategori" required>
                        <option style="color:black" value=""></option>
                            <?php
                            if(isset($data_kategori)){
                                foreach($data_kategori as $row){
                                    ?>
                              <option style="color:black" value="<?php echo $row->kategori_id?>"><?php echo $row->kategori_nama?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                        </div>
                    </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
                <br>
            </form>
        </div>
    <?php }
    }
    ?>
    </tbody>
</table>


<!-- ============ MODAL ADD BARANG =============== -->

<div class="modal fade modal-info" id="modalAddBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   	<div class="modal-content">
   		<div class="modal-header justify-content-center">
   			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="tim-icons icon-simple-remove text-white"></i>
              </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 class="mb-0">Input Data Barang</h3>
              	</div>
            </div>

		<div class="modal-body">
		<form role="form" method="post" action="<?php echo site_url('master/tambah_barang')?>">
			<div class="form-group mb-3">
  				<div class="control-label">
  					<input class="form-control" placeholder="Kode Barang" type="text" name="bid" value="">
    			</div>
    		</div>

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Nama Barang" type="text" name="bnama" required>
                </div>
            </div>

            <div class="form-group">
            	<div class="control-label">
            		<select class="form-control" placeholder="Satuan" type="text" name="bsatuan" required>
                        <option style="color:black" value="">Pilih Satuan</option>
                        <option style="color: black">BOX</option>
                        <option style="color: black">PCS</option>
                    </select>
                </div>
            </div>

            <!-- <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Harga Pokok" type="text" name="bharga_pokok" required>
                </div>
            </div> -->

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Harga Pokok" type="number" name="bharga_jual" required>
                </div>
            </div>

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Harga Eceran" type="number" name="bharga_jual_grosir" required>
                </div>
            </div>

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Stok" type="number" name="bstok" required>
                </div>
            </div>

            <div class="form-group">
                <div class="control-label">
                <select id="kategori_id" name="kategori_id" class="form-control" data-live-search="true" placeholder="Pilih Kategori" required>
                   	<option style="color:black" value="">Pilih Kategori</option>
					<?php
		                    if(isset($data_kategori)){
		                        foreach($data_kategori as $row){
		            ?>
            <option style="color:black" value="<?php echo $row->kategori_id?>"><?php echo $row->kategori_nama?></option>
		                        <?php
		                        }
		                    }
		                    ?>
                </select>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <br>
</form>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
<!-- </div>
</div>
</div>
</div>
</tbody>
</table> -->

<!-- 
<?php
if (isset($data_barang)){
    foreach($data_barang as $row){
        ?>
    <?php }
}
?> -->