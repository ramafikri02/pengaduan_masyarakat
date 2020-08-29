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
    <title>Yuk Lapor! | Daftar</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/auth/s.css'); ?>">

    <!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">

    <!-- Vendor CSS-->
    <link href="<?= base_url('assets/vendor/animsition/animsition.min.css') ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url('assets/css/st.css') ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 image-container">
                <img src="<?= base_url('assets/img/buildings.png') ?>" alt="" class="buildings">
                <img src="<?= base_url('assets/img/people.png') ?>" alt="" class="people">
                <br>
                <p class="title">Layanan Pengaduan <br>
                    Masyarakat Secara Online</p>
            </div>

            <div class="col-md-6 form-container">
                <div class="col-lg-8 form-box text-center">
                    <div class="heading mb-4">
                        <h4>Daftar</h4>
                    </div>
                    <form method="post" action="<?= base_url('auth/m_register') ?>">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="nik" id="nik" placeholder="NIK" value="<?= set_value('nik') ?>">
                            <small class="text-danger text-left"><?= form_error('nik'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Nama Lengkap" value="<?= set_value('name') ?>">
                            <small class="text-danger text-left"><?= form_error('name'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>">
                            <small class="text-danger text-left"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Kata Sandi" value="<?= set_value('password1') ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ketik ulang kata sandi">
                            <small class="text-danger text-left"><?= form_error('password2'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="telp" id="telp" placeholder="No Telepon" value="<?= set_value('telp') ?>">
                            <small class="text-danger text-left"><?= form_error('telp'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <div class="row mb-3">
                            <div class="text-left mb-3">
                                <button type="submit" class="btn">Daftar</button>
                            </div>
                        </div>
                        <div style="color: #777;">Sudah punya akun?
                            <a href="login" class="login-link">Masuk disini</a>
                        </div>
                        <div style="color: #777;">Daftar sebagai
                            <a href="register" class="login-link">admin atau petugas</a>
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