<div class="container">
<div class="card card-body">
		<h3><i class="tim-icons icon-paper"></i> Data Laporan</h3>
<div class="row">
	<div class="col-lg-12">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;background-color: white;color: black">No</th>
					<th style="text-align: center;background-color: white;color: black">Daftar Laporan</th>
					<th style="text-align: center;background-color: white;color: black">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="text-align:center;vertical-align:middle">1</td>
                        <td style="vertical-align:middle;">Laporan Data Barang</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'laporan/lap_data_barang'?>" target="_blank"><span class="fa fa-print"></span></a>
                        </td>
				</tr>
				<tr>
					<td style="text-align:center;vertical-align:middle">2</td>
                        <td style="vertical-align:middle;">Laporan Stok Barang</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'laporan/lap_stok_barang'?>" target="_blank"><span class="fa fa-print"></span></a>
                        </td>
				</tr>
				<tr>
					<td style="text-align:center;vertical-align:middle">3</td>
                        <td style="vertical-align:middle;">Laporan Data Penjualan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'laporan/lap_data_penjualan'?>" target="_blank"><span class="fa fa-print"></span></a>
                        </td>
				</tr>
				<tr>
					<td style="text-align:center;vertical-align:middle">4</td>
                        <td style="vertical-align:middle;">Laporan Penjualan Perbulan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-info" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span></a>
                        </td>
				</tr>
			</tbody>
		</table>
</div>
</div>
</div>
</div>

		<!-- // MODAL ADD LAPORAN -->
<div id="lap_jual_perbulan" class="modal fade modal-info" tabindex="-1" role="dialog">
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
                 <form class="form-horizontal" method="post" action="<?php echo base_url().'laporan/lap_penjualan_perbulan'?>" target="_blank">
              <div class="form-group">
                      <select class="form-control" name="bln" required>
                          <option value="" style="color: black">Pilih Bulan</option>
                            <?php 
                             // if(isset($bln)){
                             //  foreach ($bln as $row) {
                            foreach ($jual_bln->result_array() as $k) {
                             $bln = $k['bulan'];
                            ?>
                          <option style="color: black"><?php echo $bln;?></option>
                              <?php }
                              ?>
                      </select>
                      <br> 
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-sm pull-right"><span class="fa fa-print"></span></button>
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
