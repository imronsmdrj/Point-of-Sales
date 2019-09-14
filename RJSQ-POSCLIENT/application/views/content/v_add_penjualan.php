<!-- $(function() {
  $('.selectpicker').selectpicker();
});
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" /> -->

<style>
    .others {
        color:black
    }
</style>
<div class="container">
    <form>
        <label class="control-label"><h6>Kode Penjualan</h6></label>
        <div class="control">
            <input type="text" class="form-control col-md-4" value="<?php echo $pj_id; ?>" readonly>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th bgcolor="#ffffff"><font color="#000000"><center>No</center></font></th>
                <th bgcolor="#ffffff"><font color="#000000"><center>Kode Barang</center></font></th>
                <th bgcolor="#ffffff"><font color="#000000"><center>Nama Barang</center></font></th>
                <th bgcolor="#ffffff"><font color="#000000"><center>Penjualan</center></font></th>
                <th bgcolor="#ffffff"><font color="#000000"><center>Harga</center></font></th>
                <th bgcolor="#ffffff"><font color="#000000"><center>Subtotal</center></font></th>
                <th bgcolor="#ffffff"><font color="#000000" class="span3"><center>
                    <a href="#modalAddPenjualanBarang" class="btn btn-inverse btn-block" data-toggle="modal">
                        <i class="tim-icons icon-send"></i>  Tambah Barang
                    </a>
                </center></font></th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; $no=1;?>
            <?php foreach($this->cart->contents() as $items): ?>
                <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                <tr class="gradeX">
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $items['id']; ?></center></td>
                    <td><center><?php echo $items['name']; ?></center></td>
                    <td><center><?php echo $items['qty']; ?></center></td>
                    <td><center>Rp. <?php echo $this->cart->format_number($items['price']); ?></center></td>
                    <td><center>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></center></td>
                    <td><center>
                        <a class="btn btn-mini btn-danger btn-block" href="<?php echo site_url('penjualan/hapus_cart/'.$items['rowid']) ?>">
                            <i class="tim-icons icon-trash-simple"></i> Hapus Barang</a>
                    </center></td>
                </tr>

                <?php $i++; $no++;?>
            <?php endforeach; ?>
            </tbody>
        </table>

    </form>

    <form action="<?php echo site_url('penjualan/simpan_penjualan') ?>" method="post">
        <div class="row-fluid">
            <div class="span8">
                <div class="form-group">
                    <h6><label class="control-label">Data Supplier</label></h6>
                    <div class="controls">
                        <select class="form-control col-md-4" id="sid" tabindex="5" name="pj_supplier_id" data-placeholder="Pilih Supplier" required>
                            <option value="" style="color:black">--Pilih Supplier--</option>
                            <?php
                            if(isset($data_supplier)){
                                foreach($data_supplier as $row){
                                    ?>
                                    <option style="color:black" value="<?php echo $row->sid?>"><?php echo $row->snama?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div id="detail_supplier"></div>
            </div>
            <br><br>
            <div class="span4 badge pull-right">
                <div class="control-group">
                    <label class="control-label" style="text-align: center"><h4>Total Harga (Rp)</h4></label>
                    <div class="controls">
                    
                        <input type="text" class="form-control col-md-15" name="pj_total" id="total" style="text-align: center;" value="<?php echo $this->cart->total(); ?>" readonly>
                        <br>
                <table>    
                    <tr>
                        <th>Jumlah Tunai (Rp)</th>
                        <th><input type="number" class="form-control col-md-15" name="pj_jumlah_uang" id="jmluang" placeholder="" style="text-align: left;" required></th>
                    </tr>
                    <tr>
                        <th>Kembalian (Rp)</th>
                        <th><input type="text" class="form-control col-md-15" style="text-align: center" name="pj_kembalian" id="kembalian" element onfocus="myScript" placeholder="" readonly></th>
                    </tr>
                </table>
                    </div>
                </div>

                <input type="hidden" name="pj_id" value="<?= $pj_id; ?>" readonly>
                <input type="hidden" name="pj_total" value="<?= $this->cart->total()?>">
                <input id="pj_tanggal" type="hidden" name="pj_tanggal" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">

            </div>

        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary" id="save"><i class="tim-icons icon-check-2"></i> Save</button>
            <a href="<?php echo site_url('penjualan')?>" class="btn"><i class="tim-icons icon-trash-simple"></i> Cancel</a>
        </div>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- ============ MODAL ADD PENJUALAN BARANG =============== -->
<div id="modalAddPenjualanBarang" class="modal fade modal-info">
	   <div class="modal-dialog">
   	<div class="modal-content">
   		<div class="modal-header justify-content-center">
   			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="tim-icons icon-simple-remove text-white"></i>
              </button>
            <div class="text-muted text-center ml-auto mr-auto">
                <h3 class="mb-0">Tambah Barang</h3>
              	</div>
            </div>
    <form id="frm" name="frm"  method="post" action="<?php echo site_url('penjualan/tambah_penjualan_to_cart')?>">
        <div class="modal-body" style="min-height: 200px">
            <div class="control-group">
                <label class="control-label">Daftar Barang</label>
                <div class="controls">
                <select id="bid" class="form-control" name="bid" data-live-search="true" placeholder="Pilih Supplier" required">
                        <option value="" style="color:black">--Pilih Barang--</option>
                        <?php
                        if(isset($data_barang)){
                            foreach($data_barang as $row){
                                ?>
                                <option style="color:black" value="<?php echo $row->bid?>"><?php echo $row->bnama?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                <!-- <label for="">Kode Barang</label>
                <input id="bid" type="text" class="form-control" name="bid" data-live-search="true" placeholder="Kode Barang" required></input> -->
    <!-- <label for="">Nama Barang</label id="bnama"> -->
    <!-- <input id="bnama_edit" type="text" class="form-control" name="bnama_edit" data-live-search="true" placeholder="Kode Barang" required></input> -->
                </div>
            </div>
            <div id="detail_barang"></div>
        </div>

        <div class="text-center">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary" disabled="disabled" id="add" name="add">Save</button>
        </div>
    </form>
</div>
</div>
</div>

<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#bid").change(function(){
            var bid = $("#bid").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/get_detail_barang'); ?>",
                data: "bid="+bid,
                cache:false,
                success: function(data){
                    $('#detail_barang').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });

        $("#sid").change(function(){
            var sid = $("#sid").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/get_detail_supplier'); ?>",
                data: "sid="+sid,
                cache:false,
                success: function(data){
                    $('#detail_supplier').html(data);
                }
            });
        });

        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan menghapus?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>penjualan/hapus_penjualan",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });

    })
