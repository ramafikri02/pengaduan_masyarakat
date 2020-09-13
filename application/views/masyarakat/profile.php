<!-- Content -->
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Profile</h4>
                        <?= form_open_multipart('masyarakat/ubah_profile') ?>
                        <?= $this->session->flashdata('message'); ?>
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
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="account2">
                            <div class="image">
                                <img src="<?= base_url('assets/img/profile/') . $masyarakat['image']; ?>" alt="User" style="border-radius: 100%; width:150px; height:150px" />
                            </div>
                            <h4 class="name"><?= $user['nama'] ?></h4>
                            <p><?= $user['level'] ?></p>
                            <p>Bergabung sejak <?= date('d F Y', $user['tgl_ditambahkan']) ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->