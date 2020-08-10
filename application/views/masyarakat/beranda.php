<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Lapor! | Pengaduan</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/sidebar/style.css' ?>">

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
            <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat</div>
        </a>

        <hr class="sidebar-divider my-0">
        <?php
        $level = $this->session->userdata('level');
        if ($level == "admin") { ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/data_petugas') ?>">Data Petugas</a>
                        <a class="collapse-item" href="<?= base_url('admin/data_masyarakat') ?>">Data Masyarakat</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data</span>
                </a>
                <div id="collapseData" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/data_kategori') ?>">Kategori</a>
                        <a class="collapse-item" href="<?= base_url('admin/data_pengaduan') ?>">Pengaduan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('auth/ubah_password'); ?>">Ubah Password</a>
                        <a class="collapse-item" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                    </div>
                </div>
            </li>
        <?php } elseif ($level == "petugas") { ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('petugas'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Pengaduan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('petugas/list'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>My List</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('auth/ubah_password'); ?>">Ubah Password</a>
                        <a class="collapse-item" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                    </div>
                </div>
            </li>

        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('masyarakat/list'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('masyarakat'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pengaduan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('auth/ubah_password'); ?>">Ubah Password</a>
                        <a class="collapse-item" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                    </div>
                </div>
            </li>
        <?php } ?>
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
</body>

</html>