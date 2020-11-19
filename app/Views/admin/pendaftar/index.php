<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
    <i class="fas fa-home"></i>
    <?php foreach ($pengaturan as $k) : ?>
      <?= $k['nama_aplikasi']; ?> / <a href="/admin/dasboard" class="text-gray-700">Admin</a> / <a href="dasboard" class="text-gray-700"><?= $title; ?> </a> </p>
<?php endforeach; ?>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">Data Calon Mahasiswa</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="col-md-12 mb-3" align="right">
            <a href="" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i>
              Tambah</a>
          </div>

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr align="center" style="font-size: 14px;">
                <!-- <th width="1%"><input type="checkbox" id="pilih_semua"></th> -->
                <th width="2%">No</th>
                <th width="10%">No Pendaftaran</th>
                <th width="15%">Nama</th>
                <th width="10%">Email</th>
                <th width="10%">Prodi Pilihan 1</th>
                <th width="5%">Tanggal Daftar</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($pendaftar as $k) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <th><?= $k['no_pendaftaran']; ?></th>
                  <td><?= $k['nama']; ?></td>
                  <td><?= $k['email']; ?></td>
                  <td><?= $k['prodi']; ?></td>
                  <td><?= $k['created_at']; ?></td>
                  <td align="center">
                    <a href="/pendaftar/detail/<?= $k['id_pendaftar']; ?>" class="btn btn-primary m-1 btn-sm btn-circle data-placement=" top" title="" data-toggle="tooltip" data-original-title="Data Detail <?= $k['nama']; ?>"">
                      <i class=" fas fa-eye"></i></a>
                    <a href="" class="btn btn-warning btn-sm m-1 btn-circle data-placement=" top" title="" data-toggle="tooltip" data-original-title="Download Formulir <?= $k['nama']; ?>"">
                      <i class=" fas fa-download"></i></a>
                    <a href="#" class="btn btn-danger btn-sm m-1 btn-circle" data-placement="top" title="" data-toggle="tooltip" data-original-title="Hapus Data <?= $k['nama']; ?>">
                      <i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>