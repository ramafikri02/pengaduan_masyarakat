<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Preview</title>
</head>

<body>
    <main>
        <h1>Laporan Excel</h1>
        <p><a href="<?= base_url('sistem/cetak_pdf') ?>">Export ke Pdf</a></p>
        <a href="<?= base_url('sistem/cetak_xls') ?>">Export ke Excel</a>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                    <th>Gambar</th>
                    <th>Tanggal Pengaduan</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($pengaduan as $p) { ?>
                    <tr class="text-align:center;">
                        <td><?= $p['id_pengaduan'] ?></td>
                        <td><?= $p['kategori'] ?></td>
                        <td><?= $p['judul_laporan'] ?></td>
                        <td><?= $p['isi_laporan'] ?></td>
                        <td><img style="width: 100px;" src="<?= base_url('assets/img/pengaduan/') . $p['image'] ?>"></td>
                        <td><?= date('d F Y', $p['tgl_pengaduan']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>