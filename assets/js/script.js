$(document).ready(function () {

	$('#tabelPengaduan').DataTable();
	// Pengaduan
	$('.tmbl-lihat').on('click', function () {
		// get data from button
		var id = $(this).data('id');
		var kategori = $(this).data('kategori');
		var judul = $(this).data('judul');
		var isi = $(this).data('isi');
		// Set data to Form
		$('.id').val(id);
		$('.kategori').val(kategori);
		$('.judul_laporan').val(judul);
		$('.isi_laporan').val(isi);
		// Call Modal
		$('#lihatPengaduan').modal('show');
	});

	$('.tmbl-edit').on('click', function () {
		var id = $(this).data('id');
		var kategori = $(this).data('kategori');
		var judul = $(this).data('judul');
		var isi = $(this).data('isi');

		$('.id').val(id);
		$('.kategori').val(kategori);
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


	$('#tabelMasyarakat').DataTable();
	// Masyarakat
	$('.tmbl-lihat-masyarakat').on('click', function () {
		// get data from button
		var nik = $(this).data('nik');
		var nama = $(this).data('nama');
		var email = $(this).data('email');
		var telp = $(this).data('telp');
		// Set data to Form
		$('.nik').val(nik);
		$('.nama').val(nama);
		$('.email').val(email);
		$('.telp').val(telp);
		// Call Modal
		$('#lihatMasyarakat').modal('show');
	});

	$('.tmbl-hapus-masyarakat').on('click', function () {
		var nik = $(this).data('nik');

		$('.nik').val(nik);

		$('#hapusMasyarakat').modal('show');
	});


	$('#tabelPetugas').DataTable();
	// Petugas
	$('.tmbl-lihat-petugas').on('click', function () {
		// Lihat Petugas
		var id_petugas = $(this).data('id_petugas');
		var nama = $(this).data('nama');
		var email = $(this).data('email');
		var password = $(this).data('password');
		var telp = $(this).data('telp');
		var image = $(this).data('image');
		var level = $(this).data('level');
		var tgl_ditambahkan = $(this).data('tgl_ditambahkan');
		// Set data to Form
		$('.id_petugas').val(id_petugas);
		$('.nama').val(nama);
		$('.email').val(email);
		$('.password').val(password);
		$('.telp').val(telp);
		$('.image').val(image);
		$('.level').val(level);
		$('.tgl_ditambahkan').val(tgl_ditambahkan);
		// Call Modal
		$('#lihatPetugas').modal('show');
	});

	$('.tmbl-edit-petugas').on('click', function () {
		// Ubah Petugas
		var nama = $(this).data('nama');
		var email = $(this).data('email');
		var password = $(this).data('password');
		var telp = $(this).data('telp');
		var image = $(this).data('image');
		var level = $(this).data('level');
		// Set data to Form
		$('.nama').val(nama);
		$('.email').val(email);
		$('.password').val(password);
		$('.telp').val(telp);
		$('.image').val(image);
		$('.level').val(level);
		// Call Modal
		$('#ubahPetugas').modal('show');
	});

	// Hapus Petugas
	$('.tmbl-hapus-petugas').on('click', function () {
		var id_petugas = $(this).data('id_petugas');

		$('.id_petugas').val(id_petugas);

		$('#hapusPetugas').modal('show');
	});
});
