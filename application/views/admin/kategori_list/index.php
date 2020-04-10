<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kategori</h1>
    </div>

    <?php if ($this->session->flashdata('deleted')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('deleted') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('successInsert')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('successInsert') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('failedUpdate')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('failedUpdate') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('successUpdate')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('successUpdate') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <div class="row">
        <div class="col-3 mb-2">
            <button class="btn btn-primary btnTambah" data-toggle="modal" data-target="#modalKategori">Tambah Kategori Baru</a></button>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$kategori) : ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                <h3>Tidak ada Kategori !</h3>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($kategori as $ktgr) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $ktgr['kategori']; ?></td>
                            <td>
                                <a href="<?= base_url('kategori_list/editKategori/' . $ktgr['id']) ?>" class="badge badge-success btnUpdateKategori" data-toggle="modal" data-target="#modalKategori" data-id="<?= $ktgr['id'] ?>">Edit</a>
                                <a href="<?= base_url('kategori_list/hapusKategori/' . $ktgr['id']);  ?>" class="badge badge-danger btnDelete" onclick="return confirm('Yakin Hapus?')">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Tmbah Kategori Modal -->
<div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="modalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judulModal" id="modalKategoriLabel">Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kategori_list/tambahKategori'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="nama_kategori" placeholder="Cth: Ibadah Puasa">
                        <input type="hidden" name="id" id="id">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>