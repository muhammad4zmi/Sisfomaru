<?php include('../config/auto_load.php'); ?>
<?php include('../controller/siswa_datadiri_control.php'); ?>
<?php include('../template/header.php'); ?>
<style type="text/css">
    .foto-thumbnail {
    padding: .07rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    width: 3.3rem;
    height: auto;
}

.foto-preview {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    width: 12rem;
    height: 16rem;
}
    
    </style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        PPDB Online / <a href="dashboard.php" class="text-gray-700">Siswa</a> / <a href="data_diri.php"
            class="text-gray-700"> Data Diri </a> </p>

    <div class="row">
        <div class="col-md-12">
            <?php
            
            if (isset($data_diri)) {
                $id_datadiri = $data_diri['id'];
                // echo "<input type='hidden' name='id_data$id_datadiri' value='$id_datadiri'>";
                $_SESSION['id_dd'] = $id_datadiri;
            } else {
                // echo "insert nilai";
            }

            // if (isset($_SESSION['datadiri_sukses']) && $_SESSION['datadiri_sukses'] <> '') {
            //     echo '<div id="datadiri_sukses"></div>';
                
                if (isset($_SESSION['datadiri_sukses']) && $_SESSION['datadiri_sukses'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 12px;">'. $_SESSION['datadiri_sukses'] .'
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
                  }      

            

            ?>
        </div>
    </div>


    <form class="user mb-4" method="POST" action="<?= $base_url ?>/siswa/data_diri.php" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="row">
                <!-- Data Nilai -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">DATA DIRI SISWA</h6>
                        </div>
                        <div class="card-body">
                            <h6 class="text-left mt-1 mb-3 text-danger" style="font-size: 12px;">* Masukkan data diri
                                Anda dengan benar dan data diri ini dapat diedit setelah anda simpan.
                            </h6>
                            <form class="user" method="POST" action="<?= $base_url ?>/siswa/data_diri.php">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <!-- <div class="form-group" >
                                                <label for="nisn" style="font-size: 12px;">NISN</label>
                                                <input type="number" name="nisn" class="form-control form-control" style="font-size: 12px;"
                                                    required="" id="nisn" placeholder="NISN"
                                                    value="<?= $data_pendaftar['nisn'] ?>"
                                                    oninvalid="this.setCustomValidity('Masukkan NISN Anda!')"
                                                    oninput="setCustomValidity('')">
                                            </div> -->
                                            <div class="form-group">
                                                <label for="nama" style="font-size: 12px;">Nama Lengkap *</label>
                                                <input type="text" name="nama" class="form-control form-control"
                                                    style="font-size: 12px;" required="" id="nama"
                                                    placeholder="Nama Anda" value="<?= $data_pendaftar['nama'] ?>"
                                                    oninvalid="this.setCustomValidity('Masukkan Nama Anda!')"
                                                    oninput="setCustomValidity('')" readonly>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="tempat_lahir" style="font-size: 12px;">Tempat Lahir
                                                        *</label>
                                                    <input type="text" name="tempat_lahir"
                                                        class="form-control form-control" required="" id="tempt_lahir"
                                                        style="font-size: 12px;" placeholder="Tempat Lahir Anda"
                                                        value="<?php if (isset($data_diri['tmpt_lahir'])) {
                                                                                                                                                                                                                                echo $data_diri['tmpt_lahir'];
                                                                                                                                                                                                                            } ?>"
                                                        oninvalid="this.setCustomValidity('Masukkan tempat lahir Anda!')"
                                                        oninput="setCustomValidity('')">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="tgl_lahir" style="font-size: 12px;">Tanggal Lahir
                                                        *</label>
                                                    <?php
                                                    $tgl_lahir = "";
                                                    if (isset($data_diri['tgl_lahir'])) {
                                                        if ($data_diri['tgl_lahir'] == NULL) {
                                                            $tgl_lahir = date("d-m-Y", strtotime(00 - 00 - 000));
                                                        } else {
                                                            $tgl_lahir = $data_diri['tgl_lahir'];
                                                        }
                                                    }
                                                    ?>

                                                    <input type="text" name="tgl_lahir" class="form-control"
                                                        data-provide="datepicker" required="" id="tgl_lahir"
                                                        style="font-size: 12px;"
                                                        value="<?= date("d-m-Y", strtotime($tgl_lahir)); ?>"
                                                        oninvalid="this.setCustomValidity('Masukkan tanggal lahir Anda!')"
                                                        oninput="setCustomValidity('')">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="jenis_kelamin" style="font-size: 12px;">Jenis Kelamin
                                                        *</label>
                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                                        required="" style="font-size: 12px;"
                                                        oninvalid="this.setCustomValidity('Masukkan jenis kelamin Anda!')"
                                                        oninput="setCustomValidity('')">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki" <?php
                                                                                    if (isset($data_diri['jenis_kelamin'])) {
                                                                                        if ($data_diri['jenis_kelamin'] == 'Laki-laki') {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>
                                                            Laki-laki </option>
                                                        <option value="Perempuan" <?php
                                                                                    if (isset($data_diri['jenis_kelamin'])) {
                                                                                        if ($data_diri['jenis_kelamin'] == 'Perempuan') {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>
                                                            Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="agama" style="font-size: 12px;">Agama *</label>
                                                    <select name="agama" id="agama" class="form-control" required=""
                                                        oninvalid="this.setCustomValidity('Masukkan agama Anda!')"
                                                        style="font-size: 12px;" oninput="setCustomValidity('')">
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam" <?php
                                                                                if (isset($data_diri['agama'])) {
                                                                                    if ($data_diri['agama'] == 'Islam') {
                                                                                        echo "selected";
                                                                                    }
                                                                                }
                                                                                ?>>
                                                            Islam </option>
                                                        <option value="Kristen" <?php
                                                                                if (isset($data_diri['agama'])) {
                                                                                    if ($data_diri['agama'] == 'Kristen') {
                                                                                        echo "selected";
                                                                                    }
                                                                                }
                                                                                ?>>
                                                            Kristen</option>
                                                        <option value="Katolik" <?php
                                                                                if (isset($data_diri['agama'])) {
                                                                                    if ($data_diri['agama'] == 'Katolik') {
                                                                                        echo "selected";
                                                                                    }
                                                                                }
                                                                                ?>>
                                                            Katolik</option>
                                                        <option value="Hindu" <?php
                                                                                if (isset($data_diri['agama'])) {
                                                                                    if ($data_diri['agama'] == 'Hindu') {
                                                                                        echo "selected";
                                                                                    }
                                                                                }
                                                                                ?>>
                                                            Hindu</option>
                                                        <option value="Budha" <?php
                                                                                if (isset($data_diri['agama'])) {
                                                                                    if ($data_diri['agama'] == 'Budha') {
                                                                                        echo "selected";
                                                                                    }
                                                                                }
                                                                                ?>>
                                                            Budha</option>
                                                        <option value="Konghucu" <?php
                                                                                    if (isset($data_diri['agama'])) {
                                                                                        if ($data_diri['agama'] == 'Konghucu') {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>
                                                            Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="status" style="font-size: 12px;">Status Dalam Keluarga
                                                        *</label>
                                                    <select name="status" id="status" class="form-control" required=""
                                                        style="font-size: 12px;"
                                                        oninvalid="this.setCustomValidity('Masukkan Status Anda dalam Keluarga!')"
                                                        oninput="setCustomValidity('')">
                                                        <option value="">Pilih Status Anda Dalam Keluarga</option>
                                                        <option value="Anak Kandung" <?php
                                                                                        if (isset($data_diri['status_keluarga'])) {
                                                                                            if ($data_diri['status_keluarga'] == 'Anak Kandung') {
                                                                                                echo "selected";
                                                                                            }
                                                                                        }
                                                                                        ?>>
                                                            Anak Kandung </option>
                                                        <option value="Anak Angkat" <?php
                                                                                    if (isset($data_diri['status_keluarga'])) {
                                                                                        if ($data_diri['status_keluarga'] == 'Anak Angkat') {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>
                                                            Anak Angkat </option>
                                                        <option value="Anak Tiri" <?php
                                                                                    if (isset($data_diri['status_keluarga'])) {
                                                                                        if ($data_diri['status_keluarga'] == 'Anak Tiri') {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                    ?>>
                                                            Anak Tiri </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nisn" style="font-size: 12px;">Anak Ke- *</label>
                                                    <input type="number" name="anak" class="form-control form-control"
                                                        style="font-size: 12px;" required="" id="anak"
                                                        placeholder="Anak Ke-"
                                                        value="<?php if (isset($data_diri['anak_ke'])) {
                                                                                                                                                                                                        echo $data_diri['anak_ke'];
                                                                                                                                                                                                    } ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" style="font-size: 12px;">Alamat *</label>
                                                <textarea name="alamat" id="alamat" class="form-control" required=""
                                                    style="font-size: 12px;"
                                                    oninvalid="this.setCustomValidity('Masukkan alamat Anda!')"
                                                    oninput="setCustomValidity('')"><?php if (isset($data_diri['alamat'])) {
                                                                                                                                                                                                                                                echo $data_diri['alamat'];
                                                                                                                                                                                                                                            } ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" style="font-size: 12px;">Email *</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    style="font-size: 12px;" placeholder="Email"
                                                    value="<?= $data_pendaftar['email'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon" style="font-size: 12px;">Nomor HP / WhatsApp
                                                    *</label>
                                                <input type="text" name="telepon" id="telepon" class="form-control"
                                                    style="font-size: 12px;" required=""
                                                    placeholder="Nomor HP / WhatsApp"
                                                    value="<?php if (isset($data_diri['no_hp'])) {
                                                                                                                                                                                                        echo $data_diri['no_hp'];
                                                                                                                                                                                                    } ?>"
                                                    oninvalid="this.setCustomValidity('Masukkan nomor HP Anda!')"
                                                    oninput="setCustomValidity('')">
                                            </div>
                                            <div class="form-group">
                                                <label for="asal" style="font-size: 12px;">Asal Madrasah / Sekolah
                                                    *</label>
                                                <input type="text" name="asal" id="asal" class="form-control"
                                                    style="font-size: 12px;" required=""
                                                    placeholder="Asal Madrasah / Sekolah"
                                                    value="<?php if (isset($data_diri['asal_madrasah'])) {
                                                                                                                                                                                                    echo $data_diri['asal_madrasah'];
                                                                                                                                                                                                } ?>"
                                                    oninvalid="this.setCustomValidity('Masukkan Asal Madrasah / Sekolah Anda!')"
                                                    oninput="setCustomValidity('')">
                                            </div>
                                            <div class="col-md-6">
                    <div class="form-group">
                    <label for="inputEmail">Photo Calon Siswa <span class="required">*</span>
                      </label>
                      
                       
                    <input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" required="required">
                  <div id="imagePreview"><img class="foto-preview" src="../assets/img/default.png"></div>
                  <div class="invalid-feedback">Pas Fhoto Tidak Boleh Kosong dan Tidak boleh lebih dari 1 MB</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-right">
                                        <button type="submit" name="btn_simpan" value="simpan_data"
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

<script>
const alert = document.getElementById('datadiri_sukses');
alert = function() {
    swal({
        icon: "success",
    });
}
</script>
<script type="text/javascript">
function validasiFile() {
            var fileInput         = document.getElementById('foto');
            var filePath          = fileInput.value;
            var fileSize          = $('#foto')[0].files[0].size;
            // tentukan extension yang diperbolehkan
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            // Jika tipe file yang diupload tidak sesuai dengan allowedExtensions, tampilkan pesan :
            if (!allowedExtensions.exec(filePath)) {
                alert('Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png');
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
                return false;
            } 
            // jika ukuran file yang diupload lebih dari sama dengan 1 Mb
            else if (fileSize >= 1000000) {
                alert('Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.');
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
                return false;
            }
            // selain itu
            else {
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="'+e.target.result+'"/>';
                };
            reader.readAsDataURL(fileInput.files[0]);
            }
        }}
</script>

<!-- /.container-fluid -->
<?php include('../template/footer.php'); ?>