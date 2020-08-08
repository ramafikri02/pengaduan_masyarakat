<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Lapor! | Masuk</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/auth/style.css'?>">

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 image-container">
                <img src="<?php echo base_url().'assets/img/buildings.png'?>" alt="" class="buildings">
                <img src="<?php echo base_url().'assets/img/people.png'?>" alt="" class="people">
                <br>
                <p>Layanan Pengaduan <br>
                    Masyarakat Secara Online</p>
            </div>

            <div class="col-md-6 form-container">
                <div class="col-lg-8 form-box text-center">
                    <div class="heading mb-4">
                        <h4>Masuk</h4>
                    </div>
                    <form action="<?php echo base_url('auth/aksi_login'); ?>" method="post">
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="Nama Pengguna atau E-mail" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" placeholder="Kata Sandi" required>
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