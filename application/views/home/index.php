    <!-- Navbar Umrotix -->
    <div class="header">
        <div class="container">
            <a class="navbar-brand d-none d-md-block text-center" href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/logo-umrotix@2x.png') ?>" alt="Logo Umrotix"></a>
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="<?= base_url(); ?>" class="d-xs-block d-sm-block d-md-none mx-auto"><img class="logoMini" src="<?= base_url('assets/img/logo-umrotix@2x.png') ?>" alt="Logo Umrotix"></a>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto mr-5">
                        <a class="nav-item nav-link mx-md-2" href="<?= base_url(); ?>">Beranda</a>
                        <a class="nav-item nav-link mx-md-2" href="#">Kisah Agen</a>
                        <a class="nav-item nav-link mx-md-2" href="#">Testimoni</a>
                        <a class="nav-item nav-link mx-md-2" href="#">Perusahaan</a>
                        <a class="nav-item nav-link mx-md-2" href="#">Tentang</a>
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
                            <div class="upper-overlay"></div>
                            <div class="upper-title">
                                <div class="kategori d-none d-lg-inline mr-1">
                                    <a href="#">
                                        <?php $kategori = $this->db->get_where('kategori_temp', ['id' => $artikel_baru['kategori_id']])->row_array();
                                        echo $kategori['kategori']; ?>
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="<?php echo base_url('artikel/' . $artikel_baru['slug']); ?>">
                                        <?= $artikel_baru['nama_artikel']; ?>
                                        <!-- Jangan minum diwaktu siang Lorem Ipusm Doral siang Lorem Ipusm Doral -->
                                    </a>
                                </div>
                            </div>
                            <div class="upper-subtitle">
                                <?php $date = date('d M Y', strtotime($artikel_baru['created_at']));
                                echo $date; ?>
                            </div>
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
                <div class="row">
                    <div class="col">
                        <?php foreach ($artikel_lama as $old) : ?>
                            <div class="right-content mt-3">
                                <div class="row">
                                    <div class="col-7">
                                        <img src="<?= base_url('assets/content-img/' . $old['image']); ?>" alt="<?= $old['image']; ?>" class="right-img">
                                    </div>
                                    <div class="col-5">
                                        <p class="right-title"><a href="<?= base_url('artikel/' . $old['slug']) ?>"><?= $old['nama_artikel']; ?></a></p>
                                        <p class="right-post-date">
                                            <?php $date = date('d M Y', strtotime($old['created_at']));
                                            echo $date; ?>
                                        </p>
                                    </div>
                                </div>
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
                        <img src="<?= base_url('assets/content-img/' . $low['image']); ?>" alt="<?= $low['image']; ?>" class="lower-img mt-2 mt-md-0">
                        <div class="lower-overlay"></div>
                        <h4 class="lower-title"><a href="<?= base_url('artikel/' . $low['slug']) ?>"><?= $low['nama_artikel']; ?></a></h4>
                        <h6 class="lower-subtitle">
                            <?php $date = date('d M Y', strtotime($low['created_at']));
                            echo $date; ?>
                        </h6>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- End of Lower Content -->
    </div>
    <!-- End of Content -->

    <!-- Footer -->
    <footer class="section-footer mt-5">

        <div class="container-fluid mt-3 mt-lg-0">
            <div class="row">
                <div class="col-lg-3 text-center copyright">
                    &copy; 2019 - 2020, PT Umrotix Mitra Digital
                </div>
                <div class="col-lg-7 footer-link">
                    <a href="https://umrotix.com/">Tentang</a>
                    <a href="https://umrotix.com/">Paket Umroh</a>
                    <a href="https://umrotix.com/">Cara Pembayaran</a>
                    <a href="https://umrotix.com/">FAQ</a>
                    <a href="https://umrotix.com/">Syarat dan Ketentuan</a>
                    <a href="https://umrotix.com/">Kebijakan Privasi</a>
                </div>
                <div class="col-lg-2 sosmed-umrotix">
                    <a href="https://facebook.com/umrotix/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://twitter.com/umrotix" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/umrotix/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/umrotix/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.youtube.com/channel/UC5s2redp7wyvHImlxzAXBjg" target="_blank"><i class="fab fa-youtube"></i></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->