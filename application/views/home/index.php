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
                                    <?php $kategori = $this->db->get_where('kategori', ['id' => $artikel_baru['kategori_id']])->row_array();
                                    echo $kategori['kategori']; ?>
                                </a>
                            </div>
                            <div class="title">
                                <a href="<?php echo base_url('artikel/' . $artikel_baru['slug']); ?>">
                                    <?= $artikel_baru['nama_artikel']; ?>
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
                            <div class="middle-news">
                                <?php $short = str_replace('&nbsp;', " ", $mid['artikel_text']);
                                $fixed_short = substr(strip_tags($short), 0, 100) . '...';
                                echo $fixed_short; ?>
                            </div>
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
                    <form action="<?= base_url('home/cari') ?>" method="post">
                        <input type="text" class="form-control search-input" name="keyword" placeholder="Cari Artikel" aria-describedby="button-addon2">
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