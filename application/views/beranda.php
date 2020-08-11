<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yuk Lapor! | Beranda</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/homepage/style.css'); ?>">

    <!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="<?= base_url('assets/img/logo1.png') ?>" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-login" href="auth">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="title">Layanan Pengaduan Masyarakat</p>
                    <p>Merupakan aplikasi yang dibuat pemerintah yang bersifat dua arah dan dibuat untuk masyarakat dalam memudahkan membuat pegaduan.
                    <br>Laporkan kepada kami jika anda mempunyai keluhan.</p>
                    <a href="<?php echo base_url() . 'auth/login' ?>" class="menuju-lapor">Lapor Sekarang</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="<?php echo base_url() . 'assets/img/group2.png' ?>" class="img-fluid">
                </div>
            </div>
        </div>
        <img src="<?php echo base_url() . 'assets/img/wave4.png' ?>" class="bottom-img">
    </section>

    <section id="service">
        <div class="container">
            <p class="title-service">Alur Pengaduan</p>
            <div class="row">
                <div class="col-md-2 service">
                    <img src="" alt="">
                    <i class="fas fa-pen-square"></i>
                    <p class="text-service">Tulis Laporan</p>
                    <p>Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                </div>
                <div class="col-md-2 service">
                    <img src="" alt="">
                    <i class="fas fa-arrow-circle-right"></i>
                    <p class="text-service">Proses Verifikasi</p>
                    <p>Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang</p>
                </div>
                <div class="col-md-2 service">
                    <img src="" alt="">
                    <i class="fas fa-comments"></i>
                    <p class="text-service">Proses Tindak Lanjut</p>
                    <p>Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
                </div>
                <div class="col-md-2 service">
                    <img src="" alt="">
                    <i class="fas fa-comment-dots"></i>
                    <p class="text-service">Beri Tanggapan</p>
                    <p>Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari</p>
                </div>
                <div class="col-md-2 service">
                    <img src="" alt="">
                    <i class="fas fa-check-circle"></i>
                    <p class="text-service">Selesai</p>
                    <p>Laporan Anda akan terus ditindak lanjuti hingga terselesaikan</p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>