<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 2</title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url('assets/css/font-face.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/font-awesome-4.7/css/font-awesome.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/font-awesome-5/css/fontawesome-all.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/mdi-font/css/material-design-iconic-font.min.css') ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url('assets/vendor/bootstrap-4.1/bootstrap.min.css') ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url('assets/vendor/animsition/animsition.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/select2/select2.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="<?= base_url('assets/img/logo1.png'); ?>" alt="Fidelya" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?= base_url('assets/img/profile/default.png'); ?>" alt="User" />
                    </div>
                    <h4 class="name">M.Ramadhan Fikri</h4>
                    <a href="#">Keluar</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="#">
                                <i class="fas fa-user"></i>Profile</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Pengaduan
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="<?= base_url('assets/img/logo1.png'); ?>" alt="Fidelya" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Akun Saya</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-run"></i>Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="<?= base_url('assets/img/profile/default.png'); ?>" alt="User" />
                        </div>
                        <h4 class="name">M.Ramadhan Fikri</h4>
                        <a href="#">Keluar</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="#">
                                    <i class="fas fa-user"></i>Profile</a>
                            </li>
                            <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Pengaduan
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                </li>
                            </ul>
                        </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Pengaduan</li>
                                        </ul>
                                    </div>
                                    <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                                        <i class="zmdi zmdi-plus"></i>Tambah Pengaduan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">

            </section>
            <!-- END STATISTIC-->

            <!-- Content -->
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pengaduan</h5>
                                    <div class="table-responsive">
                                        <?= $this->session->flashdata('message'); ?>
                                        <table class="table table-bordered" id="tabelPengaduan" width="100%" cellspacing="0">
                                            <thead style="font-weight: bold;">
                                                <tr class="text-center">
                                                    <th>ID</th>
                                                    <th>Judul Laporan</th>
                                                    <th>Isi Laporan</th>
                                                    <th>Tanggal Kejadian</th>
                                                    <th>Foto</th>
                                                    <th>Tanggal Pengaduan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($pengaduan as $p) : ?>
                                                    <tr>
                                                        <td><?= $p->id_pengaduan ?></td>
                                                        <td><?= $p->judul_laporan ?></td>
                                                        <td><?= $p->isi_laporan ?></td>
                                                        <td><?= $p->tgl_kejadian ?></td>
                                                        <td><img src="<?= base_url('assets/img/pengaduan/') . $p->image ?>"' width=' 100' height='100'></td>
                                                        <td><?= date('d F Y', $p->tgl_pengaduan) ?></td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubahPengaduan">
                                                                <i class="fas fa-edit"></i>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="ubahPengaduan" tabindex="-1" aria-labelledby="judulUbah" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="judulUbah">Ubah Pengaduan</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body ">
                                                                            <form method="POST" action="<?= base_url('masyarakat/update') ?>">
                                                                                <div class="form-group">
                                                                                    <label for="exampleFormControlInput1">Judul Laporan</label>
                                                                                    <input type="text" class="form-control" name="judul_laporan" id="exampleFormControlInput1">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleFormControlTextarea1">Isi Laporan</label>
                                                                                    <textarea class="form-control" name="isi_laporan" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleFormControlFile1">Tanggal Kejadian</label>
                                                                                    <input type="date" name="tgl_kejadian" class="form-control" required="true">
                                                                                    <p class="text-danger" id="err_tgl_kejadian"></p>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleFormControlFile1">Masukkan Gambar</label>
                                                                                    <input type="file" class="form-control-file" name="image" id="image">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <form method="POST" action="<?= base_url('masyarakat/hapus') ?>" style="float:right;">
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
                </div>
            </section>
            <!-- End Of Content -->

            <!-- Modal -->
            <!-- tambah pengaduan -->
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulTambah">Buat Pengaduan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <form method="POST" action="<?= base_url('masyarakat/tambah') ?>">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Judul Laporan</label>
                                    <input type="text" class="form-control" name="judul_laporan" id="exampleFormControlInput1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Isi Laporan</label>
                                    <textarea class="form-control" name="isi_laporan" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Tanggal Kejadian</label>
                                    <input type="date" name="tgl_kejadian" id="tgl_kejadian" class="form-control" required="true">
                                    <p class="text-danger" id="err_tgl_kejadian"></p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Masukkan Gambar</label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end tambah pengaduan -->

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Fidelya. All rights reserved. Coded by <a href="#">M.Ramadhan Fikri</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url('assets/vendor/jquery-3.2.1.min.js') ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url('assets/vendor/bootstrap-4.1/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap-4.1/bootstrap.min.js') ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url('assets/vendor/animsition/animsition.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/circle-progress/circle-progress.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/chartjs/Chart.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/select2/select2.min.js') ?>"></script>

    <!-- Main JS-->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>

</html>
<!-- end document-->