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
	$('#tabelPengaduan').DataTable();
	$('#btn-simpan').click(function () {
		$('#loading-simpan').show()

		$.ajax({
			url: base_url + 'masyarakat/tambah_pengaduan',
			type: 'POST',
			data: $('#form-tambah form').serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'sukses') { // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
					$('#view').html(response.html)
					$('#tabelPengaduan').DataTable().ajax.reload;
					$('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()

					$('#form-tambah').modal('hide') // Close / Tutup Modal Dialog
				} else { 
					$('#pesan-error').html(response.pesan).show()
				}
			},
			error: function (xhr, ajaxOptions, thrownError, response) { // Ketika terjadi error
				alert(xhr.responseText) // munculkan alert
			}
		})
	})

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
