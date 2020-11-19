<?php include('../config/auto_load.php'); ?>
<?php include('../controller/siswa_editprofil_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 text-left">Edit Profil</h1>

  <div class="row">
        <div class="col-md-12">
            <?php if(isset($_SESSION['pesan_nilai'])) { ?>

                <div class="alert alert-success">
                    <?= $_SESSION['pesan_nilai'] ?>
                </div>

            <?php } ?>
        </div>



  <form class="user mb-4" method="POST" action="<?= $base_url ?>/siswa/editprofile.php" enctype="multipart/form-data">
  <div class="row">
    <!-- Edit Data Profile -->
    <div class="col-md-8">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control form-control" id="nama" placeholder="Nama Anda" value="<?= $data_pendaftar['nama'] ?>">
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control form-control" id="tempat_lahir" placeholder="Tempat Lahir Anda"
                    value="<?= $data_pendaftar['tmpt_lahir'] ?>">
                </div>
                <div class="col-md-6">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" name="tanggal_lahir" class="form-control" data-provide="datepicker" id="tanggal_lahir" placeholder="Tanggal Lahir Anda"
                    value="<?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'] ));?>">
                    <!-- <label for="tanggal_lahir">Tanggal Lahir</label>
                    <div class="input-group date" data-provide="datepicker" date-format="YY-mm-dd">
                        <input type="text" class="form-control" value="<?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])) ;?>">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="form-group row">
                    <div class="col-md-6">
                        <label>Jenis Kelamin</label>

                        <?php
                            $laki = "";
                            $perempuan = "";
                            if ($data_pendaftar['jenis_kelamin'] == 'L') {
                                $laki = "checked";
                            } else {
                                $perempuan = "checked";
                            }
                        ?>

                        <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="L" class="form-check-input" id="laki" <?= $laki ?>>
                            <label for="laki" class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="P" class="form-check-input" id="perempuan"  <?= $perempuan ?>>
                            <label for="perempuan" class="form-check-label">Perempuan</label>
                        </div>
                        </div>
                    <div class="col-md-6">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                        <option value="">Pilih Agama</option>
                        <option value="islam" <?php if($data_pendaftar['agama'] == 'islam') { echo "selected"; } ?> >Islam </option>
                        <option value="kristen" <?php if($data_pendaftar['agama'] == 'kristen') { echo "selected"; } ?> >Kristen</option>
                        <option value="katolik" <?php if($data_pendaftar['agama'] == 'katolik') { echo "selected"; } ?> >Katolik</option>
                        <option value="hindu" <?php if($data_pendaftar['agama'] == 'hindu') { echo "selected"; } ?> >Hindu</option>
                        <option value="budha" <?php if($data_pendaftar['agama'] == 'budha') { echo "selected"; } ?> >Budha</option>
                        <option value="konghucu" <?php if($data_pendaftar['agama'] == 'konghucu') { echo "selected"; } ?> >Konghucu</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"><?= $data_pendaftar['alamat'] ?></textarea>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value=" <?= $data_pendaftar['email'] ?>">
                </div>
                <div class="col-md-6">
                        <label for="telepon">Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?= $data_pendaftar['telepon'] ?>"></input>
                </div>
            </div>
            <!-- <div class="form-group row">
                <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-md-6">
                        <label for="ulangi_password">Ulangi Password</label>
                        <input type="password" name="ulangi_password" id="ulangi_password" class="form-control" placeholder="Ulangi Password">
                </div>
            </div> -->

    </div>
    <!-- Edit Photo  -->
    <?php
        if($data_pendaftar['foto'] != NULL && isset($data_pendaftar['foto'])) {
            $foto = '../uploads/' . $data_pendaftar['foto'];
        } else {
            $foto = '../assets/img/avatar.png';
        }
    ?>
    <div class="col-md-4 mb-4">
        <img src="<?= $foto ?>" alt="logo profil" class="img-fluid">
        <input type="file" name="gambar" class="form-control mt-2">
    </div>
    <div class="col-md-12">
        <button type="submit" name="btn_simpan" value="simpan_profil" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Simpan</button>
        <a href="dashboard.php" class="btn btn-danger" name="kembali">
        <i class="fas fa-arrow-left"></i>
        Kembali</a>
    </div>
    </div>
</form>

</div>
</div>

<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>