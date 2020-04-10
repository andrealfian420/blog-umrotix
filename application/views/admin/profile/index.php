                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Profil Saya</h1>

                    <?php if ($this->session->flashdata('successUpdate')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" style="max-width: 540px;" role="alert">
                            Your profile has been <strong><?= $this->session->flashdata('successUpdate'); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('failedUpload')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" style="max-width: 540px;" role="alert">
                            <strong><?= $this->session->flashdata('failedUpload'); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/' . $user['image'])  ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['nama'];  ?></h5>
                                    <p class="card-text"><?= $user['email'] ?></p>
                                    <p class="card-text">
                                        <?php $role = $this->db->get_where('user_role', ['id' => $user['role_id']])->row_array();
                                        echo $role['role'];
                                        ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->