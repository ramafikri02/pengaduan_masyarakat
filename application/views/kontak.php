<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Lapor! | Beranda</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/homepage/style.css' ?>">

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
</head>

<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="<?php echo base_url() . 'assets/img/logo1.png' ?>" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-login" href="<?= base_url('auth/login'); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="title">Hubungi Kami</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url() . 'assets/img/facebook.png' ?>" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url() . 'assets/img/twitter.png' ?>" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url() . 'assets/img/instagram.png' ?>" class="img-fluid">
                </div>
            </div>
        </div>
        <img src="<?php echo base_url() . 'assets/img/wave4.png' ?>" class="bottom-img">
    </section>
</body>

</html>