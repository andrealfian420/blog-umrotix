<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy;Umrotix 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Sampai jumpa kembali!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('vendor/jquery/jquery-3.4.1.min.js'); ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('vendor/sbadmin2/js/sb-admin-2.min.js') ?>"></script>
<script src="<?= base_url('vendor/ckeditor/ckeditor.js'); ?>"></script>

<script>
    CKEDITOR.replace('artikel_text');

    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });

    $('.btnTambah').on('click', function() {
        // ubah nama modal dan tombol submit saat tombol tambah di click
        $('.judulModal').html('Tambah Kategori');
        $(".modal-footer button[type=submit]").html('Tambah Kategori');
        $('.modal-body form').attr('action', '<?= base_url('kategori_list/tambahKategori') ?>');

        // kosongkan modal nya
        $('#id').val('');
        $('#nama_kategori').val('');
    });

    // ubah data
    $('.btnUpdateKategori').on('click', function() {

        // ubah nama modal dan tombol submit saat tombol edit di click
        $('.judulModal').html('Ubah Kategori');
        $('.modal-footer button[type=submit]').html('Simpan Perubahan');
        $('.modal-body form').attr('action', '<?= base_url('kategori_list/updateKategori') ?>');

        const id = $(this).data('id');
        // Ajax
        $.ajax({
            url: '<?= base_url('kategori_list/getDataKategori') ?>',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama_kategori').val(data.kategori);
                $('#id').val(data.id);
            }
        });
    })

    // Tambah Tag
    $('.btnTambahTag').on('click', function() {
        // ubah nama modal dan tombol submit saat tombol tambah di click
        $('.judulModal').html('Tambah Tag');
        $(".modal-footer button[type=submit]").html('Tambah Tag');
        $('.modal-body form').attr('action', '<?= base_url('tag_list/tambahTag') ?>');

        // kosongkan modal nya
        $('#id').val('');
        $('#tag').val('');
    });

    // ubah Tag
    $('.btnUpdateTag').on('click', function() {

        // ubah nama modal dan tombol submit saat tombol edit di click
        $('.judulModal').html('Ubah Tag');
        $('.modal-footer button[type=submit]').html('Simpan Perubahan');
        $('.modal-body form').attr('action', '<?= base_url('tag_list/updateTag') ?>');

        const id = $(this).data('id');
        // Ajax
        $.ajax({
            url: '<?= base_url('tag_list/getDataTag') ?>',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama_tag').val(data.tag);
                $('#id').val(data.id);
            }
        });
    })

    // ubah status keaktifan
    $('.btnStatus').on('click', function() {

        const id = $(this).data('id');
        const status = $(this).data('status');

        // Ajax
        $.ajax({
            url: '<?= base_url('manage_user/getStatus') ?>',
            method: 'post',
            dataType: 'json',
            success: function(data) {

                $('#id').val(id);
                $.each(data, function(i) {
                    if (data[i].id == status) {
                        $('#status').append(`
                            <option value="${data[i].id}" selected>${data[i].status}</option>
                            `);
                    } else {
                        $('#status').append(`
                        <option value="${data[i].id}">${data[i].status}</option>
                            `);
                    }
                })
            }
        });
    })
</script>
</body>

</html>