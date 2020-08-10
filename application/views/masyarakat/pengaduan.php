<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Lapor! | Pengaduan</title>

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
                        <a class="nav-link active" href="#">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-login" href="login">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form class="form-pengaduan">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul Laporan *</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Isi Laporan *</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Kejadian *</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Lokasi Kejadian *</label>
                                <input type="text" class="form-control" id="inputCity" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Kategori Laporan (Opsional)</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Covid-19</option>
                                    <option>Infrastruktur</option>
                                    <option>Kesehatan</option>
                                    <option>Kemaritiman</option>
                                    <option>Pendidikan</option>
                                    <option>Pariwisata</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Masukkan Gambar (Opsional)</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url() . 'assets/img/group1.png' ?>" class="bg-img">
                </div>
            </div>
        </div>
    </section>
</body>

</html>