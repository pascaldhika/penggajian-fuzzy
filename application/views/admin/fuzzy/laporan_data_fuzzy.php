<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

  <div class="card mb-3">
    <div class="card-header bg-primary text-white">
      Filter Data Fuzzy 
    </div>
    <div class="card-body">
      <form class="form-inline" method="POST" action="<?php echo base_url('admin/laporan_data_fuzzy/cetak_laporan_fuzzy')?>">
	  	<div class="form-group row">
			<label for="nama_pegawai" class="col-sm-3 col-form-label">Pegawai</label>
			<div class="col-sm-9">
				<select class="form-control" name="nama_pegawai">
					<option value="">Semua Pegawai</option>
					<?php foreach($pegawai as $p) : ?>
						<option value="<?php echo $p->nama_pegawai ?>"><?php echo $p->nama_pegawai ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
        <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-print"></i> Cetak</button>

      </form>
    </div>
  </div>
</div>

<?php
	if((isset($_GET['nama_pegawai']) && $_GET['nama_pegawai']!='')){
		$nama_pegawai = $_GET['nama_pegawai'];
	}else{
		$nama_pegawai = 'Semua';
	}
?>

<?php
$jml_data = count($gaji);
if($jml_data > 0 ) { ?>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
			  	<th class="text-center" width="5%">No</th>
				<th class="text-center" >Tanggal</th>
				<th class="text-center" >Nama Pegawai</th>
				<th class="text-center" >Masa Kerja</th>
				<th class="text-center" >Pendidikan</th>
				<th class="text-center" >Kehadiran</th>
				<th class="text-center" >Total Gaji</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($gaji as $l) : ?>
              <tr>
			  	<td class="text-center"><?php echo $no++ ?></td>
				<td class="text-left"><?php echo date("d-m-Y", strtotime($l->tanggal)) ?></td>
				<td class="text-left"><?php echo $l->nama_pegawai ?></td>
				<td class="text-left"><?php echo $l->masa_kerja ?></td>
				<td class="text-left"><?php echo $l->pendidikan ?></td>
				<td class="text-left"><?php echo $l->kehadiran ?></td>
				<td class="text-right">Rp. <?php echo number_format($l->nilai,0,',','.') ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php } else { ?>
  <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data Fuzzy kosong</span>
<?php } ?>
</div>