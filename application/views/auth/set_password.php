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
    <title>Yuk Lapor! | Masuk</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/auth/style.css'); ?>">

    <!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">

    <!-- Vendor CSS-->
    <link href="<?= base_url('assets/vendor/animsition/animsition.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 image-container">
                <img src="<?= base_url('assets/img/buildings.png'); ?>" alt="" class="buildings">
                <img src="<?= base_url('assets/img/people.png'); ?>" alt="" class="people">
                <br>
                <p class="title">Layanan Pengaduan <br>
                    Masyarakat Secara Online</p>
            </div>

            <div class="col-md-6 form-container">
                <div class="col-md-8 form-box text-center">
                    <div class="heading mb-4">
                        <h4>Masukkan Kata Sandi Baru</h4>
                    </div>

                    <?= $this->session->flashdata('message'); ?>

                    <form action="<?= base_url('auth/set_forgot_password'); ?>" method="post">
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Kata Sandi" value="<?= set_value('password1') ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ketik ulang kata sandi">
                            <small class="text-danger text-left"><?= form_error('password2'); ?></small>
                        </div>
                        <div class="row mb-3">
                            <div class="text-left mb-3">
                                <button type="submit" class="btn">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Jquery JS-->
<script src="<?= base_url('assets/vendor/jquery-3.2.1.min.js') ?>"></script>
<!-- Vendor JS       -->
<script src="<?= base_url('assets/vendor/animsition/animsition.min.js') ?>"></script>
<!-- Main JS-->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

</html>