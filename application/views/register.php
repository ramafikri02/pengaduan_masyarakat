<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login-register/style.css'?>">

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
                        <h4>Daftar</h4>
                    </div>
                    <form action="">
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="Nama Pengguna" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-envelope"></i></span>
                            <input type="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-phone"></i></span>
                            <input type="number" placeholder="No Telepon" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-calendar"></i></span>
                            <input type="date" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" placeholder="Kata Sandi" required>
                        </div>
                        <div class="row mb-3">
                            <div class="text-left mb-3">
                                <button type="submit" class="btn">Daftar</button>
                            </div>
                        </div>
                        <div style="color: #777;">Sudah punya akun?
                            <a href="login" class="login-link">Masuk disini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>