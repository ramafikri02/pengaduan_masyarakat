$(document).ready(function () {
	$('#tabelPengaduan').DataTable();

	// get data Pengaduan
	$('.tmbl-lihat').on('click', function () {
		// get data from button
		var id = $(this).data('id');
		var judul = $(this).data('judul');
		var isi = $(this).data('isi');
		// Set data to Form
		$('.id').val(id);
		$('.judul_laporan').val(judul);
		$('.isi_laporan').val(isi);
		// Call Modal
		$('#lihatPengaduan').modal('show');
	});

	$('.tmbl-edit').on('click', function () {
		var id = $(this).data('id');
		var judul = $(this).data('judul');
		var isi = $(this).data('isi');

		$('.id').val(id);
		$('.judul_laporan').val(judul);
		$('.isi_laporan').val(isi);
		// $('.isi_laporan').val(isi);

		$('#ubahPengaduan').modal('show');
	});

	$('.tmbl-hapus').on('click', function () {
		var id = $(this).data('id');

		$('.id').val(id);

		$('#hapusPengaduan').modal('show');
	});

	// Kategori
	$('.tmbl-edit-kategori').on('click', function () {
		var id = $(this).data('id');
		var nama = $(this).data('nama');

		$('.id').val(id);
		$('.nama_kategori').val(nama);

		$('#ubahKategori').modal('show');
	});

	$('.tmbl-hapus-kategori').on('click', function () {
		var id = $(this).data('id');

		$('.id').val(id);

		$('#hapusKategori').modal('show');
	});
});
