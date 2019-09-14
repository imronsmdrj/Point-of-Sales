<div class="pull-right"><button a href="#modalAddSupplier" class="btn btn-sm btn-primary" data-toggle="modal">Tambah Supplier</a></button></div>
<br><br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th bgcolor="#ffffff"><font color="#000000"><center>No</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Kode Supplier</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Nama Supplier</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Alamat Supplier</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Telp Supplier</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Aksi</center></font></th>
    </tr>
    </thead>
    <tbody>

    <?php
    $no=1;
    if(isset($data_supplier)){
    foreach($data_supplier as $row){
    ?>
    <tr>
        <td><center><?php echo $no++; ?></center></td>
        <td><center><?php echo $row->sid; ?></center></td>
        <td><center><?php echo $row->snama; ?></center></td>
        <td><center><?php echo $row->salamat; ?></center></td>
        <td><center><?php echo $row->stelp; ?></center></td>
        <td><center>
        <a class="btn btn-sm btn-success" href="#modalEditSupplier<?php echo $row->sid?>" data-toggle="modal"><span class='fa fa-edit'></span></a>
        <a class="btn btn-sm btn-danger" href="<?php echo site_url('master/hapus_supplier/'.$row->sid);?>"
               onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')"><span class='fa fa-trash'></span></a>
        </center></td>
    </tr>


<!-- ============ MODAL EDIT SUPPLIER =============== -->

<div id="modalEditSupplier<?php echo $row->sid?>" class="modal fade modal-danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove text-white"></i>
                </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 id="myModalLabel" class="mb-0">Edit Data Supplier</h3>
            </div>
        </div>

            <div class="modal-body">
                <form role="form" method="post" action="<?php echo site_url('master/edit_supplier');?>">
                    <div class="form-group mb-3">
                        <div class="control-label">
                            <label class="control-label">Kode Supplier</label>
                        </div>
                            <input name="sid" class="form-control" type="text" value="<?php echo $row->sid;?>" readonly>
                    </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label" >Nama Supplier</label>
                </div>
                    <input name="snama" class="form-control" type="text" value="<?php echo $row->snama;?>" required>  
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label" >Alamat Supplier</label>
                </div>
            <textarea name="salamat" rows="5" class="form-control" required><?php echo $row->salamat;?></textarea>
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label">Telp Supplier</label>
                </div>
                    <input name="stelp" class="form-control" type="number" value="<?php echo $row->stelp;?>" required>
            </div>
                        </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
    <?php }
    }
    ?>
    </tbody>
</table>



<!-- ============ MODAL ADD SUPPLIER =============== -->

<div class="modal fade modal-info" id="modalAddSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   	<div class="modal-content">
   		<div class="modal-header justify-content-center">
   			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="tim-icons icon-simple-remove text-white"></i>
              </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 class="mb-0">Input Data Supplier</h3>
              	</div>
            </div>

		<div class="modal-body">
		<form role="form" method="post" action="<?php echo site_url('master/tambah_supplier')?>">
			<div class="form-group mb-3">
  				<div class="control-label">
  					<input class="form-control" placeholder="Kode Supplier" type="text" name="sid" value="<?php echo $kd_supplier; ?>" readonly>
    			</div>
    		</div>

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Nama Supplier" type="text" name="snama" required>
                </div>
            </div>

            <div class="form-group">
            	<div class="control-label">
            		<textarea class="form-control" rows="5" placeholder="Alamat Supplier" name="salamat" required></textarea>
                </div>
            </div>

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Telp Supplier" type="number" name="stelp" required>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
</form>
</div>
</div>
</div>
<!-- </div>
</div>
</tbody>
</table> -->