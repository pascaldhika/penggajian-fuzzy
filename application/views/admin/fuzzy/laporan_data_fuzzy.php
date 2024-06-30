<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card mx-auto" style="width: 35%">
		<div class="card-header bg-primary text-white text-center">
			FIlter Laporan Data Fuzzy
		</div>

		<form method="POST" action="<?php echo base_url('admin/laporan_data_fuzzy/cetak_laporan_fuzzy')?>">
		<div class="card-body">
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Nama Pegawai</label>
				<div class="col-sm-9">
					<select class="form-control" name="nama_pegawai">
					    <option value=""> Pilih Pegawai </option>
					    <?php foreach($pegawai as $p) : ?>
					    	<option value="<?php echo $p->nama_pegawai ?>"><?php echo $p->nama_pegawai ?></option>
					    <?php endforeach; ?>
					</select>
				</div>
			</div>
			<button style="width: 100%" type="submit" class="btn btn-primary"><i class="fas fa-print"></i>Cetak Laporan Data Fuzzy</button>
	</div>
	</form>
</div>
<!-- /.container-fluid -->