<div class="container">

<h3><i class="tim-icons icon-atom"></i> Proses Apriori</h3>


<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?php echo base_url(); ?>apriori/hasil_rule" method="post">
            <table class="table">
                <tr>
                    <td>From</td>
                    <td align="center">:</td>
                    <td><input type="date" name="awal" class="form-control" required="required" title="Tanggal Awal"></td>
                    <td align="center">To</td>
                    <td><input type="date" name="akhir" class="form-control" required="required" title="Tanggal Akhir"></td>
                </tr>
            </table>
          
            <div class="table">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Jumlah Kombinasi</th>
                            <th style="text-align: center;">Threshold Support</th>
                            <th style="text-align: center;">Threshold Support x Confidence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="kombinasi" id="input" class="form-control" required="required">
                <?php
                    for($i=0;$i<7;){
                        $i++;
                ?>
                                    <option style="color: black" value="<?php echo $i;?>"><?php echo $i." Produk";?></option>
                <?php
                    }
                ?>
                                </select>
                            </td>
                            <td>
                                <?php echo "<input type='text' name='support' class='form-control'>";?>
                            </td>
                            <td>
                                <?php echo "<input type='text' name='sxc' class='form-control'>";?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Proses</button>

<!--             <?php 
                echo "<p align='center';float='center'>
                            <input type='submit' class='btn btn-primary' name='proses' value='Proses'>
                            <button type='reset' class='btn btn-danger' onclick='history.go(-1);'>Kembali</button></p>";
            ?> -->
        </form>
    </div>
</div>
</div>
<!-- <?php
    $proses     = @$_POST['proses'];
    if($proses) {

        echo"
        <script type='text/javascript'>
            window.location.href = 'apriori&action=hasil_rule&awal=".@$_POST['awal']."&akhir=".@$_POST['akhir']."&kombinasi=".@$_POST['kombinasi']."&support=".@$_POST['support']."&sxc=".@$_POST['sxc']."';
        </script>";
    }
?> -->


