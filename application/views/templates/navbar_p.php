<section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="<?= base_url('assets/img/logo1.png') ?>" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pengaduan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" style="color: #32349f !important;" href="#">Pending</a>
                        <a class="dropdown-item" style="color: #32349f !important;" href="#">Proses</a>
                        <a class="dropdown-item" style="color: #32349f !important;" href="#">Selesai</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout') ?>">Keluar</a>
                </li>
            </ul>
        </div>
    </nav>
</section>