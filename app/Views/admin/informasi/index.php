<?= $this->extend('templates/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">Data Informasi PMB</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-md-12 mb-3" align="right">
              <a href="informasi/create" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Tambah Info</a>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>

              </div>

            <?php endif; ?>

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
                <?php $i = 1; ?>
                <?php foreach ($informasi as $k) : ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $k['judul']; ?></td>
                    <td><?= $k['info']; ?></td>
                    <td><?= $k['created_at']; ?></td>
                    <td align="center">

                      <a href="/informasi/edit/<?= $k['slug']; ?>" class="btn btn-warning m-1 btn-circle" data-placement="top" title="" data-toggle="tooltip" data-original-title="Ubah Informasi <?= $k['judul']; ?>">
                        <i class="fas fa-edit"></i></a>
                      <form action="informasi/<?= $k['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn  m-1 btn-danger btn-circle" onclick="return confirm('Apakah anda yakin data ini di hapus?');" data-toggle="tooltip" data-original-title="Hapus Data <?= $k['judul']; ?>">
                          <i class="fas fa-trash-alt"></i></button>
                      </form>
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