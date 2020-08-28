<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2020 Fidelya. All rights reserved. Coded by <a href="#">M.Ramadhan Fikri</a>.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PAGE CONTAINER-->
</div>

</div>
</body>

<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelPengaduan').DataTable();

        // get Edit Product
        $('.tmbl-edit').on('click',function(){
            // get data from button edit
            var id = $(this).data('id');
            var judul = $(this).data('judul');
            var isi = $(this).data('isi');
            // Set data to Form Edit
            $('.id').val(id);
            $('.judul_laporan').val(judul);
            $('.isi_laporan').val(isi);
            // Call Modal Edit
            $('#ubahPengaduan').modal('show');
        });

        $('.tmbl-delete').on('click',function(){
            // get data from button edit
            var id = $(this).data('id');
            // Set data to Form Edit
            $('.id').val(id);
            // Call Modal Edit
            $('#deletePengaduan').modal('show');
        });
    });
</script>

<!-- Bootstrap JS-->
<script src="<?= base_url('assets/vendor/bootstrap-4.1/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap-4.1/bootstrap.min.js') ?>"></script>
<!-- Vendor JS       -->
<script src="<?= base_url('assets/vendor/animsition/animsition.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/circle-progress/circle-progress.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
<script src="<?= base_url('assets/vendor/chartjs/Chart.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/select2/select2.min.js') ?>"></script>

<!-- Main JS-->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

</html>
<!-- end document-->