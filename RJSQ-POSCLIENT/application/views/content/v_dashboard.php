<div class="container">
<!-- <h1 class="text-danger" style="text-align: center">RJSQ•Point Of Sales</h1> -->
<br/>
<?php if(isset($contact)){
foreach($contact as $row){
?>
    <div class="typography-line style="text-align: center">
        <blockquote>
        	<p class="blockquote blockquote-primary">"I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."<br><br><small class="pull-right">- <?php echo $row->nama?></small><br><br></p></blockquote>
    </div>

<?php }
}
?>

<div class="card card-body">
	<h4><i class="tim-icons icon-chart-bar-32"></i> Daftar Grafik</h4>
<div class="row">
	<div class="col-lg-12">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;background-color: white;color: black">No</th>
					<th style="text-align: center;background-color: white;color: black">Daftar Grafik</th>
					<th style="text-align: center;background-color: white;color: black">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="text-align:center;vertical-align:middle">1</td>
                        <td style="vertical-align:middle;">Grafik Penjualan Perbulan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-info" href="#GrafPenjualanPerbulan" data-toggle="modal"><span class="fa fa-eye"></span></a>
                        </td>
				</tr>
				<tr>
					<td style="text-align:center;vertical-align:middle">2</td>
                        <td style="vertical-align:middle;">Grafik Stok Barang</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'grafik/graf_stok_barang'?>" target="_blank"><span class="fa fa-eye"></span></a>
                        </td>
				</tr>
			</tbody>
		</table>
</div>
</div>
</div>
</div>

		<!-- // MODAL ADD GRAFIK PENJUALAN -->
<div id="GrafPenjualanPerbulan" class="modal fade modal-info" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header justify-content-center">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="tim-icons icon-simple-remove text-white"></i>
            </button>
            <div class="text-muted text-center ml-auto mr-auto">
               <h4 class="mb-0">Pilih Bulan</h4>
            </div>
         </div>
              <div class="modal-body">
                 <form class="form-horizontal" method="post" action="<?php echo base_url().'grafik/graf_penjualan_perbulan'?>" target="_blank">
              <div class="form-group">
                      <select class="form-control" name="bln" required>
                          <option value="" style="color: black">Pilih Bulan</option>
                            <?php 
                             // if(isset($bln)){
                             //  foreach ($bln as $row) {
                            foreach ($data_graf_perbulan->result_array() as $k) {
                             $bln = $k['bulan'];
                            ?>
                          <option style="color: black"><?php echo $bln;?></option>
                              <?php }
                              ?>
                      </select>
                      <br> 
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-sm pull-right"><span class="fa fa-eye"></span></button>
                </div>
              </div>
            </form>
              </div>        
      </div>
   </div>
</div>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format: 'DD MMMM YYYY HH:mm',
                });

                $('#datepicker').datetimepicker({
                    format: 'YYYY-MM-DD',
                });
                $('#datepicker2').datetimepicker({
                    format: 'YYYY-MM-DD',
                });

                $('#timepicker').datetimepicker({
                    format: 'HH:mm'
                });
            });
</script>
