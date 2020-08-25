<?= $this->extend('admin/layout_info/template'); ?>

<?= $this->section('admin/layout_info/content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">Data pendaftar keseluruhan</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <div class="col-md-12 mb-3" align="right">
                      <a href="" class="btn btn-primary btn-sm">
                      <i class="fas fa-download"></i>
                      Unduh Semua</a>
                    </div>
                    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center" style="font-size: 14px;">
                      <!-- <th width="1%"><input type="checkbox" id="pilih_semua"></th> -->
                      <th width="2%">No</th>
                      <!-- <th width="3%">NISN</th> -->
                      <th width="5%">Judul</th>
                      <th width="20%">Informasi</th>
                      <th width="5%">Tanggal Post</th>
                      <th width="8%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php $i =1; ?>
                <?php foreach($informasi as $k) : ?>
                <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $k['judul']; ?></td>
                <td><?= $k['informasi']; ?></td>
                <td><?= $k['created_at']; ?></td>
                <td>
                    <a href="/komik/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
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