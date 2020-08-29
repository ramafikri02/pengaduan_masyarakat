<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Lapor! | Masuk</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/auth/s.css'); ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
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
                        <h4>Masuk</h4>
                    </div>

                    <?= $this->session->flashdata('message'); ?>

                    <form action="<?= base_url('auth/login'); ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>">
                            <small class="text-danger text-left"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Kata Sandi">
                            <small class="text-danger text-left"><?= form_error('password'); ?></small>
                        </div>
                        <div class="row mb-3">
                            <div class="text-left mb-3">
                                <button type="submit" class="btn">Masuk</button>
                            </div>
                            <div class="col-6 text-left">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cb1">
                                    <label class="custom-control-label" for="cb1">Ingat Saya</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <div class="custom-control custom-checkbox">
                                    <a href="#" class="forgot-link">Lupa Kata Sandi</a>
                                </div>
                            </div>
                        </div>
                        <div style="color: #777;">Belum punya akun?
                            <a href="m_register" class="register-link">Daftar disini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>