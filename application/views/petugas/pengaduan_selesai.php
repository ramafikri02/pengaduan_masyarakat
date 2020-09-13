<!-- Content -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengaduan Selesai</h5>
                        <form action="<?= base_url('sistem/cetak_xls') ?>">
                            <button class="btn btn-primary tmbl-excel" style="float: right;">Export Excel</button>
                        </form>
                        <form action="<?= base_url('sistem/cetak_pdf') ?>">
                            <button class="btn btn-primary tmbl-pdf" style="float: right; margin-right:10px; margin-bottom:20px">Export PDF</button>
                        </form>
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
                                        <th width="130px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pengaduan as $p) : ?>
                                        <tr>
                                            <td><?= $p['id_pengaduan'] ?></td>
                                            <td><?= $p['judul_laporan'] ?></td>
                                            <td><?= $p['kategori'] ?></td>
                                            <td><?= $p['status'] ?></td>
                                            <td><?= date('d F Y', $p['tgl_pengaduan']) ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="<?= base_url('petugas/detail_pengaduan?id='. $p['id_pengaduan'] . ' ');?>" class="btn btn-success">
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