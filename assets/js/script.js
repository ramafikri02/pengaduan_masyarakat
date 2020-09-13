$(document).ready(function () {

	$('#tabelPengaduan').DataTable();
	$('#tabelPengaduanProses').DataTable();
	$('#tabelPengaduanSelesai').DataTable();
    // Admin
    //Hapus Pengaduan
	$('.tmbl-hapus').on('click', function () {
		var id = $(this).data('id');
		var old_image = $(this).data('old_image');

		$('#id').val(id);
		$('#old_image').val(old_image);

		$('#hapusPengaduan').modal('show');
    });
    
    //Setujui Pengaduan
	$('.tmbl-setuju').on('click', function () {
		var id = $(this).data('id');

		$('.id').val(id);

		$('#setujuPengaduan').modal('show');
	});

    // Kategori
    // Edit Kategori
	$('.tmbl-edit-kategori').on('click', function () {
		var id = $(this).data('id');
		var nama = $(this).data('nama');

		$('.id').val(id);
		$('.nama_kategori').val(nama);

		$('#ubahKategori').modal('show');
	});

    // Hapus Kategori
	$('.tmbl-hapus-kategori').on('click', function () {
		var id = $(this).data('id');

		$('.id').val(id);

		$('#hapusKategori').modal('show');
	});

    // Masyarakat
	$('#tabelMasyarakat').DataTable();
	// Hapus Masyarakat
	$('.tmbl-hapus-masyarakat').on('click', function () {
		var nik = $(this).data('nik');

		$('.nik').val(nik);

		$('#hapusMasyarakat').modal('show');
	});

    //Petugas
	$('#tabelPetugas').DataTable();
	// Hapus Petugas
	$('.tmbl-hapus-petugas').on('click', function () {
		var id_petugas = $(this).data('id_petugas');

		$('.id_petugas').val(id_petugas);

		$('#hapusPetugas').modal('show');
	});
});
