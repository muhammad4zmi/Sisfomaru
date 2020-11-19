<?= $this->extend('templates/template'); ?>
<?= $this->section('content'); ?>
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
        <?php foreach ($pengaturan as $k) : ?>
            <?= $k['nama_aplikasi']; ?> / <a href="/camaba" class="text-gray-700">User</a> / <a href="dasboard" class="text-gray-700"> Data Diri </a> </p>
<?php endforeach; ?>

<div class="row">
    <div class="col-md-12">
        <?php
        $db = \Config\Database::connect();
        $userid = session()->get('email');

        $queryUser = $db->query("SELECT users.id, users.image, pendaftar.id, pendaftar.nama
                                    FROM users 
                                    JOIN pendaftar ON users.id=pendaftar.users_id 
                                WHERE users.email= '$userid'");
        $user = $queryUser->getRowArray();
        $id_pendaftar = $user['id'];

        $queryDiri = $db->query("SELECT * FROM pendaftar WHERE id='$id_pendaftar'");
        $data = $queryDiri->getRowArray();
        // dd($data);
        // die;


        // if (isset($data_diri)) {
        //     $id_datadiri = $data_diri['id'];
        //     // echo "<input type='hidden' name='id_data$id_datadiri' value='$id_datadiri'>";
        //     $_SESSION['id_dd'] = $id_datadiri;
        // } else {
        //     // echo "insert nilai";
        // }

        // // if (isset($_SESSION['datadiri_sukses']) && $_SESSION['datadiri_sukses'] <> '') {
        // //     echo '<div id="datadiri_sukses"></div>';

        // if (isset($_SESSION['datadiri_sukses']) && $_SESSION['datadiri_sukses'] <> '') {
        //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 12px;">' . $_SESSION['datadiri_sukses'] . '
        //               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //               </button>
        //             </div>';
        // }



        ?>
    </div>
</div>


<!-- <form class="user mb-4" method="POST" action="" enctype="multipart/form-data"> -->
<div class="col-md-12">
    <div class="row">
        <!-- Data Nilai -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">DATA DIRI CALON MAHASISWA</h6>
                </div>


                <?php if ($data['status_datadiri'] == 1) : ?>
                    <div class="card-body center">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>

                            </div>

                        <?php endif; ?>
                        <h6 class="text-center mt-1 mb-3 text-danger" style="font-size: 14px;">* Data Identitas Pribadi anda sudah diisi, jika ingin melakukan Update Data, Silahkan Klik Tombol Update Data.
                        </h6>
                        <div class="col-md-12">
                            <div class="text-center">

                                <a href="identitas/edit/<?= $data['id']; ?>" class="btn btn-primary btn-center" data-placement="top" title="" data-toggle="tooltip" data-original-title="Update Data <?= $data['nama']; ?>"><i class="fas fa-user-edit"></i> Update Data</a>

                            </div>
                        </div>

                    </div>
                <?php else : ?>
                    <div class="card-body">

                        <h6 class="text-left mt-1 mb-3 text-danger" style="font-size: 12px;">* Masukkan data diri
                            Anda dengan benar dan data diri ini dapat diedit setelah anda simpan.
                        </h6>

                        <form class="user" method="POST" action="/identitas/add">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="nama" style="font-size: 12px;">Nama Lengkap *</label>
                                            <input type="hidden" name="id_pendaftar" value="<?= $id_pendaftar; ?>">
                                            <input type="text" name="nama" class="form-control form-control" style="font-size: 12px;" id="nama" placeholder="Nama Anda" value="<?= $user['nama']; ?>" readonly>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <label for="tempat_lahir" style="font-size: 12px;">NIK
                                                    *</label>
                                                <input type="text" name="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" autofocus value="<?= old('nik'); ?>" style="font-size: 12px;" placeholder="Masukkan NIK" value="" maxlength="16" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nik'); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tgl_lahir" style="font-size: 12px;">NISN
                                                    *</label>
                                                <input type="text" name="nisn" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="nisn" autofocus value="<?= old('nisn'); ?>" style="font-size: 12px;" placeholder="Masukkan NISN" value="" maxlength="16" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nisn'); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <label for="tempat_lahir" style="font-size: 12px;">Tempat Lahir
                                                    *</label>
                                                <input type="text" name="tempat_lahir" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" autofocus value="<?= old('tempat_lahir'); ?>" style="font-size: 12px;">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tempat_lahir'); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tgl_lahir" style="font-size: 12px;">Tanggal Lahir
                                                    *</label>
                                                <input type="text" name="tgl_lahir" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('tgl_lahir'); ?>" data-provide="datepicker" id="tgl_lahir" style="font-size: 12px;" value="" placeholder="Masukkan Tanggal Lahir">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tgl_lahir'); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="jenis_kelamin" style="font-size: 12px;">Jenis Kelamin
                                                    *</label>
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" autofocus value="<?= old('jenis_kelamin'); ?>" style="font-size: 12px;">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki"> Laki-laki </option>
                                                    <option value="Perempuan"> Perempuan</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jenis_kelamin'); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="agama" style="font-size: 12px;">Agama *</label>
                                                <select name="agama" id="agama" class="form-control" style="font-size: 12px;" oninput="setCustomValidity('')">
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam </option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="status" style="font-size: 12px;">Status Dalam Keluarga
                                                    *</label>
                                                <select name="status" id="status" class="form-control" style="font-size: 12px;">
                                                    <option value="">Pilih Status Anda Dalam Keluarga</option>
                                                    <option value="Anak Kandung">
                                                        Anak Kandung </option>
                                                    <option value="Anak Angkat">
                                                        Anak Angkat </option>
                                                    <option value="Anak Tiri">
                                                        Anak Tiri </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nisn" style="font-size: 12px;">Anak Ke- *</label>
                                                <input type="number" name="anak" class="form-control form-control" style="font-size: 12px;" id="anak" placeholder="Anak Ke-" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" style="font-size: 12px;">Alamat *</label>
                                            <textarea name="alamat" id="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" autofocus value="<?= old('alamat'); ?>" style="font-size: 12px;"></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat'); ?>

                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                                <label for="email" style="font-size: 12px;">Email *</label>
                                                <input type="email" name="email" id="email" class="form-control" style="font-size: 12px;" placeholder="Email" value="">
                                            </div> -->
                                        <div class="form-group">
                                            <label for="telepon" style="font-size: 12px;">Nomor HP / WhatsApp
                                                *</label>
                                            <input type="text" name="telepon" id="telepon" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" autofocus value="<?= old('telepon'); ?>" style="font-size: 12px;" placeholder="Nomor HP / WhatsApp" value="" maxlength="14" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('telepon'); ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="asal" style="font-size: 12px;">Asal Madrasah / Sekolah
                                                *</label>
                                            <input type="text" name="asal" id="asal" class="form-control <?= ($validation->hasError('asal')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" autofocus value="<?= old('asal'); ?>" style="font-size: 12px;" placeholder="Asal Madrasah / Sekolah" value="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('asal'); ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" style="font-size: 12px;">Alamat Sekolah</label>
                                            <textarea name="alamat_sekolah" id="alamat" class="form-control <?= ($validation->hasError('alamat_sekolah')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" autofocus value="<?= old('alamat_sekolah'); ?>" style="font-size: 12px;"></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat_sekolah'); ?>

                                            </div>
                                        </div>
                                        <div class="form-group">


                                            <label for="tempat_lahir" style="font-size: 12px;">Punya KIP/PKH/KIS?
                                                *</label>
                                            <select name="kip" id="kps" class="form-control <?= ($validation->hasError('kip')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('kip'); ?>" style="font-size: 12px;">
                                                <option value="">Pilih:</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>

                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kip'); ?>

                                            </div>

                                        </div>
                                        <div class="form-group" id="seri">

                                            <label for="tgl_lahir" style="font-size: 12px;">KODE KIP/PKH/KIS
                                                *</label>
                                            <input type="text" name="seri" class="form-control" id="input-text" value="0" placeholder="Seri KPS" style="font-size: 12px;">
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="status" style="font-size: 12px;">Program Studi Pilihan 1
                                                    *</label>

                                                <select name="prodi1" id="status" class="form-control <?= ($validation->hasError('prodi1')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" autofocus value="<?= old('prodi1'); ?>" style="font-size: 12px;">

                                                    <option value="">Pilih Program Studi</option>
                                                    <?php foreach ($prodi as $p) : ?>
                                                        <option value="<?= $p['kode_prodi']; ?>">
                                                            <?= $p['prodi']; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('prodi1'); ?>

                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <label for="status" style="font-size: 12px;">Program Studi Pilihan 2
                                                    *</label>
                                                <select name="prodi2" id="status" class="form-control <?= ($validation->hasError('prodi2')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" autofocus value="<?= old('prodi2'); ?>" style="font-size: 12px;">

                                                    <option value="">Pilih Program Studi</option>
                                                    <?php foreach ($prodi as $p) : ?>
                                                        <option value="<?= $p['kode_prodi']; ?>">
                                                            <?= $p['prodi']; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('prodi2'); ?>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <a href="/user/dasboard" class="btn btn-sm btn-danger" name="kembali">
                                                <i class="fas fa-arrow-left"></i>
                                                Kembali</a>
                                            <button type="submit" name="btn_simpan" value="simpan_data" class="btn btn-sm btn-success">
                                                <i class="fas fa-save"></i>
                                                Simpan </button>

                                        </div>
                                    </div>
                        </form>
                    </div>
                <?php endif; ?>

            </div>


        </div>
    </div>
</div>

<!-- </form> -->





<script>
    // Validasi karakter yang boleh diinpukan pada form
    function getkey(e) {
        if (window.event)
            return window.event.keyCode;
        else if (e)
            return e.which;
        else
            return null;
    }

    function goodchars(e, goods, field) {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;

        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();

        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
            return true;

        if (key == 13) {
            var i;
            for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                    break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
        };
        // else return false
        return false;
    }
</script>
<!-- <script type="text/javascript">
    function validasiFile() {
        var fileInput = document.getElementById('foto');
        var filePath = fileInput.value;
        var fileSize = $('#foto')[0].files[0].size;
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
                    document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="' + e.target.result + '"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }
</script> -->


<!-- /.container-fluid -->
<?= $this->endSection(); ?>