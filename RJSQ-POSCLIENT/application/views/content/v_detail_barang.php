<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){
        ?>
                <br>
                <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <label class="control-label">Kode Barang</label>
                </div>
                        <input name="djual_bid" class="form-control" type="text" value="<?php echo $row->bid; ?>" readonly="readonly">
                </div>


                <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <label class="control-label">Nama Barang</label>
                </div>
                        <input name="bnama" class="form-control" type="text" value="<?php echo $row->bnama; ?>" readonly="readonly">
                </div>

                <div class="form-group">
                <div class="input-group input-group-alternative">
                    <label class="control-label">Harga</label>
                </div>
                    <input name="harga" class="form-control" type="text" value="<?php echo $row->bharga_jual; ?>" readonly="readonly">
                </div>
            
                <div class="form-group">
                <div class="input-group input-group-alternative">
                    <label class="control-label">Satuan</label>
                </div>
                    <input name="bsatuan" class="form-control" type="text" value="<?php echo $row->bsatuan; ?>" readonly="readonly">
                </div>

                <div class="form-group">
                <div class="input-group input-group-alternative">
                    <label class="control-label">Ready Stok</label>
                </div>
                        <input id="bstok" class="form-control" name="bstok" type="text" value="<?php echo $row->bstok; ?>" readonly="readonly">
                </div>

                <div class="form-group">
                <div class="input-group input-group-alternative">
                    <label class="control-label">Jumlah Pengadaan</label>
                </div>
                        <input name="qty" class="form-control" type="number" max="<?php echo $row->bstok; ?>" class="" placeholder="Input Jumlah Pengadaan">
                </div>
    <?php
    }
}
?>