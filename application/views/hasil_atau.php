<style>
	.button {
		background-color: #4CAF50;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		-webkit-transition-duration: 0.4s;
		transition-duration: 0.4s;
		border-radius: 8px;
	}

	.button {
		box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
	}
</style>

<div class="jumbotron" align="center">
	KRITERIA MOTOR:
	<?= $jenis . ", " . $merek . ", "
		. str_replace('_', ' ', '' . $harga . '') . ", "
		. str_replace('_', ' ', '' . $mesin . '') . ", "
		. str_replace('_', ' ', '' . $konsumsi_bensin . '') . ", <b>atau</b> "
		. str_replace('_', ' ', '' . $kapasitas_bensin . ''); ?>
</div>
<div class="container" style="height: 74.6vh">
	<div class="row">
		<div class="col-sm-7" style="display: flex; justify-content: flex-end">
			<button data-toggle="collapse" class="button btn-info" data-target="#data-fuzzy" style="font-size: 20px">Data Fuzzy</button><br><br>
		</div>
		<div class="col-sm-5" style="display: flex; justify-content: flex-end">
			<a href="<?= base_url(); ?>">
				<button class="btn btn-danger">Kembali</button><br><br>
			</a>
		</div>
	</div>
	<br>
	<div id="data-fuzzy" class="collapse  table-responsive">
		<table id="" class="table table-bordered">
			<tr>
				<td>ID</td>
				<td>Nama Motor</td>
				<td><?= ucwords(str_replace('_', ' ', '' . $harga . '')); ?></td>
				<td><?= ucwords(str_replace('_', ' ', '' . $mesin . '')); ?></td>
				<td><?= ucwords(str_replace('_', ' ', '' . $konsumsi_bensin . '')); ?></td>
				<td><?= ucwords(str_replace('_', ' ', '' . $kapasitas_bensin . '')); ?></td>
				<td>Hasil (OR)</td>
			</tr>
			<?php
			foreach ($motor as $data) {
				$f1 = $data->$harga;
				$f2 = $data->$mesin;
				$f3 = $data->$konsumsi_bensin;
				$f4 = $data->$kapasitas_bensin;
				$hasil = max($f1, $f2, $f3, $f4);
				if ($hasil == 0) {
				} else {
			?>
					<tr>
						<td><?= "M" . $data->id ?></td>
						<td><?= $data->nama_motor; ?></td>
						<td><?= $f1; ?></td>
						<td><?= $f2; ?></td>
						<td><?= $f3; ?></td>
						<td><?= $f4; ?></td>
						<td><?= $hasil; ?></td>
					</tr>
			<?php }
			} ?>
		</table>
	</div>



	<div class="list-group">
		<?php
		foreach ($motor as $data) {
			$f1 = $data->$harga;
			$f2 = $data->$mesin;
			$f3 = $data->$konsumsi_bensin;
			$f4 = $data->$kapasitas_bensin;
			$hasil = max($f1, $f2, $f3, $f4);
			if ($hasil == 0) {
			} else {
		?>
				<a href="<?= base_url('beranda/lihat_motor/' . $data->id); ?>" class="list-group-item">
					<?php echo "<img src=" . str_replace(' ', '%20', '' . base_url('asset/gambar/') . $data->gambar . '') . " alt='Motor' style='width:100px;height:90px'>";
					echo "&nbsp;&nbsp;" . $data->merek . " " . $data->nama_motor; ?>
				</a>
		<?php }
		} ?>
	</div>

</div>