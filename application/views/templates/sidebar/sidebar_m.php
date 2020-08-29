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
                    <a href="profile">
                        <i class="fas fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="index">
                        <i class="fas fa-book"></i>Pengaduan</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->