<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <!-- Data Nilai -->
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">MENU MANAGEMENT</h6>
                </div>

                <div class="card-body">
                    <?= $validation->getError('menu'); ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>

                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <div class="col-md-12 mb-3" align="right">
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                                <i class="fas fa-plus"></i>
                                Tambah</a>
                        </div>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center" style="font-size: 16px;">
                                    <!-- <th width="1%"><input type="checkbox" id="pilih_semua"></th> -->
                                    <th width="2%">#</th>
                                    <!-- <th width="3%">NISN</th> -->
                                    <th width="5%">Menu</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr style="font-size: 13px;">
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $m['menu']; ?></td>

                                        <td align="center">

                                            <a href="" class="btn btn-warning btn-sm m-1 btn-circle" data-placement="top" title="" data-toggle="tooltip" data-original-title="Ubah Menu <?= $m['menu']; ?>">
                                                <i class="fas fa-edit"></i></a>
                                            <form action="menu/<?= $m['id']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm m-1 btn-danger btn-circle" onclick="return confirm('Apakah anda yakin data ini di hapus?');" data-toggle="tooltip" data-original-title="Hapus Data <?= $m['menu']; ?>">
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


    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/menu/addmenu" method="POST">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <input type="text" class="form-control <?= ($validation->hasError('menu')) ? 'is-invalid' : ''; ?>" id=" menu" name="menu" autofocus value="" style="font-size: 12px;">
                        <div class="invalid-feedback">


                        </div>
                    </div>
                    <!-- <div class="modal-body">Apakah Anda keluar dari aplikasi?</div> -->
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                            <i class="fas fa-arrow-left"></i>
                            Batal</button>
                        <button type="submit" value="simpan_datasetting" class="btn btn-sm btn-success">
                            <i class="fas fa-save"></i>
                            Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>

    <!-- Logout Modal-->