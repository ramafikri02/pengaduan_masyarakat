<!-- MENU SIDEBAR-->
<aside class="menu-sidebar2">
    <div class="logo">
        <a href="#">
            <img src="<?= base_url('assets/img/logo1.png'); ?>" alt="Fidelya" />
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="<?= base_url('assets/img/profile/default.png'); ?>" alt="User" />
            </div>
            <h4 class="name"><?= $user['nama'] ?></h4>
            <p><?= $user['level'] ?></p>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="index">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="profile">
                        <i class="fas fa-user"></i>Profile</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-book"></i>Pengaduan
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="pengaduan_pending">
                                <i class="fas fa-clock-o"></i>Pending</a>
                        </li>
                        <li>
                            <a href="pengaduan_proses">
                                <i class="fas fa-gears"></i>Proses</a>
                        </li>
                        <li>
                            <a href="pengaduan_selesai">
                                <i class="fas fa-check-circle"></i>Selesai</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>User
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="masyarakat">
                                <i class="fas fa-user"></i>Masyarakat</a>
                        </li>
                        <li>
                            <a href="petugas">
                                <i class="fas fa-user"></i>Petugas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="kategori">
                        <i class="fas fa-bars"></i>Kategori</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->