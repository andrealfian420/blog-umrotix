<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Daftar Tag</h1>
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
            <button class="btn btn-primary btnTambahTag" data-toggle="modal" data-target="#modalTag">Tambah Tag Baru</a></button>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Tag</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$tags) : ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                <h3>Tidak ada Tag !</h3>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($tags as $tag) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $tag['tag']; ?></td>
                            <td>
                                <a href="<?= base_url('tag_list/editTag/' . $tag['id']) ?>" class="badge badge-success btnUpdateTag" data-toggle="modal" data-target="#modalTag" data-id="<?= $tag['id'] ?>">Edit</a>
                                <a href="<?= base_url('tag_list/hapusTag/' . $tag['id']);  ?>" class="badge badge-danger btnDeleteTag" onclick="return confirm('Yakin Hapus?')">Delete</a>
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

<!-- Tambah Tag Modal -->
<div class="modal fade" id="modalTag" tabindex="-1" role="dialog" aria-labelledby="modalTagLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judulModal" id="modalTagLabel">Tag Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('tag_list/tambahTag'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_tag">Nama Tag</label>
                        <input type="text" name="tag" class="form-control" id="nama_tag" placeholder="Cth: Umroh" required>
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