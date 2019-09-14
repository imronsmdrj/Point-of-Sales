<!--     <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.printPage.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btnPrint").printPage();
        })
    </script> -->
    <div class="container">
    	<div class="card w-75">
<table class="table table-bordered">
	<thead>
		<tr>
			<th bgcolor="#ffffff"><font color="#000000"><center>No</center></font></th>
			<th bgcolor="#ffffff"><font color="#000000"><center>Tanggal</center></font></th>
			<th bgcolor="#ffffff"><font color="#000000"><center>Kode Penjualan</center></font></th>
			<th bgcolor="#ffffff"><font color="#000000"><center>Jumlah</center></font></th>
			<th bgcolor="#ffffff"><font color="#000000"><center>Total Harga</center></font></th>
			<th bgcolor="#ffffff"><font color="#000000"><center>Supplier</center></font></th>
			<th class="span3" bgcolor="#ffffff"><font color="#000000">
				<a href="<?php echo base_url(); ?>penjualan/pages_tambah_penjualan" class="btn btn-mini btn-block btn-inverse">
					<i class="tim-icons icon-send"></i> Tambah Data
				</a></font>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
		if(isset($data_penjualan)){
			foreach ($data_penjualan as $row) {
				?>
				<tr class="gradeX">
					<td><center><?php echo $no++; ?></center></td>
					<td><center><?php echo date("d M Y",strtotime($row->pj_tanggal));?></center></td>
					<td><center><?php echo $row->pj_id; ?></center></td>
					<td><center><?php echo $row->jumlah; ?> Items</center></td>
					<td><center><?php echo currency_format($row->pj_total); ?></center></td>
					<td><center><?php echo $row->snama; ?></center></td>
					<td><center>
						<a class="btn btn-primary" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->pj_id)?>">
							<i class="tim-icons icon-atom"></i> View</a>
						<a class="btn btn-danger" href="<?php echo site_url('penjualan/hapus/'.$row->pj_id)?>"
							onclick="return confirm('Anda Yakin Ingin Menghapusnya ?');">
							<i class="tim-icons icon-trash-simple"></i> Hapus</a>
						<a class="btn btn-warning" href="<?php echo site_url('cetak/print_penjualan/'.$row->pj_id)?>" target="_blank">
							<i class="fa fa-print"></i> Print</a>
					</center></td>
					</tr>
				<?php }
			}
			?>
	</tbody>
</table>
</div>
</div>