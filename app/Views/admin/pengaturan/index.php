<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <!-- Data Nilai -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">SETTING APLIKASI</h6>
                </div>

                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>

                        </div>
                    <?php endif; ?>
                    <?php foreach ($pengaturan as $k) : ?>
                        <form action="/pengaturan/update/<?= $k['id']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class=" col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="slug" value="<?= $k['slug']; ?>">
                                            <label for="nama_aplikasi" style="font-size: 12px;">Nama Aplikasi</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nama_aplikasi')) ? 'is-invalid' : ''; ?>" id="nama_aplikasi" name="nama_aplikasi" autofocus value="<?= (old('nama_aplikasi')) ? old('nama_aplikasi') : $k['nama_aplikasi']; ?>" style="font-size: 12px;">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_aplikasi'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_madrasah" style="font-size: 12px;">Nama Perguruan Tinggi</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('nama_pt')) ? 'is-invalid' : ''; ?>" id="nama_pt" name="nama_pt" autofocus value="<?= (old('nama_pt')) ? old('nama_pt') : $k['nama_pt']; ?>" style="font-size: 12px;">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_pt'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun" style="font-size: 12px;">Tahun Akademik</label>
                                                    <input type="text" name="tahun_akademik" class="form-control form-control" id="tahun" placeholder="Tahun Akademik" style="font-size: 12px;" value="<?= $k['tahun_akademik']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun" style="font-size: 12px;">Alamat</label>
                                                    <textarea name="alamat" id="alamat" class="form-control" required="" style="font-size: 12px;" oninvalid="this.setCustomValidity('Masukkan alamat Anda!')" oninput="setCustomValidity('')"><?= $k['alamat']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <a href="dashboard.php" class="btn btn-sm btn-danger" name="kembali">
                                                <i class="fas fa-arrow-left"></i>
                                                Kembali</a>
                                            <button type="submit" name="btn_simpan" value="simpan_datasetting" class="btn btn-sm btn-success">
                                                <i class="fas fa-save"></i>
                                                Ubah Data </button>

                                        </div>
                                    </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- </form> -->
<!-- </div>
  </div> -->


<?= $this->endSection(); ?>