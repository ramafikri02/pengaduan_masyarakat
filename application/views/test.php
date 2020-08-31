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
    <title>Pengaduan | Yuk Lapor!</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/homepage/style.css'); ?>">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">

    <!-- Vendor CSS-->
    <link href="<?= base_url('assets/vendor/animsition/animsition.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url('assets/css/st.css') ?>" rel="stylesheet" media="all">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body class="animsition">
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="<?= base_url('assets/img/logo1.png') ?>" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pengaduan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" style="color: #32349f !important;" href="#">Pending</a>
                            <a class="dropdown-item" style="color: #32349f !important;" href="#">Proses</a>
                            <a class="dropdown-item" style="color: #32349f !important;" href="#">Selesai</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak">Keluar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <section class="au-breadcrumb m-t-75">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb-content">
                            <div class="au-breadcrumb-left">
                                <div class="img-cir img-120">
                                    <img src="<?= base_url('assets/img/profile/default.png'); ?>" alt="User" />
                                </div>
                                <h4 style="margin-bottom: 50px; margin-left: 150px"><?= $user['nama'] ?></h4>
                                <p><?= $user['level'] ?></p>
                            </div>
                            <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                                <i class="zmdi zmdi-plus"></i>Tambah Pengaduan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Pengaduan</h5>
                            <form action="<?= base_url('sistem/cetak_xls') ?>">
                                <button class="btn btn-primary tmbl-excel" style="float: right;">Export Excel</button>
                            </form>
                            <form action="<?= base_url('sistem/cetak_pdf') ?>">
                                <button class="btn btn-primary tmbl-pdf" style="float: right; margin-right:10px; margin-bottom:20px">Export PDF</button>
                            </form>
                            <div class="table-responsive">
                                <?= $this->session->flashdata('message'); ?>
                                <table class="table table-bordered" id="tabelPengaduan" width="100%" cellspacing="0">
                                    <thead style="font-weight: bold;">
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th style="max-width:400px;">Judul Laporan</th>
                                            <th style="max-width:150px;">Kategori</th>
                                            <th style="max-width:150px;">Status</th>
                                            <th style="max-width:150px;">Tanggal Pengaduan</th>
                                            <th width="130px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pengaduan as $p) : ?>
                                            <tr>
                                                <td><?= $p['id_pengaduan'] ?></td>
                                                <td><?= $p['judul_laporan'] ?></td>
                                                <td><?= $p['kategori'] ?></td>
                                                <td><?= $p['status'] ?></td>
                                                <td><?= date('d F Y', $p['tgl_pengaduan']) ?></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <a href="#" class="btn btn-success tmbl-lihat" data-id="<?= $p['id_pengaduan']; ?>" data-kategori="<?= $p['kategori']; ?>" data-judul="<?= $p['judul_laporan']; ?>" data-isi="<?= $p['isi_laporan']; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-warning tmbl-edit" data-id="<?= $p['id_pengaduan']; ?>" data-kategori="<?= $p['kategori']; ?>" data-judul="<?= $p['judul_laporan']; ?>" data-isi="<?= $p['isi_laporan']; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger tmbl-hapus" data-id="<?= $p['id_pengaduan']; ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
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
    <!-- lihat pengaduan -->
    <div class="modal fade" id="lihatPengaduan" tabindex="-1" aria-labelledby="judulUbah" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulUbah">Lihat Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select class="form-control kategori" name="kategori" id="kategori" disabled>
                                <?php
                                foreach ($kategori as $k) : ?>
                                    <option><?= $k->kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul Laporan</label>
                            <input type="text" class="form-control judul_laporan" name="judul_laporan" id="exampleFormControlInput1" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Isi Laporan</label>
                            <textarea class="form-control isi_laporan" name="isi_laporan" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Gambar</label> <br>
                            <img src="<?= base_url('assets/img/pengaduan/') . $p['image'] ?>" alt="" width="200px">
                        </div>
                        <div class="form-group">
                            <div class="modal-footer">
                                <input type="hidden" name="id" class="id">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end lihat pengaduan -->

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
                    <?= form_open_multipart('masyarakat/tambah_pengaduan') ?>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori">
                            <?php
                            foreach ($kategori as $k) : ?>
                                <option><?= $k->kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul Laporan</label>
                        <input type="text" class="form-control" name="judul_laporan" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Isi Laporan</label>
                        <textarea class="form-control" name="isi_laporan" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Masukkan Gambar</label>
                        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Pengaduan</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end tambah pengaduan -->

    <!-- edit pengaduan -->
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
                    <form method="POST" action="<?= base_url('masyarakat/ubah_pengaduan'); ?>">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select class="form-control kategori" name="kategori" id="kategori">
                                <?php
                                foreach ($kategori as $k) : ?>
                                    <option><?= $k->kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul Laporan</label>
                            <input type="text" class="form-control judul_laporan" name="judul_laporan" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Isi Laporan</label>
                            <textarea class="form-control isi_laporan" name="isi_laporan" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Masukkan Gambar</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <div class="modal-footer">
                                <input type="hidden" name="id" class="id">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end edit pengaduan -->

    <!-- Delete Pengaduan-->
    <form action="<?= base_url('masyarakat/hapus_pengaduan'); ?>" method="post">
        <div class="modal fade" id="hapusPengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pengaduan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="exampleFormControlInput1">Apa anda yakin ingin menghapus pengaduan ini?</label>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Delete Pengaduan-->
</body>
<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!-- Script JS-->
<script src="<?= base_url('assets/js/script.js') ?>"></script>

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

<!-- Jquery JS-->
<!-- Vendor JS       -->
<script src="<?= base_url('assets/vendor/animsition/animsition.min.js') ?>"></script>
<!-- Main JS-->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

</html>
<!-- end document-->