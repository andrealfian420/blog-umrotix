                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update Password</h1>

                    <!-- Alerts -->
                    <?php if ($this->session->flashdata('wrongPassword')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" style="max-width: 540px;" role="alert">
                            Password Lama <strong><?= $this->session->flashdata('wrongPassword'); ?>!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('sameOldPassword')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" style="max-width: 540px;" role="alert">
                            Password Lama dan Password Baru tidak boleh <strong><?= $this->session->flashdata('sameOldPassword'); ?>!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('passwordChanged')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" style="max-width: 540px;" role="alert">
                            Password berhasil <strong><?= $this->session->flashdata('passwordChanged'); ?>!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- end of Alerts -->

                    <div class="row">
                        <div class="col-lg-6">

                            <!-- Form -->
                            <form action="<?= base_url('user/updatePassword');  ?>" method="post">

                                <div class="form-group">
                                    <label for="currentPassword">Password Lama</label>
                                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                                    <?= form_error('currentPassword', '<small class="text-danger">', "</small>"); ?>
                                </div>

                                <div class="form-group">
                                    <label for="newPassword1">Password Baru</label>
                                    <input type="password" class="form-control" id="newPassword1" name="newPassword1">
                                    <?= form_error('newPassword1', '<small class="text-danger">', "</small>"); ?>
                                </div>

                                <div class="form-group">
                                    <label for="newPassword2">Ulangi Password Baru</label>
                                    <input type="password" class="form-control" id="newPassword2" name="newPassword2">
                                    <?= form_error('newPassword2', '<small class="text-danger">', "</small>"); ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                                </div>

                            </form>
                            <!-- end of Form -->

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->