<!-- Content -->
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Pengaduan</h4>
                        <?php foreach ($edit as $e) { ?>
                            <?= $this->session->flashdata('message'); ?>
                            <?= form_open_multipart('masyarakat/proses_ubah_pengaduan') ?>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $e['id_pengaduan'] ?>" hidden>
                            <div class="form-group">
                                <label for="inputAddress2">Judul Laporan</label>
                                <input type="text" class="form-control" name="judul_laporan" value="<?= $e['judul_laporan'] ?>" id="inputAddress2">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option><?= $e['kategori'] ?></option>
                                    <?php
                                    foreach ($kategori as $k) : ?>
                                        <option><?= $k->kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Isi Laporan</label>
                                <textarea class="form-control" name="isi_laporan" id="exampleFormControlTextarea1" rows="3"><?= $e['isi_laporan'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar</label>
                                <br>
                                <img src="<?= base_url('assets/img/pengaduan/') . $e['image'] ?>" style="width: 150px;" alt="Ini Gambar">
                                <input type="file" class="form-control-file mt-2" name="image" id="exampleFormControlFile1">
                                <input type="hidden" class="form-control-file mt-2" name="old_image" value="<?= $e['image'] ?>" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?= base_url('masyarakat/index') ?>" class="btn btn-secondary">Kembali</a>
                            <?= form_close() ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->