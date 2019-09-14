<div class="pull-right"><button a href="#modalAddPegawai" class="btn btn-sm btn-primary" data-toggle="modal">Tambah Pegawai</a></button></div>
<br><br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th bgcolor="#ffffff"><font color="#000000"><center>No</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Kode Pegawai</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Nama Pegawai</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Username</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Level</center></font></th>
        <th bgcolor="#ffffff"><font color="#000000"><center>Aksi</center></font></th>
    </tr>
    </thead>

<tbody>
    <?php
    $no=1;
    if(isset($data_pegawai)){
        foreach($data_pegawai as $row){
    ?>

    <tr>
        <td><center><?php echo $no++; ?></center></td>
        <td><center><?php echo $row->user_id; ?></center></td>
        <td><center><?php echo $row->nama; ?></center></td>
        <td><center><?php echo $row->username; ?></center></td>
        <td><center><?php echo $row->user_level; ?></center></td>
        <td><center>
        <a class="btn btn-sm btn-success" href="#modalEditPegawai<?php echo $row->user_id?>" data-toggle="modal"><span class='fa fa-edit'></span></a>
        <a class="btn btn-sm btn-danger" href="<?php echo site_url('master/hapus_pegawai/'.$row->user_id);?>"
               onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')"><span class='fa fa-trash'></span></a>
        </center></td>
    </tr>


<!-- ============ MODAL EDIT PEGAWAI =============== -->

<div id="modalEditPegawai<?php echo $row->user_id?>" class="modal fade modal-danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove text-white"></i>
                </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 id="myModalLabel" class="mb-0">Edit Data Pegawai</h3>
            </div>
        </div>

            <div class="modal-body">
                <form role="form" method="post" action="<?php echo site_url('master/edit_pegawai');?>">
                    <div class="form-group mb-3">
                        <div class="control-label">
                            <label class="control-label">Kode Pegawai</label>
                        </div>
                            <input name="user_id" class="form-control" type="text" value="<?php echo $row->user_id;?>" readonly>
                    </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label" >Nama Pegawai</label>
                </div>
                    <input name="nama" class="form-control" type="text" value="<?php echo $row->nama;?>" required>  
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label" >Username</label>
                </div>
                   <input name="username" class="form-control" type="text" value="<?php echo $row->username;?>" required>
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label">Password</label>
                </div>
                    <input name="password" class="form-control" type="password" placeholder="Masukan Password Baru" value="" required>
            </div>

            <div class="form-group">
                <div class="control-label">
                    <label class="control-label">User Level</label>
                </div>
            <select class="form-control" id="user_level" name="user_level" placeholder="Pilih Level" required>
                        <option style="color:black" value="">Pilih Level</option>
                        <option style="color:black" value="Admin">Admin</option>
                        <option style="color:black" value="Kasir">Kasir</option>
     
            </select>
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


<!-- ============ MODAL ADD PEGAWAI =============== -->

    <?php
    $no=1;
    if(isset($data_pegawai)){
        foreach($data_pegawai as $row){
            ?>

<div class="modal fade modal-info" id="modalAddPegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   	<div class="modal-content">
   		<div class="modal-header justify-content-center">
   			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="tim-icons icon-simple-remove text-white"></i>
              </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 class="mb-0">Input Data Pegawai</h3>
              	</div>
            </div>

		<div class="modal-body">
		<form role="form" method="post" action="<?php echo site_url('master/tambah_pegawai')?>">
            
            <div class="form-group">
                <div class="control-label">
                    <input class="form-control" placeholder="Kode Pegawai" type="hidden" name="user_id" value="<?php echo $row->user_id; ?>" readonly>
                </div>
            </div>

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Nama Pegawai" type="text" name="nama" required>
                </div>
            </div>

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Username" type="text" name="username" required>
                </div>
            </div>

            <div class="form-group">
            	<div class="control-label">
            		<input class="form-control" placeholder="Password" type="password" name="password" required>
                </div>
            </div>

            <div class="form-group">
                &nbsp;<label>Pilih Level</label>
                <div class="control-label">
                <select id="user_level" name="user_level" class="form-control" placeholder="Pilih Level" required>
                    <option style="color:black" value="">Pilih Level</option>
                    <option style="color:black" value="Admin">Admin</option>
                    <option style="color:black" value="Kasir">Kasir</option>
                </select>
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
<?php
    }
}
?>
<!-- </div>
</div>
</tbody>
</table> -->