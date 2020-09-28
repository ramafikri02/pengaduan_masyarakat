<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <?= $this->session->flashdata('message'); ?>
                        <table class="table table-bordered" id="tabelPengaduan" width="100%" cellspacing="0">
                            <thead style="font-weight: bold;">
                                <tr class="text-center">
                                    <th style="max-width: 25px;">#</th>
                                    <th style="max-width: 400px;">Judul Laporan</th>
                                    <th style="max-width: 150px;">Kategori</th>
                                    <th style="max-width: 150px;">Status</th>
                                    <th style="max-width: 150px;">Tanggal Pengaduan</th>
                                    <th style="max-width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="show-data">
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
                                            <a href="<?= base_url('masyarakat/detail_pengaduan?id=' . $p['id_pengaduan'] . ' '); ?>" class="btn btn-success">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('masyarakat/ubah_pengaduan?id=' . $p['id_pengaduan'] . ' '); ?>" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-hapus" data-id="<?= $p['id_pengaduan']; ?>" data-toggle="modal" data-target="#modal-hapus">
                                                <i class="fas fa-trash-alt"></i>
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