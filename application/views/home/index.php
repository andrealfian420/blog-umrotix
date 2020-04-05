    <!-- Navbar Umrotix -->
    <div class="container">
        <a class="navbar-brand d-none d-md-block text-center" href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/logo-umrotix.png'); ?>" alt="Logo Umrotix"></a>
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="<?= base_url(); ?>" class="d-xs-block d-sm-block d-md-none mx-auto"><img class="logoMini" src="<?= base_url('assets/img/logo-umrotix.png'); ?>" alt="Logo Umrotix"></a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto mr-5">
                    <a class="nav-item nav-link mx-md-2" href="<?= base_url(); ?>">Home</a>
                    <a class="nav-item nav-link mx-md-2" href="#">Stories</a>
                    <a class="nav-item nav-link mx-md-2" href="#">Company</a>
                    <a class="nav-item nav-link mx-md-2" href="#">Community</a>
                    <a class="nav-item nav-link mx-md-2" href="#">Testimony</a>
                    <a class="nav-item nav-link mx-md-2" href="#">About</a>
                </div>

                <!-- Mobile button -->
                <form class="form-inline d-sm-block d-md-none" action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Cari artikel..">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <!-- End of Navbar Umrotix -->

    <!-- Content -->
    <div class="container mt-3 mt-md-1 content-blog">
        <div class="row">
            <!-- Left Content -->
            <div class="col-md-8 col-lg-8 ">
                <div class="row">
                    <div class="col-12">
                        <div class="upper-content">
                            <img src="<?= base_url('assets/content-img/' . $artikel_baru['image']) ?>" alt="<?= $artikel_baru['image']; ?>" class="upper-img">
                            <h3 class="upper-title">
                                <a href="#" class="badge badge-secondary kategori d-none d-lg-inline mr-1">
                                    <?php $kategori = $this->db->get_where('kategori_temp', ['id' => $artikel_baru['kategori_id']])->row_array();
                                    echo $kategori['kategori']; ?>
                                </a>
                                <a href="<?php echo base_url('artikel/' . $artikel_baru['slug']); ?>"><?= $artikel_baru['nama_artikel']; ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <?php foreach ($artikel_tengah as $mid) : ?>
                        <div class="col-md-4 mt-2">
                            <div class="middle-content">
                                <img src="<?php echo base_url('assets/content-img/' . $mid['image']); ?>" alt="<?php echo $mid['image']; ?>" class="middle-img mt-0 mt-md-2">
                                <h5 class="middle-title mt-2 mt-md-0 text-center"><a href="<?php echo base_url('artikel/' . $mid['slug']) ?>"><?php echo $mid['nama_artikel']; ?></a></h5>
                                <small class="text-muted middle-subtitle">
                                    <?php $date = date('d F Y', strtotime($mid['created_at']));
                                    echo $date; ?>
                                </small>
                                <p class="middle-news"><?php echo $mid['artikel_short'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- End of Left Content -->
            <!-- Right Content -->
            <div class="col-md-4 col-lg-4">
                <div class="row d-none d-md-block">
                    <div class="col search-bar">
                        <form action="" method="post">
                            <input type="text" class="form-control search-input" placeholder="Cari Artikel" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-search" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="right-content-header border mt-2 mt-md-0">
                            <h4 class="right-content-header-title">Other Posts</h4>
                        </div>
                        <?php foreach ($artikel_lama as $old) : ?>
                            <div class="right-content mt-4">
                                <img src="<?= base_url('assets/content-img/' . $old['image']); ?>" alt="<?= $old['image']; ?>" class="right-img">
                                <h6 class="right-title"><a href="<?= base_url('artikel/' . $old['slug']) ?>"><?= $old['nama_artikel']; ?></a></h6>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- End of Right Content -->
        </div>
        <!-- Lower Content -->
        <div class="row mt-3 lower-container">
            <?php foreach ($artikel_bawah as $low) : ?>
                <div class="col-md-6 col-lg-6">
                    <div class="lower-content">
                        <img src="<?= base_url('assets/content-img/' . $low['image']); ?>" alt="<?= $low['image'] ?>" class="lower-img mt-2 mt-md-0">
                        <h4 class="lower-title"><a href="<?= base_url('artikel/' . $low['slug']) ?>"><?= $low['nama_artikel'] ?></a></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- End of Lower Content -->
    </div>
    <!-- End of Content -->

    <!-- Footer -->
    <footer class="section-footer mt-5 pb-3">
        <div class="container pt-5 pb-2">
            <div class="row justify-content-center mt-md-5">
                <div class="col-md-5 d-none d-md-block">
                    <img src="<?= base_url('assets/img/umro.png'); ?>" alt="umro" class="img-footer">
                </div>
                <div class="col-md-4 text-center text-md-left">
                    <h5>About Us</h5>
                    <ul class="list-unstyled">
                        <li>PT. Umrotix Mitra Digital</li>
                        <li>Gedung Ariobimo Sentral, Block71 Lt. 8, Kuningan, Jakarta.</li>
                        <li>081292925696</li>
                    </ul>
                </div>
                <div class="col-md-3 text-center text-md-left mt-3 mt-md-0">
                    <h5>Our Social Media</h5>
                    <div class="sosmed">
                        <a target="_blank" href="https://instagram.com/umrotix"><img src="<?= base_url('assets/img/ig.png'); ?>" alt="Instagram"></a>
                        <a target="_blank" href="https://facebook.com/umrotix"><img src="<?= base_url('assets/img/fb.png'); ?>" alt="Facebook"></a>
                        <a target="_blank" href="https://twitter.com/umrotix"><img src="<?= base_url('assets/img/twit.png'); ?>" alt="Twitter"></a>
                        <a target="_blank" href="https://www.youtube.com/channel/UC5s2redp7wyvHImlxzAXBjg/featured"><img src="<?= base_url('assets/img/you.png'); ?>" alt="Youtube"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid footer-title mt-5 mt-md-0">
            <div class="row justify-content-center">
                <div class="col text-center">
                    Made with &hearts; by Umrotix
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->