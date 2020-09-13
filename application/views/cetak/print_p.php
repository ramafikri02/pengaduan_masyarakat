<h1 style="text-align: center;">Data Pengaduan</h1>
<?="Tanggal : ".date('d-m-Y'); ?>
<table border="1" width="100%" cellspacing="0" cellpadding="15">

    <thead>
        <tr>
            <th style="text-align: center;">ID</th>
            <th style="text-align: center;">Kategori</th>
            <th style="text-align: center;">Judul Laporan</th>
            <th style="text-align: center;">Isi Laporan</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Tanggal Pengaduan</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($pengaduan as $p) { ?>
            <tr class="text-align:center;">
                <td style="padding: 5;"><?= $p['id_pengaduan'] ?></td>
                <td style="padding: 5;"><?= $p['kategori'] ?></td>
                <td style="padding: 5;"><?= $p['judul_laporan'] ?></td>
                <td style="padding: 5;"><?= $p['isi_laporan'] ?></td>
                <td style="padding: 5;"><?= $p['status'] ?></td>
                <td style="padding: 5;"><?= date('d F Y', $p['tgl_pengaduan']) ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>