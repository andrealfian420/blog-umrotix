<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Tambah Artikel</h1>
    </div>

    <?php if ($this->session->flashdata('successUpdate')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('successUpdate') ?></strong>
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
            <form action="<?= base_url('artikel_list/editArtikel/' . $artikel['id']) ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori_id" id="kategori">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $ktgr) : ?>
                            <?php if ($ktgr['id'] == $artikel['kategori_id']) : ?>
                                <option value="<?= $ktgr['id'] ?>" selected><?= $ktgr['kategori'] ?></option>
                            <?php else : ?>
                                <option value="<?= $ktgr['id'] ?>"><?= $ktgr['kategori'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger"><?= form_error('kategori_id'); ?></small>
                </div>

                <input type="hidden" name="id" value="<?= $artikel['id'] ?>">
                <?php if ($user['role_id'] == 1) : ?>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <select class="form-control" name="author_id" id="author">
                            <option value="">--Pilih Author--</option>
                            <?php foreach ($author as $aut) : ?>
                                <option value="<?= $aut['id'] ?>" <?php if ($aut['id'] == $artikel['author_id']) {
                                                                        echo 'selected';
                                                                    } ?>><?= $aut['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?= form_error('author_id'); ?></small>
                    </div>
                <?php else : ?>
                    <input type="hidden" name="author_id" value="<?= $user['id']; ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label for="nama_artikel">Nama Artikel</label>
                    <input type="text" class="form-control" name="nama_artikel" id="nama_artikel" placeholder="Tulis judul terbaikmu!" value="<?= $artikel['nama_artikel'] ?>">
                    <small class="text-danger"><?= form_error('nama_artikel'); ?></small>
                </div>

                <div class="form-group">
                    <label for="artikel_text">Isi Artikel</label>
                    <textarea class="form-control" name="artikel_text" id="artikel_text" rows="10"><?= $artikel['artikel_text']; ?></textarea>
                </div>

                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="customFile">
                    <label class="custom-file-label" for="customFile">Pilih sebuah gambar jika ingin update gambar</label>
                    <small class="text-danger"><?= form_error('image'); ?></small>
                </div>

                <div class="form-group">
                    <label for="tag">Tag Artikel</label>
                    <select name="tag[]" multiple id="tag" class="form-control">
                        <?php if (isset($tags)) : ?>
                            <?php foreach ($tags as $tag) : ?>
                                <?php if (in_array($tag['tag'], json_decode($artikel['tag']))) : ?>
                                    <option value="<?= $tag['tag']; ?>" selected><?= $tag['tag']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $tag['tag']; ?>"><?= $tag['tag']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option disabled>Silahkan tambah tag pada halaman daftar tag terlebih dahulu</option>
                        <?php endif; ?>
                    </select>
                    <small class="text-danger"><?= form_error('tag[]'); ?></small>
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