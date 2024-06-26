<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>
  <?php echo $this->session->flashdata('pesan')?>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr>
              <th class="text-center">No</th>
              <th class="text-center">A1</th>
              <th class="text-center">A2</th>
              <th class="text-center">A3</th>
              <th class="text-center">Kesimpulan</th>
           </tr>
         </thead>
         <tbody>
           <?php $no=1; foreach($rules as $j) : ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $j->A1 ?></td>
              <td class="text-center"><?php echo $j->A2 ?></td>
              <td class="text-center"><?php echo $j->A3 ?></td>
              <td class="text-center"><?php echo $j->Kesimpulan ?></td>
            </tr>
          <?php endforeach; ?>
         </tbody>
       </table>
     </div>
   </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr>
              <th class="text-center">No</th>
              <th class="text-center">A1</th>
              <th class="text-center">A2</th>
              <th class="text-center">A3</th>
              <th class="text-center">Predikat</th>
           </tr>
         </thead>
         <tbody>
           <?php $no=1; foreach($predikat as $j) : ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $j->A1 ?></td>
              <td class="text-center"><?php echo $j->A2 ?></td>
              <td class="text-center"><?php echo $j->A3 ?></td>
              <td class="text-center"><?php echo $j->Predikat ?></td>
            </tr>
          <?php endforeach; ?>
         </tbody>
       </table>
     </div>
   </div>
  </div>
</div>