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
                                <li class="list-inline-item">Pengaduan/pending</li>
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

        <!-- Pending -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Menunggu Persetujuan</h5>
                        <div class="table-responsive">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-bordered" id="tabelPengaduan" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Judul Laporan</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($pending as $p) : ?>
                                        <tr>
                                            <td><?= $p['id_pengaduan'] ?></td>
                                            <td><?= $p['judul_laporan'] ?></td>
                                            <td><?= $p['kategori'] ?></td>
                                            <td class="btn-danger"><?= $p['status'] ?></td>
                                            <td><?= date('d F Y', $p['tgl_pengaduan']) ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="<?= base_url('admin/detail_pengaduan?id='. $p['id_pengaduan'] . ' ');?>" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-primary tmbl-setuju" data-id="<?= $p['id_pengaduan']; ?>">
                                                    <i class="fas fa-check"></i>
                                                </a>
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

        <!-- Proses -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sedang di Proses Petugas</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelPengaduanProses" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Judul Laporan</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Tanggal Pengaduan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($proses as $pro) : ?>
                                        <tr>
                                            <td><?= $pro['id_pengaduan'] ?></td>
                                            <td><?= $pro['judul_laporan'] ?></td>
                                            <td><?= $pro['kategori'] ?></td>
                                            <td class="btn-warning"><?= $pro['status'] ?></td>
                                            <td><?= date('d F Y', $pro['tgl_pengaduan']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Selesai -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengaduan Selesai</h5>
                        <form action="<?= base_url('sistem/cetak_xls') ?>">
                            <button class="btn btn-primary tmbl-excel" style="float: right;">Export Excel</button>
                        </form>
                        <form action="<?= base_url('sistem/cetak_pdf') ?>">
                            <button class="btn btn-primary tmbl-pdf" style="float: right; margin-right:10px; margin-bottom:20px">Export PDF</button>
                        </form>
                        <div class="table-responsive">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-bordered" id="tabelPengaduanSelesai" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Judul Laporan</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th width="10px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($selesai as $s) : ?>
                                        <tr>
                                            <td><?= $s['id_pengaduan'] ?></td>
                                            <td><?= $s['judul_laporan'] ?></td>
                                            <td><?= $s['kategori'] ?></td>
                                            <td class="btn-success"><?= $s['status'] ?></td>
                                            <td><?= date('d F Y', $s['tgl_pengaduan']) ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="<?= base_url('admin/detail_pengaduan?id='. $p['id_pengaduan'] . ' ');?>" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
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

<!-- Setujui Pengaduan-->
<form action="<?= base_url('admin/setujui_pengaduan'); ?>" method="post">
    <div class="modal fade" id="setujuPengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="exampleFormControlInput1">Apa anda yakin ingin menyetujui pengaduan ini?</label>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Setuju</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Setujui Pengaduan-->