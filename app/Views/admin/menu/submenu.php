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
    <!-- Data Nilai -->
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">SUBMENU MANAGEMENT</h6>
            </div>

            <div class="card-body">
                <?php if ($validation->getErrors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>


                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>

                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <div class="col-md-12 mb-3" align="right">
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addsubModal">
                            <i class="fas fa-plus"></i>
                            Tambah</a>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center" style="font-size: 16px;">
                                <!-- <th width="1%"><input type="checkbox" id="pilih_semua"></th> -->
                                <th width="2%">#</th>
                                <!-- <th width="3%">NISN</th> -->
                                <th width="10%">Title</th>
                                <th width="5%">Menu</th>
                                <th width="10%">Url</th>
                                <th width="15%">Icon</th>
                                <th width="5%">Active</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($submenu as $sm) : ?>
                                <tr style="font-size: 12px;">
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $sm['title']; ?></td>
                                    <td><?= $sm['menu']; ?></td>
                                    <td><?= $sm['url']; ?></td>
                                    <td><?= $sm['icon']; ?></td>
                                    <td align="center">
                                        <?php if ($sm['is_active'] == 1) : ?>
                                            <span class="badge badge-pill badge-primary"><i class="fas fa-unlock-alt"></i> Actived</span>
                                        <?php else : ?>
                                            <span class="badge badge-pill badge-danger"><i class="fas fa-lock"></i> Not Actived</span>
                                        <?php endif; ?>

                                    </td>


                                    <td align="center">

                                        <a href="" class="btn btn-warning btn-sm m-1 btn-circle" data-placement="top" title="" data-toggle="tooltip" data-original-title="Ubah Submenu <?= $sm['title']; ?>">
                                            <i class="fas fa-edit"></i></a>
                                        <form action="submenu/<?= $sm['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm m-1 btn-danger btn-circle" onclick="return confirm('Apakah anda yakin data ini di hapus?');" data-toggle="tooltip" data-original-title="Hapus Data <?= $sm['title']; ?>">
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


<div class="modal fade" id="addsubModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Submenu</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/menu/addsubmenu" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id=" menu" name="title" autofocus value="" style="font-size: 12px;" placeholder="Submenu Title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" style="font-size: 12px;">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $sm) : ?>
                                <option value="<?= $sm['id']; ?>"><?= $sm['menu']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('url')) ? 'is-invalid' : ''; ?>" id=" menu" name="url" autofocus value="" style="font-size: 12px;" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('icon')) ? 'is-invalid' : ''; ?>" id=" menu" name="icon" autofocus value="" style="font-size: 12px;" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="defaultCheck1">
                                Active?
                            </label>
                        </div>
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