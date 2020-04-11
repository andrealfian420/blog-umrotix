<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Tambah Artikel</h1>
    </div>

    <?php if ($this->session->flashdata('successInsert')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('successInsert') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('uploadFailed')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('uploadFailed') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <div class="row">
        <div class="col-10">
            <form action="<?= base_url('artikel_list/tambahArtikel') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori_id" id="kategori">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $ktgr) : ?>
                            <option value="<?= $ktgr['id'] ?>"><?= $ktgr['kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger"><?= form_error('kategori_id'); ?></small>
                </div>

                <input type="hidden" name="author_id" value="<?= $user['id']; ?>">

                <div class="form-group">
                    <label for="nama_artikel">Nama Artikel</label>
                    <input type="text" class="form-control" name="nama_artikel" id="nama_artikel" placeholder="Tulis judul terbaikmu!" value="<?= set_value('nama_artikel'); ?>">
                    <small class="text-danger"><?= form_error('nama_artikel'); ?></small>
                </div>

                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="image" id="customFile" value="<?= set_value('image'); ?>" required>
                    <label class="custom-file-label" for="customFile">Upload gambar untuk header artikel (Ukuran Maks. 2MB)</label>
                </div>

                <div class="form-group">
                    <label for="artikel_text">Isi Artikel</label>
                    <textarea class="form-control" name="artikel_text" id="artikel_text" rows="10"><?= set_value('artikel_text'); ?></textarea>
                </div>

                <button class="btn btn-primary mt-3" style="width:200px" type="submit">Publish!</button>
                <a href="<?= base_url('artikel_list/'); ?>" class="btn btn-secondary mt-3 text-white text-decoration-none" style="width:200px">Batal</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->