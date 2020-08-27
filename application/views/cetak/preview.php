<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Preview</title>
</head>

<body>
    <main>
        <h1>Laporan Excel</h1>
        <p><a href="<?= base_url('sistem/cetak') ?>">Export ke Pdf</a></p>
        <a href="<?= base_url('sistem/cetak_xls') ?>">Export ke Excel</a>
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
    </main>
</body>

</html>