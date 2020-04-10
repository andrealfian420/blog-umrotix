                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update Profil</h1>

                    <?php if ($this->session->flashdata('successUpdate')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?= $this->session->flashdata('successUpdate') ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('failedUpload')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?= $this->session->flashdata('failedUpload') ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-8">

                            <?= form_open_multipart('user/update'); ?>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="nama" value="<?= $user['nama']; ?>">
                                    <?= form_error('name', '<small class="text-danger">', "</small>"); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">Foto Profil</div>

                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 mt-3">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                                </div>
                            </div>

                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->