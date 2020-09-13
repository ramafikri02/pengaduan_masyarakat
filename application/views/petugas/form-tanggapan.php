<!-- Content -->
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Form Tanggapan</h4>
                        <?php foreach ($detail as $d) { ?>
                            <form method="POST" action="<?= base_url('petugas/aksi_tanggapan') ?>">
                                <div class="form-group">
                                    <label for="inputAddress">ID Pengaduan</label>
                                    <input type="text" class="form-control" name="id_pengaduan" id="id_pengaduan" value="<?= $d['id_pengaduan'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Judul Laporan</label>
                                    <input type="text" class="form-control" name="judul_laporan" value="<?= $d['judul_laporan'] ?>" id="inputAddress2" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori" disabled>
                                        <option><?= $d['kategori'] ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Isi Laporan</label>
                                    <textarea class="form-control" name="isi_laporan" id="exampleFormControlTextarea1" rows="3" disabled><?= $d['isi_laporan'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tanggapan</label>
                                    <textarea class="form-control" name="tanggapan" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <a href="<?= base_url('petugas/index') ?>" class="btn btn-secondary">Kembali</a>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->