<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">Kamu sedang berada di :</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<!-- STATISTIC-->
<section class="statistic">

</section>
<!-- END STATISTIC-->

<!-- Content -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Profile</h4>
                        <form>
                            <div class="form-group">
                                <label for="inputAddress">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="<?= $masyarakat['nik'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>" id="inputAddress">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" id="email">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" name="password1" id="password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password2" id="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">No Telepon</label>
                                <input type="number" class="form-control" name="telp" value="<?= $masyarakat['telp'] ?>" id="inputAddress2">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Foto Profile</label>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="account2">
                            <div class="image img-cir img-120">
                                <img src="<?= base_url('assets/img/profile/default.png'); ?>" alt="User" />
                            </div>
                            <h4 class="name"><?= $user['nama'] ?></h4>
                            <p>Enim, non delectus eius excepturi corporis consectetur. Sunt aliquid, suscipit nostrum deleniti </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->