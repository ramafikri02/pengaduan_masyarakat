<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Lapor! | Daftar</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/auth/style.css' ?>">

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 image-container">
                <img src="<?php echo base_url() . 'assets/img/buildings.png' ?>" alt="" class="buildings">
                <img src="<?php echo base_url() . 'assets/img/people.png' ?>" alt="" class="people">
                <br>
                <p>Layanan Pengaduan <br>
                    Masyarakat Secara Online</p>
            </div>

            <div class="col-md-6 form-container">
                <div class="col-lg-8 form-box text-center">
                    <div class="heading mb-4">
                        <h4>Daftar</h4>
                    </div>
                    <form action="">
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="number" placeholder="NIK" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="Nama Pengguna" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" placeholder="Kata Sandi" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-phone"></i></span>
                            <input type="number" placeholder="No Telepon" required>
                        </div>
                        <div class="form-status">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Karyawan</label>
                            </div>
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
                            <a href="m_register" class="login-link">masyarakat</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>