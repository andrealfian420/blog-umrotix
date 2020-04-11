                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah User Baru</h1>

                    <?php if ($this->session->flashdata('successTambah')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?= $this->session->flashdata('successTambah') ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-8">

                            <?= form_open_multipart('manage_user/tambahUser'); ?>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger">', "</small>"); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger">', "</small>"); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password1" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password1" name="password1">
                                    <?= form_error('password1', '<small class="text-danger">', "</small>"); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password2" name="password2">
                                    <?= form_error('password2', '<small class="text-danger">', "</small>"); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mt-3">
                                    <a href="<?= base_url('manage_user'); ?>" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah User Baru</button>
                                </div>
                            </div>

                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->