</script>
  <script type="text/javascript">
        $(function(){
            $('#jmluang').on("input",function(){
                var total = $('#total').val();
                var jumuang = $('#jmluang').val();
                console.log(total)
                console.log(jmluang)
                var hsl = jumuang - total;
                console.log(hsl)
                $('#kembalian').val(hsl);
                object.onfocus = function(){myScript};
                // $('#jmluang2').val(hsl);
            }) 
        });
    </script>

<script>
// assumes you're using jQuery
$(document).ready(function() {
$('.confirm-div').hide();
<?php if($this->session->flashdata('msg')){ ?>
$('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
<?php } ?>
});
</script>

<script type="text/javascript">
        $(function(){
            $('.jmluang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script> 
    <!--   <script type="text/javascript">
        $(function(){
            $('.jmluang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jmluang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script> -->
    <!-- <script>
                    $(document).ready(function() {

                    $('#id_kode_barang').on('change', function() {

$.ajax({
    type: "POST",
    data: { id_kode_barang: $('#id_kode_barang').val() },
    url: '<?php echo base_url()."penjualan/get_id_kode_barang" ?>',
    dataType: 'text',
    success: function(resp) {
    var json = JSON.parse(resp.replace(',.', ''))
    var $bnama = $("#bnama");
    // var $s = $("#satuan");
    $bnama.empty(); // remove old options
    // $s.empty(); // remove old options
    // $bnama.append($("<option></option>")
    // .attr("value", '').text('-- Pilih Matpel --'));
    $.each(json, function(key, value) {
        $bnama.append($("<label for='' id=''>Nama Barang</label>"))
        $bnama.append($("<input type='text' id='harga' readonly name='bnama' class='form-control border-input'>")
        .attr("value", value.bnama));
        });
    },
    error: function (jqXHR, exception) {
    console.log(jqXHR, exception)
    }
});
});
                    });

</script> -->