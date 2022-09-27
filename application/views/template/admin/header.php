<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/login/images/icons/favicon.ico" />


    <!-- Bootstrap core JavaScript-->
    <link href="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js" rel="stylesheet" />
    <link href="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js" rel="stylesheet" />

    <!-- Core plugin JavaScript-->
    <link href="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js" rel="stylesheet" />

    <title><?= $title ?? ""; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- css datatable -->
    <link href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- <link href="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js" rel="stylesheet" />
    <link href="<?= base_url('assets') ?>/vendor/jquery/jquery.slim.min.js" rel="stylesheet" />
    <link href="<?= base_url('assets') ?>/vendor/jquery/jquery.slim.js" rel="stylesheet" /> -->

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<?php
if (empty($this->session->userdata('is_login'))) {
    redirect('auth');
}
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-video"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DISPUS Tour</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Manajemen Potensi
            </div>

            <!-- Nav Item - Potensi -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('potensi'); ?>">
                    <i class="fas fa-place-of-worship"></i>
                    <span>Potensi</span>
                </a>
            </li>

            <!-- Nav Item - Kategori -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kategori'); ?>">
                    <i class="fas fa-th-list"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <!-- Nav Item - Wilayah -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('wilayah'); ?>">
                    <i class="fas fa-map-pin"></i>
                    <span>Wilayah</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Manajemen Pengguna
            </div>

            <!-- Nav Item - Admin -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="far fa-user"></i>
                    <span>Admin</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Galeri -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('galeri'); ?>">
                    <i class="far fa-images"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <!-- Nav Item - Berita -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('berita'); ?>">
                    <i class="fas fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>

            <!-- Nav Item - Kritik Saran -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kritiksaran'); ?>">
                    <i class="far fa-comments"></i>
                    <span>Kritik dan Saran</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?= $this->session->userdata('nama_admin'); ?></b>
                                    <br>
                                    <b>Admin</b>
                                </span>
                                <img class="img-profile rounded-circle" src="<?= base_url() . '/assets/img/admin/' . $this->session->userdata('foto_admin'); ?>">
                                <!-- <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/admin/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin logout?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Klik "Logout" di bawah ini jika Anda yakin ingin logout.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                                <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>