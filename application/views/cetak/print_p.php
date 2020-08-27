<h1 style="text-align: center;">Data Pengaduan</h1>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="tabelPengaduan" width="100%" cellspacing="0" border="1">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>ID</th>
            <th>Judul Laporan</th>
            <th>Isi Laporan</th>
            <th>Tanggal Kejadian</th>
            <th>Tanggal Pengaduan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($pengaduan as $p) : ?>
            <tr>
                <td><?= $p->id_pengaduan ?></td>
                <td><?= $p->judul_laporan ?></td>
                <td><?= $p->isi_laporan ?></td>
                <td><?= $p->tgl_kejadian ?></td>
                <td><?= date('d F Y', $p->tgl_pengaduan) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>