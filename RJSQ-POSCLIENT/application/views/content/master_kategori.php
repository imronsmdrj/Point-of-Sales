<div class="pull-right"><button a href="#modalAddKategori" class="btn btn-sm btn-primary" data-toggle="modal">Tambah Kategori</a></button></div>
<br><br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th bgcolor="#ffffff"><font color="#000000"><center>No</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Kode Kategori</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Nama Kategori</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Aksi</center></font></th>
    </tr>
    </thead>
    <tbody>
    	<?php
    $no=1;
    if(isset($data_kategori)){
    foreach($data_kategori as $row){
    ?>
    <tr>
        <td><center><?php echo $no++; ?></center></td>
        <td><center><?php echo $row->kategori_id; ?></center></td>
        <td><center><?php echo $row->kategori_nama; ?></center></td>
        <td><center>
        <a class="btn btn-sm btn-success" href="#modalEditKategori<?php echo $row->kategori_id?>" data-toggle="modal"><span class='fa fa-edit'></span></a>
        <a class="btn btn-sm btn-danger" href="<?php echo site_url('master/hapus_kategori/'.$row->kategori_id);?>"
               onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')"><span class='fa fa-trash'></span></a>
        </center></td>
    </tr>

<!-- ============ MODAL EDIT KATEGORI =============== -->

<div id="modalEditKategori<?php echo $row->kategori_id?>" class="modal fade modal-danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove text-white"></i>
                </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 id="myModalLabel" class="mb-0">Edit Data Kategori</h3>
            </div>
        </div>

<div class="modal-body">
                <form role="form" method="post" action="<?php echo site_url('master/edit_kategori');?>">
                    <div class="form-group mb-3">
                        <div class="control-label">
                            <label class="control-label">Kode Kategori</label>
                        </div>
                            <input name="kategori_id" class="form-control" type="text" value="<?php echo $row->kategori_id;?>" readonly>
                    </div>

                	<div class="form-group">
                		<div class="control-label">
                    		<label class="control-label" >Nama Kategori</label>
                		</div>
                    	<input name="kategori_nama" class="form-control" type="text" value="<?php echo $row->kategori_nama;?>" required>	  
            		</div>
</div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>

    <?php }
    }
    ?>

    </tbody>
</table>

<!-- ============ MODAL ADD KATEGORI =============== -->

<div class="modal fade modal-info" id="modalAddKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   	<div class="modal-content">
   		<div class="modal-header justify-content-center">
   			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="tim-icons icon-simple-remove text-white"></i>
              </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 class="mb-0">Input Data Kategori</h3>
              	</div>
            </div>

		<div class="modal-body">
		<form role="form" method="post" action="<?php echo site_url('master/tambah_kategori')?>">
      <div class="form-group mb-3">
                <div class="control-label">
                    <input class="form-control" placeholder="Input Kategori" type="hidden" name="kategori_id" required>
                </div>
            </div>
        <div class="form-group mb-3">
            &nbsp;<label>Input Kategori Baru</label>
            	<div class="control-label">
            		<input class="form-control" placeholder="Input Kategori" type="text" name="kategori_nama" required>
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
</div>
</div>
</tbody>
</table> -->


