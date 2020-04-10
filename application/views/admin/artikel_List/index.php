<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Daftar Artikel</h1>
    </div>

    <?php if ($this->session->flashdata('deleted')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('deleted') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <div class="row">
        <div class="col-3 mb-2">
            <button class="btn btn-primary"><a href="<?= base_url('artikel_list/tambahArtikel') ?>" class="text-white text-decoration-none">Tambah Artikel Baru</a></button>
        </div>
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Artikel</th>
                        <th>Nama Author</th>
                        <th>Tanggal Post</th>
                        <th>Jumlah Views</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$artikel) : ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                <h3>Tidak ada artikel !</h3>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($artikel as $artk) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $artk['nama_artikel']; ?></td>
                            <td><?php $author = $this->user->getUserById($artk['author_id']);
                                echo $author['nama'];
                                ?></td>
                            <td><?= $artk['created_at']; ?></td>
                            <td><?= $artk['view_count'] ?></td>
                            <td>
                                <a href="<?= base_url('artikel_list/editArtikel/' . $artk['id']) ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('artikel_list/hapusArtikel/' . $artk['id']);  ?>" class="badge badge-danger btnDelete">Delete</a>
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