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
                                <li class="list-inline-item">Pengaduan</li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                            <i class="zmdi zmdi-plus"></i>Tambah Pengaduan</button>
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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengaduan</h5>
                        <div class="table-responsive">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-bordered" id="tabelPengaduan" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Judul Laporan</th>
                                        <th>Isi Laporan</th>
                                        <th>Tanggal Kejadian</th>
                                        <th>Foto</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pengaduan as $p) : ?>
                                        <tr>
                                            <td><?= $p->id_pengaduan ?></td>
                                            <td><?= $p->judul_laporan ?></td>
                                            <td><?= $p->isi_laporan ?></td>
                                            <td><?= $p->tgl_kejadian ?></td>
                                            <td><img src="<?= base_url('assets/img/pengaduan/') . $p->image ?>"' width=' 100' height='100'></td>
                                            <td><?= date('d F Y', $p->tgl_pengaduan) ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubahPengaduan">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="ubahPengaduan" tabindex="-1" aria-labelledby="judulUbah" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="judulUbah">Ubah Pengaduan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body ">
                                                                <form method="POST" action="<?= base_url('masyarakat/update') ?>">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Judul Laporan</label>
                                                                        <input type="text" class="form-control" name="judul_laporan" id="exampleFormControlInput1">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1">Isi Laporan</label>
                                                                        <textarea class="form-control" name="isi_laporan" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Tanggal Kejadian</label>
                                                                        <input type="date" name="tgl_kejadian" class="form-control" required="true">
                                                                        <p class="text-danger" id="err_tgl_kejadian"></p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Masukkan Gambar</label>
                                                                        <input type="file" class="form-control-file" name="image" id="image">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form method="POST" action="<?= base_url('masyarakat/hapus') ?>" style="float:right;">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->

<!-- Modal -->
<!-- tambah pengaduan -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulTambah">Buat Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="<?= base_url('masyarakat/tambah') ?>">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul Laporan</label>
                        <input type="text" class="form-control" name="judul_laporan" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Isi Laporan</label>
                        <textarea class="form-control" name="isi_laporan" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Tanggal Kejadian</label>
                        <input type="date" name="tgl_kejadian" id="tgl_kejadian" class="form-control" required="true">
                        <p class="text-danger" id="err_tgl_kejadian"></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Masukkan Gambar</label>
                        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end tambah pengaduan -->