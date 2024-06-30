<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
	<center>
		<h1>SDIT Qoshru Al Athfal</h1>
		<h2>Data Fuzzy: <?php echo $nama_pegawai?></h2>
		<hr style="width: 50%; border-width: 5px; color: black">
	</center>

	<table class="table table-striped table-bordered mt-3">
		<thead>
			<tr>
				<th class="text-center" width="5%">No</th>
				<th class="text-center" >Tanggal</th>
				<th class="text-center" >Nama Pegawai</th>
				<th class="text-center" >Masa Kerja</th>
				<th class="text-center" >Pendidikan</th>
				<th class="text-center" >Kehadiran</th>
				<th class="text-center" >Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($lap_data_fuzzy as $l) : ?>
			<tr>
				<td class="text-center"><?php echo $no++ ?></td>
				<td class="text-left"><?php echo date("d-m-Y", strtotime($l->tanggal)) ?></td>
				<td class="text-left"><?php echo $l->nama_pegawai ?></td>
				<td class="text-left"><?php echo $l->masa_kerja ?></td>
				<td class="text-left"><?php echo $l->pendidikan ?></td>
				<td class="text-left"><?php echo $l->kehadiran ?></td>
				<td class="text-right">Rp. <?php echo number_format($l->nilai,0,',','.') ?></td>
			</tr>
			<?php endforeach ;?>
		</tbody>
	</table>

</body>
</html>

<script type="text/javascript">
	window.print();
</script>