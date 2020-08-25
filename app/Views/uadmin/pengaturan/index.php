<?= $this->extend('admin/layout_info/template'); ?>

<?= $this->section('admin/layout_info/content'); ?>
<div class="container">


    <!-- Page Heading -->
    <!-- <p class="h6 mb-3 text-gray-700 text-left" style="font-size: 12px;">
    <i class="fas fa-home"></i> 
    PPDB Online / <a href="dashboard.php" class="text-gray-700" >Admin</a> / <a href="" class="text-gray-700" > Setting Aplikasi </a> </p> -->
    <!-- <hr> -->
    <!-- <form class="user mb-12" method="POST" action="" enctype="multipart/form-data">
        <div class="col-md-12"> -->
    <div class="row">
        <!-- Data Nilai -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">SETTING APLIKASI</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($pengaturan as $k) : ?>
                        <form class="user" method="POST" action=""">
                                <div class=" col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_aplikasi" style="font-size: 12px;">Nama Aplikasi</label>
                                        <input type="text" name="nama_aplikasi" class="form-control form-control" id="nama_aplikasi" placeholder="Nama Aplikasi" style="font-size: 12px;" value="<?= $k['nama_aplikasi']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_madrasah" style="font-size: 12px;">Nama Madrasah</label>
                                        <input type="text" name="nama_madrasah" class="form-control form-control" id="nama_madrasah" placeholder="Nama Madrasah" style="font-size: 12px;" value="<?= $k['nama_pt']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun" style="font-size: 12px;">Tahun Akademik</label>
                                        <input type="text" name="tahun" class="form-control form-control" id="tahun" placeholder="Tahun Pelajaran" style="font-size: 12px;" value="<?= $k['tahun_akademik']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun" style="font-size: 12px;">Alamatk</label>
                                        <textarea name="alamat" id="alamat" class="form-control" required="" style="font-size: 12px;" oninvalid="this.setCustomValidity('Masukkan alamat Anda!')" oninput="setCustomValidity('')"><?= $k['alamat']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="col-md-12">
                    <div class="text-left">
                        <button type="submit" name="btn_simpan" value="simpan_datasetting" class="btn btn-sm btn-success">
                            <i class="fas fa-save"></i>
                            Simpan </button>
                        <a href="dashboard.php" class="btn btn-sm btn-danger" name="kembali">
                            <i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>
                </form>
            <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>
<!-- </div> -->

<!-- </form> -->
<!-- </div>
  </div> -->


<?= $this->endSection(); ?>