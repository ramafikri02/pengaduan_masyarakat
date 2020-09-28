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
		$.ajax({
			url: base_url + 'masyarakat/tambah_pengaduan',
			type: 'POST',
			data: $('#form-tambah form').serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'sukses') {
					$('#view').html(response.html)
					$('#tabelPengaduan').DataTable().ajax.reload;
					$('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()

					$('#form-tambah').modal('hide')
				} else {
					$('#pesan-error').html(response.pesan).show()
				}
			},
			error: function (xhr, ajaxOptions, thrownError, response) {
				alert(xhr.responseText)
			}
		})
	})

	$('#view').on('click', '.btn-hapus', function(){ // Ketika tombol dengan class btn-alert-hapus pada div view di klik
		id = $(this).data('id') // Set variabel id dengan id yang kita set pada atribut data-id pada tag button hapus
	})

	$('#btn-hapus').click(function () {

		$.ajax({
			url: base_url + 'masyarakat/hapus_pengaduan/' + id, 
			type: 'GET',
			dataType: 'json',
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType('application/jsoncharset=UTF-8')
				}
			},
			success: function (response) {
				$('#view').html(response.html)
				$('#tabelPengaduan').DataTable().ajax.reload;
				$('#modal-hapus').modal('hide')
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
