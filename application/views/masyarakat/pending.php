<h2 class="text-center mt-4">Data Pengaduan</h2>

<section class="au-breadcrumb m-t-35">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <h4>Selamat Datang <?= $user['nama'] ?></h4>
                            <p><?= $user['level'] ?></p>
                        </div>
                        <button type="button" class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#form-modal" id="btn-tambah">
                            <i class="zmdi zmdi-plus"></i>Tambah Pengaduan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<section>
    <div id="view">
        <?php $this->load->view('masyarakat/view', array('model' => $pengaduan)); // Load file view.php dan kirim data pengaduan 
        ?>
    </div>
</section>
<!-- End Of Content -->

<!-- Modal -->
<!-- tambah pengaduan -->
<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulTambah">
                    <span id="modal-title"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div id="pesan-error" class="alert alert-danger"></div>
                <form id="input-pengaduan">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori">
                            <?php
                            foreach ($kategori as $k) : ?>
                                <option><?= $k->kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul Laporan</label>
                        <input type="text" class="form-control" name="judul_laporan" id="judul_laporan" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Isi Laporan</label>
                        <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">gambar</label>
                        <input type="text" class="form-control" name="image" id="image" placeholder="">
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <div id="loading-simpan" class="pull-left">
                                <b>Sedang menyimpan...</b>
                            </div>
                            <div id="loading-ubah" class="pull-left">
                                <b>Sedang mengubah...</b>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="btn-simpan"><i class="fas fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-primary" id="btn-ubah"><i class="fas fa-save"></i> Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end tambah pengaduan -->

<!-- Delete Pengaduan-->
<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="exampleFormControlInput1">Apa anda yakin ingin menghapus pengaduan ini?</label>
            </div>
            <div class="modal-footer">
                <div id="loading-hapus" class="pull-left">
                    <b>Sedang menghapus...</b>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-hapus">Hapus</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete Pengaduan-->