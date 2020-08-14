<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Permintaan</h1>
    <div class="table-responsive">
        <?= $this->session->flashdata('message'); ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Pengaduan</th>
                    <th>NIK</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($pengaduan as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->id_pengaduan ?></td>
                        <td><?= $p->nik ?></td>
                        <td><?= $p->judul_laporan ?></td>
                        <td><?= $p->isi_laporan ?></td>
                        <td><?= $p->foto ?></td>
                        <td><?= $p->tgl_pengaduan ?></td>
                        <td><?= $p->status ?></td>
                        <td>
                            <button type="button" class="btn btn-primary">Ubah</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" style="margin-left: 500px;" data-toggle="modal" data-target="#exampleModal">
            Buat Pengaduan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Pengaduan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Judul Laporan</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Isi Laporan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Tanggal Kejadian</label>
                                <input type="date" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Masukkan Gambar</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->