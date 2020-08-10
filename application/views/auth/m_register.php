<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Lapor! | Daftar</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/auth/style.css') ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
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
                    <form action="">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="exampleNIK" placeholder="NIK">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleFullName" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleUserName" placeholder="Nama Pengguna">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Kata Sandi">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="exampleTelp" placeholder="No Telepon">
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
                            <a href="register" class="login-link">admin atau karyawan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>