                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Permintaan Selesai</h1>
                    <table id="data" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID Pengaduan</th>
                                <th>NIK</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pengaduan as $p) {
                            ?>
                                <tr>
                                    <td><?php echo $p->id_pengaduan ?></td>
                                    <td><?php echo $p->nik ?></td>
                                    <td><?php echo $p->isi_laporan ?></td>
                                    <td><?php echo $p->foto ?></td>
                                    <td><?php echo $p->tgl_pengaduan ?></td>
                                    <td><?php echo $p->status ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="">Lihat</button>
                                        <button class="btn btn-sm btn-danger" onclick="">Edit</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->