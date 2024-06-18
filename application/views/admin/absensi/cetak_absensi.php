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
		<h2>Laporan Kehadiran Karyawan</h2>
	</center>

	<table>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?php echo $bulan?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?php echo $tahun?></td>
		</tr>
	</table>

	<table class="table table-bordered table-triped">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">NIK</th>
				<th class="text-center">Nama Pegawai</th>
				<th class="text-center">Jabatan</th>
				<th class="text-center">Hadir</th>
				<th class="text-center">Sakit</th>
				<th class="text-center">Alpha</th>
				<th class="text-center">Izin</th>
			</tr>
			<?php $no=1; foreach($lap_kehadiran as $l) : ?>
			<tr>
				<td class="text-center"><?php echo $no++ ?></td>
				<td class="text-center"><?php echo $l->nik ?></td>
				<td class="text-center"><?php echo $l->nama_pegawai ?></td>
				<td class="text-center"><?php echo $l->nama_jabatan ?></td>
				<td class="text-center"><?php echo $l->hadir ?></td>
				<td class="text-center"><?php echo $l->sakit ?></td>
				<td class="text-center"><?php echo $l->alpha ?></td>
				<td class="text-center"><?php echo $l->izin ?></td>
			</tr>
			<?php endforeach ;?>
		</table>

</body>
</html>

<script type="text/javascript">
	window.print();
</script>