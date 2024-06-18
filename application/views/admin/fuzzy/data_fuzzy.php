<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

  <div class="card mb-3">
  <div class="card-header bg-primary text-white">
    Form Input
  </div>
  <div class="card-body">
    <form>
      <div class="form-group">
        <label for="id_pegawai">Pegawai</label>
        <select class="form-control" name="id_pegawai">
          <option value=""> Pilih Pegawai </option>
          <?php foreach($pegawai as $p) : ?>
            <option value="<?php echo $p->id_pegawai ?>"><?php echo $p->nama_pegawai ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="masa_kerja">Kehadiran</label>
        <input type="kehadiran" name="kehadiran" class="form-control">
      </div>
	    <button class="btn btn-success mb-3" type="submit" name="submit" value="submit">Simpan</button>
	</form>
  </div>
</div>
</div>

	<div class="alert alert-info">
		Menampilkan Data Fuzzy Masa Kerja: <span class="font-weight-bold"><?php echo $masa_kerja ?></span> Pendidikan: <span class="font-weight-bold"><?php echo $pendidikan ?></span></span> Kehadiran: <span class="font-weight-bold"><?php echo $kehadiran ?></span>
	</div>

	<?php

	$jml_data = count($gaji);
	if($jml_data > 0 ) { ?>

		<div class="container-fluid">
		  <div class="card shadow mb-4">
		   <div class="card-body">
		     <div class="table-responsive">
		       <table class="table table-bordered" width="100%" cellspacing="0">
		         <thead class="thead-dark">
		           <tr>
		              <td class="text-center" style="background-color:#1cc88a;color:white;">Hasil Gaji <?php echo $nama_pegawai ?></td>
		           </tr>
		         </thead>
		         <tbody>
              <tr>
                <td class="text-center"><?php echo $gaji['gaji_total'] ?></td>
              </tr>
		         </tbody>
		       </table>
		     </div>
		   </div>
		  </div>
		</div>

	<?php }else { ?>
		<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silakan input data Pegawai dan Kehadiran</span>
	<?php } ?>
</div>