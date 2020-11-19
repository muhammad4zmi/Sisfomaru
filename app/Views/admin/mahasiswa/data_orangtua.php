<?php include('../config/auto_load.php'); ?>
<?php include('../controller/siswa_data_ortu_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        PPDB Online / <a href="dashboard.php" class="text-gray-700">Siswa</a> / <a href="data_orangtua.php"
            class="text-gray-700"> Data Orang Tua </a> </p>
    <form class="user mb-4" method="POST" action="<?= $base_url ?>/siswa/data_orangtua.php"
        enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="row">
                <!-- Data Nilai -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">DATA ORANG TUA SISWA
                            </h6>
                        </div>
                        <div class="card-body">
                            <h6 class="text-left mt-1 mb-3 text-danger" style="font-size: 12px;">* Masukkan data orang
                                tua Anda dengan benar dan data orang tua ini dapat diedit setelah anda simpan.
                            </h6>

                            <?php
                            if (isset($data_ortu)) {
                                $id_dataortu = $data_ortu['id'];
                                // echo "<input type='hidden' name='id_dataortu' value='$id_dataortu'>";
                                $_SESSION['id_dot'] = $id_dataortu;
                            } else {
                                // echo "insert nilai";
                            }
                            if (isset($_SESSION['dataortu_sukses']) && $_SESSION['dataortu_sukses'] <> '') {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 12px;">'. $_SESSION['dataortu_sukses'] .'
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>';
                              }      
                            ?>

                            <form class="user" method="POST" action="<?= $base_url ?>/siswa/data_orangtua.php">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama" style="font-size: 12px;">Nama Ayah *</label>
                                                <input type="text" name="nama_ayah" class="form-control form-control"
                                                    required="" id="nama_ayah" placeholder="Nama Ayah"
                                                    style="font-size: 12px;"
                                                    value="<?php if (isset($data_ortu['nama_ayah'])) {
                                                                                                                                                                                                                echo $data_ortu['nama_ayah'];
                                                                                                                                                                                                            } ?>"
                                                    oninvalid="this.setCustomValidity('Masukkan Nama Ayah Anda!')"
                                                    oninput="setCustomValidity('')">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" style="font-size: 12px;">Alamat Ayah *</label>
                                                <textarea name="alamat_ayah" id="alamat_ayah" class="form-control"
                                                    required="" style="font-size: 12px;"
                                                    oninvalid="this.setCustomValidity('Masukkan alamat Ayah Anda!')"
                                                    oninput="setCustomValidity('')"><?php if (isset($data_ortu['alamat_ayah'])) {
                                                                                                                                                                                                                                                                echo $data_ortu['alamat_ayah'];
                                                                                                                                                                                                                                                            } ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon" style="font-size: 12px;">Nomor HP Ayah</label>
                                                <input type="text" name="telepon_ayah" id="telepon_ayah"
                                                    class="form-control" placeholder="Nomor HP / WhatsApp (Tidak Wajib)"
                                                    style="font-size: 12px;"
                                                    value="<?php if (isset($data_ortu['telepon_ayah'])) {
                                                                                                                                                                                                                    echo $data_ortu['telepon_ayah'];
                                                                                                                                                                                                                } ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama" style="font-size: 12px;">Nama Ibu *</label>
                                                <input type="text" name="nama_ibu" class="form-control form-control"
                                                    required="" id="nama_ibu" placeholder="Nama Ibu"
                                                    style="font-size: 12px;"
                                                    value="<?php if (isset($data_ortu['nama_ibu'])) {
                                                                                                                                                                                                            echo $data_ortu['nama_ibu'];
                                                                                                                                                                                                        } ?>"
                                                    oninvalid="this.setCustomValidity('Masukkan Nama Ibu Anda!')"
                                                    oninput="setCustomValidity('')">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" style="font-size: 12px;">Alamat Ibu *</label>
                                                <textarea name="alamat_ibu" id="alamat_ibu" class="form-control"
                                                    required="" style="font-size: 12px;"
                                                    oninvalid="this.setCustomValidity('Masukkan alamat Ibu Anda!')"
                                                    oninput="setCustomValidity('')"> <?php if (isset($data_ortu['alamat_ibu'])) {
                                                                                                                                                                                                                                                            echo $data_ortu['alamat_ibu'];
                                                                                                                                                                                                                                                        } ?>  </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon" style="font-size: 12px;">Nomor HP Ibu</label>
                                                <input type="text" name="telepon_ibu" id="telepon_ibu"
                                                    class="form-control" placeholder="Nomor HP / WhatsApp (Tidak Wajib)"
                                                    style="font-size: 12px;"
                                                    value="<?php if (isset($data_ortu['telepon_ibu'])) {
                                                                                                                                                                                                                echo $data_ortu['telepon_ibu'];
                                                                                                                                                                                                            } ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <button type="submit" name="btn_simpan" value="simpan_dataortu"
                                            class="btn btn-sm btn-success">
                                            <i class="fas fa-save"></i>
                                            Simpan </button>
                                        <a href="dashboard.php" class="btn btn-sm btn-danger" name="kembali">
                                            <i class="fas fa-arrow-left"></i>
                                            Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>

</div>
</div>

<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>