<!-- Content -->
<section class="mt-4">
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
                                    <tr class="">
                                        <th style="max-width: 25px;">#</th>
                                        <th style="max-width: 120px;">Judul Laporan</th>
                                        <th style="max-width: 120px;">Kategori</th>
                                        <th style="max-width: 120px;">Status</th>
                                        <th style="max-width: 120px;">Tanggal Pengaduan</th>
                                        <th style="width:30px; max-width: 30px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pengaduan as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p['judul_laporan'] ?></td>
                                            <td><?= $p['kategori'] ?></td>
                                            <td><?= $p['status'] ?></td>
                                            <td><?= date('d F Y', $p['tgl_pengaduan']) ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="<?= base_url('petugas/detail_pengaduan?id='. $p['id_pengaduan'] . ' ');?>" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?= base_url('petugas/tanggapan?id='. $p['id_pengaduan'] . ' ');?>" class="btn btn-primary">
                                                    <i class="fas fa-comment"></i>
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