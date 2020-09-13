<h1 style="text-align: center;">Data Pengaduan</h1>
<?="Tanggal : ".date('d-m-Y'); ?>
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
                <td height="80"><img src="<?= base_url('assets/img/pengaduan/') . $p['image'] ?>" alt="Ini Gambar" height="60"></td>
                <td><?= date('d F Y', $p['tgl_pengaduan']) ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>