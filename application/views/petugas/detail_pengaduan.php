<!-- Content -->
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Profile</h4>
                        <?php foreach ($detail as $d) {?>
                        <form method="" action="">
                            <div class="form-group">
                                <label for="inputAddress">ID Pengaduan</label>
                                <input type="text" class="form-control" name="id" id="id" value="<?= $d['id_pengaduan'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Nik</label>
                                <input type="text" class="form-control" id="inputAddress" value="<?= $d['nik'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori" readonly>
                                    <option><?= $d['kategori'] ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Judul Laporan</label>
                                <input type="text" class="form-control" name="judul_laporan" value="<?= $d['judul_laporan'] ?>" id="inputAddress2" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Status</label>
                                <input type="text" class="form-control" name="status" value="<?= $d['status'] ?>" id="inputAddress2" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar</label>
                                <br>
                                <img src="<?= base_url('assets/img/pengaduan/') . $d['image'] ?>" style="width: 150px;" alt="Ini Gambar">
                            </div>
                            <a href="<?= base_url('petugas/index') ?>" class="btn btn-primary">Kembali</a>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->