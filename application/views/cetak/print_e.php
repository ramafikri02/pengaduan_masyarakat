<table border="1" width="100%">

    <thead>

        <tr>
            <th>ID</th>
            <th>Judul Laporan</th>
            <th>Isi Laporan</th>
            <th>Tanggal Kejadian</th>
            <th>Tanggal Pengaduan</th>
        </tr>

    </thead>

    <tbody>

        <?php $i = 1;
        foreach ($pengaduan as $p) { ?>

            <tr>
                <td><?= $p->id_pengaduan ?></td>
                <td><?= $p->judul_laporan ?></td>
                <td><?= $p->isi_laporan ?></td>
                <td><?= $p->tgl_kejadian ?></td>
                <td><?= date('d F Y', $p->tgl_pengaduan) ?></td>
            </tr>

        <?php $i++;
        } ?>

    </tbody>

</table>