<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title><?= $title; ?></title>


    <!-- Gambar title -->
    <link rel="icon" type="image/png" href="../admin/assets/img/logo.png">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../admin/assets/js/style/css/main.css">
    <!-- Font-icon css-->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom fonts for this template-->
    <link href="../admin/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../admin/assets/css/style.css" rel="stylesheet">
    <link href="../admin/assets/css/style2.css" rel="stylesheet">
    <link href="../admin/assets/css/alertify.min.css" rel="stylesheet">

    <!-- css datepicker -->
    <link href="../admin/assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="../admin/assets/vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">


</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background: #2b3643">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon">
                    <i class="fas">
                        <img src="../admin/assets/img/logo.png" alt="" class="logo-side">
                    </i>
                </div>
                <div class="sidebar-brand-text mx-2">STMIK SZ</div>
            </a>

            <!-- Heading -->
            <div class="sidebar-heading">

            </div>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dasboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="pendaftaran">
                    <i class="fas fa-list"></i>
                    <span>Data pendaftar</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/informasi">
                    <i class="fas fa-list"></i>
                    <span>Informasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/pengaturan">
                    <i class="fas fa-cog"></i>
                    <span>Setting Aplikasi</span></a>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt ml-1"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->


                <?= $this->include('admin/layout_info/navbar.php'); ?>
                <?= $this->renderSection('admin/layout_info/content'); ?>
            </div>
        </div>


        <!-- End of Main Content -->
        <div class="row">
            <div class="col-md-12">
                <!-- Footer -->
                <footer class="sticky-footer shadow bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; 2021 STMIK Syaikh Zainuddin NW Anjani, Lombok Timur-NTB</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-double-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 12px;">Apakah Anda ingin logout?
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <!-- <div class="modal-body">Apakah Anda keluar dari aplikasi?</div> -->
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                            <i class="fas fa-arrow-left"></i>
                            Batal</button>
                        <a class="btn btn-sm btn-danger" href="">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                            Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../admin/assets/vendor/jquery/jquery.min.js"></script>
        <script src="../admin/assets/vendor/jquery/jquery.js"></script>
        <script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../admin/assets/vendor/bootstrap/js/bootstrap.js"></script>

        <!-- Essential javascripts for application to work-->
        <script src="../admin/assets/js/style/js/jquery-3.2.1.min.js"></script>
        <script src="../admin/assets/js/style/js/jquery-3.4.1.min.js"></script>
        <script src="../admin/assets/js/style/js/popper.min.js"></script>
        <script src="../admin/assets/js/style/js/bootstrap.min.js"></script>
        <script src="../admin/assets/js/style/js/main.js"></script>

        <!-- The javascript plugin to display page loading on top-->
        <script src="assets/js/style/js/plugins/pace.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../admin/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../admin/assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../admin/assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../admin/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../admin/assets/js/demo/datatables-demo.js"></script>
        <script src="../admin/assets/js/alertify.min.js"></script>

        <!-- js datepicker -->
        <script src="../admin/assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>

        <script src="../admin/assets/js/style/js/sweetalert2.all.min.js"></script>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <script type="text/javascript" src="../admin/assets/js/hapus.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>

</body>

</html>