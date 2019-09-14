<?php
if(isset($detail_supplier)){
    foreach($detail_supplier as $row){
        ?>
        <br>
        <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
            <label class="control-label">Alamat</label>
        </div>
                <input name="salamat" class="form-control" type="text" value="<?php echo $row->salamat; ?>" readonly="readonly">
        </div>

        <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
            <label class="control-label">Telp Supplier</label>
        </div>
                <input name="stelp" class="form-control" type="text" value="<?php echo $row->stelp; ?>" readonly="readonly">
        </div>
    <?php
    }
}
?>
