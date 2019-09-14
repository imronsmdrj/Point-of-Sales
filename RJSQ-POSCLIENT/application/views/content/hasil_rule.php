<div class="container">

<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo "Tanggal ".$awal." - ".$akhir."<input type='submit' class='btn btn-primary' name='cetak' value='Cetak'>";?>
		<?php //echo "Tanggal : 01-12-2017 - 01-12-2017 <input type='submit' class='btn btn-primary' name='cetak' value='Cetak'>";?>
	</div>
	<div class="panel-body">
		<h3>Kombinasi <?php echo $kombinasi;?> Barang</h3>
		<br>
		<table id="" class="table table-striped table-hover">
			<tr>
				<td width="250">
					Support
				</td>
				<td width="50">
					:
				</td>
				<td align="left">
					<?php echo $support;?>
				</td>
			</tr>
			<tr>
				<td>
					Support x Confidence
				</td>
				<td>
					:
				</td>
				<td>
					<?php echo $sxc;?>
				</td>
			</tr>
		</table>

		<form action="" method="post">
			<div class="table">
				<table id="" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Aturan</th>
							<th>Support</th>
							<th>Confidence</th>
							<th>Support x Confidence</th>
							<th>Memenuhi Thresold Support</th>
							<th>Memenuhi Thresold Support x Confidence</th>
						</tr>
					</thead>
					<tbody>
						<?php

							for($o=0;$o<count($listKode);$o++){

						?>
						<tr>
							<td>
								<?php echo "Jika Membeli ".$listName0." dan ".$listName1." Maka Akan Membeli ".$listName2;?>
							</td>
							<td>
							  	<?php print $listSupport0;?>
							</td>
							<td>
							  	<?php print $listConfidence;?>
							</td>
							<td>
								<?php print $listRsxc0;?>
							</td>
							<td>
								<?php print ($listSupport1 == 1) ? "Ya" : "Tidak";?>
							</td>
							<td>
								<?php print ($listRsxc1 == 1) ? "Ya" : "Tidak";?>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>

<!-- 			<?php //echo "<p align='center';float='center'>
								//<input type='submit' class='btn btn-primary' name='proses' value='Proses'>
								//<button type='reset' class='btn btn-danger' onclick='history.go(-1);'>Kembali</button></p>"
			//;
			?> -->
		</form>
		<br>
<!-- 		<?php
			//for($o=0;$o<count($listKode);$o++){
				//echo $listKode[$o][0]."=>";
				//echo $listKode[$o][1]."<br>";
			//}
		?> -->
		<center><h3>Hasil</h3></center>
		<br>
		<form action="" method="post">
			<div class="table">
				<table id="" class="table table-striped table-bordered table-hover">
					<tbody>
						<tr>
							<td colspan="4">
								<!-- Kemungkinan Terbesar Jika Membeli Maka Akan Membeli sabutamol dengan Nilai 0.5625. Jika Ada Produk sabutamol Dengan Merek Tertentu Kurang Laku, Maka Bisa Diletakkan Bersebelahan Dengan Produk Dengan Merek Tertentu Yang Laku, Maka Kemungkinan Besar Akan Laku Juga. -->
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<?php echo "<p align='center';float='center'>
								<input type='submit' class='btn btn-primary' name='proses' value='Proses'>
								<button type='reset' class='btn btn-danger' onclick='history.go(-1);'>Kembali</button></p>"
			;
			?>
		</form>
	</div>
</div>
</div>