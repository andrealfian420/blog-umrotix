<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Daftar User</h1>
    </div>

    <?php if ($this->session->flashdata('userDeleted')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('userDeleted') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <div class="row">
        <div class="col-3 mb-2">
            <button class="btn btn-primary"><a href="<?= base_url('manage_user/tambahUser') ?>" class="text-white text-decoration-none">Tambah User Baru</a></button>
        </div>
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status Keaktifan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$user_data) : ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                <h3>Tidak ada user !</h3>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($user_data as $usrdata) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $usrdata['nama']; ?></td>
                            <td><?= $usrdata['email']; ?></td>
                            <td><?php $role = $this->user->getUserRole($usrdata['role_id']);
                                echo $role['role']; ?></td>
                            <td><?php if ($usrdata['is_active'] == 1) {
                                    echo 'Aktif';
                                } else if ($usrdata['is_active'] == 0) {
                                    echo 'Tidak Aktif';
                                } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('manage_user/editPassword/' . $usrdata['id']) ?>" class="badge badge-success">Ubah Password</a>
                                <?php if ($role['id'] != 1) : ?>
                                    <a href="<?= base_url('manage_user/ubahStatus/' . $usrdata['id']) ?>" class="badge badge-success btnStatus" data-toggle="modal" data-target="#modalStatus" data-id="<?= $usrdata['id'] ?>" data-status="<?= $usrdata['is_active']; ?>">Ubah Status</a>
                                    <a href="<?= base_url('manage_user/hapusUser/' . $usrdata['id']);  ?>" class="badge badge-danger btnDelete" onclick="return confirm('Yakin Hapus?')">Hapus User</a>
                                <?php endif; ?>
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

<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="modalStatusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStatusLabel">Ubah Status Keaktifan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('manage_user/updateStatus'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="status">Status Keaktifan</label>
                        <select class="form-control" id="status" name="is_active">
                            <option>--Pilih Status--</option>
                        </select>
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