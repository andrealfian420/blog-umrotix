<!-- Content -->
<div class="container mt-3 mt-md-1 content-blog">
    <div class="row">
        <!-- Left Content -->
        <div class="col-md-8 col-lg-8 ">
            <div class="row mb-3 ml-2 ml-md-0">
                <h3>Hasil Pencarian keyword "<?= $this->input->post('keyword'); ?>" :</h3>
            </div>
            <?php if (!$articles) : ?>
                <div class="row">
                    <div class="col-8 mt-3">
                        <div class="text-danger">
                            <h4>Artikel tidak ditemukan</h4>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php foreach ($articles as $atkl) : ?>
                <div class="row">
                    <div class="col-11">
                        <div class="search-content">
                            <img src="<?= base_url('assets/content-img/' . $atkl['image']) ?>" alt="<?= $atkl['image']; ?>" class="search-img">
                            <div class="search-overlay"></div>
                            <div class="search-title">
                                <div class="kategori d-none d-lg-inline mr-1">
                                    <a href="#">
                                        <?php $kategori = $this->db->get_where('kategori', ['id' => $atkl['kategori_id']])->row_array();
                                        echo $kategori['kategori']; ?>
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="<?php echo base_url('artikel/' . $atkl['slug']); ?>">
                                        <?php if (strlen($atkl['nama_artikel']) > 40) {
                                            $fixed = substr($atkl['nama_artikel'], 0, 40) . '...';
                                            echo $fixed;
                                        } else {
                                            echo $atkl['nama_artikel'];
                                        }
                                        ?>
                                    </a>
                                </div>
                            </div>
                            <div class="search-subtitle">
                                <?php $date = date('d M Y', strtotime($atkl['created_at']));
                                echo $date; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

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
                                    <p class="right-title">
                                        <a href="<?= base_url('artikel/' . $old['slug']) ?>">
                                            <?php if (strlen($old['nama_artikel']) > 25) {
                                                $fixed = substr($old['nama_artikel'], 0, 25) . '...';
                                                echo $fixed;
                                            } else {
                                                echo $old['nama_artikel'];
                                            }
                                            ?>
                                        </a>
                                    </p>
                                    <p class="right-post-date d-none d-xl-block">
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
</div>
<!-- End of Content -->