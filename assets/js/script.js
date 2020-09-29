$(document).ready(function () {
	$('#loading-simpan, #loading-ubah, #loading-hapus, #pesan-simpan, #pesan-error').hide()

	$('#tabelPengaduan').DataTable();
	$('#tabelPengaduanProses').DataTable();
	$('#tabelPengaduanSelesai').DataTable();

	// Masyarakat
	$('#btn-tambah').click(function () {
		$('#input-pengaduan')[0].reset();
		$('#btn-ubah').hide()
		$('#btn-simpan').show()

		$('#modal-title').html('Buat Pengaduan')
	})

	$('#view').on('click', '.btn-edit', function () {
		id = $(this).data('id')

		$('#btn-simpan').hide()
		$('#btn-ubah').show()

		$('#modal-title').html('Ubah Pengaduan')

		var tr = $(this).closest('tr')
		var judul_laporan = tr.find('.judul_laporan').val()
		var kategori = tr.find('.kategori').val()
		var isi_laporan = tr.find('.isi_laporan').val()
		var image = tr.find('.image').val()

		$('#judul_laporan').val(judul_laporan)
		$('#kategori').val(kategori)
		$('#isi_laporan').val(isi_laporan)
		$('#image').val(image)
	})

	$('#view').on('click', '.btn-hapus', function () {
		id = $(this).data('id')
	})

	$('#btn-simpan').click(function () {
		$('#loading-simpan').show()

		$.ajax({
			url: base_url + 'masyarakat/tambah_pengaduan',
			type: 'POST',
			data: $('#form-modal form').serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'sukses') {
					$('#loading-simpan').hide()
					$('#view').html(response.html)
					$('#tabelPengaduan').DataTable().ajax.reload;
					$('#input-pengaduan')[0].reset();
					$('#form-modal').modal('hide')
					$('#pesan-simpan').html(response.pesan).fadeIn().delay(2000).fadeOut()
				} else {
					$('#pesan-error').html(response.pesan).show()
				}
			},
			error: function (xhr, ajaxOptions, thrownError, response) {
				alert(xhr.responseText)
			}
		})
	})

	$('#btn-ubah').click(function () {
		$('#loading-ubah').show()

		$.ajax({
			url: base_url + 'masyarakat/ubah_pengaduan/' + id,
			type: 'POST',
			data: $('#form-modal form').serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'sukses') {
					$('#loading-ubah').hide()
					$('#view').html(response.html)
					$('#tabelPengaduan').DataTable().ajax.reload;
					$('#input-pengaduan')[0].reset();
					$('#form-modal').modal('hide')
					$('#pesan-ubah').html(response.pesan).fadeIn().delay(2000).fadeOut()
				} else {
					$('#pesan-error').html(response.pesan).show()
				}
			},
			error: function (xhr, ajaxOptions, thrownError, response) {
				alert(xhr.responseText)
			}
		})
	})

	$('#btn-hapus').click(function () {
		$('#loading-hapus').show()

		$.ajax({
			url: base_url + 'masyarakat/hapus_pengaduan/' + id,
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				$('#loading-hapus').hide()
				$('#view').html(response.html)
				$('#tabelPengaduan').DataTable().ajax.reload;
				$('#modal-hapus').modal('hide')
				$('#pesan-hapus').html(response.pesan).fadeIn().delay(2000).fadeOut()
			}
		})
	})

	/////////////////////////////////////////////////////////////////

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
