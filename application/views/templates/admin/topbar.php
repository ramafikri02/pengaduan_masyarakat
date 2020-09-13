<!-- PAGE CONTAINER-->
<div class="page-container2">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop2">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap2">
                    <div class="logo d-block d-lg-none">
                        <a href="#">
                            <img src="<?= base_url('assets/img/logo1.png'); ?>" alt="Fidelya" />
                        </a>
                    </div>
                    <div class="header-button2">
                        <div class="header-button-item mr-0 js-sidebar-btn">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                        <div class="setting-menu js-right-sidebar d-none d-lg-block">
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Akun Saya</a>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="<?= base_url('auth/logout') ?>">
                                        <i class="zmdi zmdi-run"></i>Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
        <div class="logo">
            <a href="#">
                <img src="images/icon/logo-white.png" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar2">
            <div class="account2">
                <div class="image img-cir img-120">
                    <img src="<?= base_url('assets/img/profile/default.png'); ?>" alt="User" />
                </div>
                <h4 class="name">M.Ramadhan Fikri</h4>
                <a href="#">Keluar</a>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list">
                    <li>
                        <a href="profile">
                            <i class="fas fa-user"></i>Profile</a>
                    </li>
                    <li>
                        <a href="index">
                            <i class="fas fa-tachometer-alt"></i>Pengaduan</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END HEADER DESKTOP-->