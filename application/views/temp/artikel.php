<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Artikel</title>
</head>
<!-- CSS -->
<style type="text/css">
    .cke_textarea_inline {
        border: 1px solid black;
    }
</style>

<body>
    <!-- Validation errors -->
    <?php if (validation_errors()) {
        echo validation_errors();
    } ?>

    <!-- Upload Failed -->
    <?php if ($this->session->flashdata('uploadFailed')) {
        echo $this->session->flashdata('uploadFailed');
    } ?>

    <!-- Success Insert -->
    <?php if ($this->session->flashdata('successInsert')) {
        echo $this->session->flashdata('successInsert');
    } ?>

    <form action="<?= base_url('posting_temp/artikel'); ?>" method="post" enctype="multipart/form-data">

        <label for="nama_kategori">Nama Kategori</label>
        <select name="kategori_id" id="nama_kategori" required>
            <option value="">--Pilih Kategori--</option>
            <?php foreach ($kategori as $ktgr) : ?>
                <option value="<?= $ktgr['id'] ?>"><?= $ktgr['kategori'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="nama_author">Nama Author</label>
        <select name="author" id="nama_author" required>
            <option value="">--Pilih Author--</option>
            <option value="Umar">Umar</option>
            <option value="Rohaya">Rohaya</option>
        </select>
        <br>

        <label for="nama_artikel">Nama Artikel</label>
        <input type="text" name="nama_artikel" id="nama_artikel" style="width: 300px" required>
        <br>

        <label for="artikel_short">Isi Artikel Pendek (Maks. 100 karakter)</label>
        <br>
        <textarea name="artikel_short" id="artikel_short" maxlength="100" style="width:300px; resize:vertical;"></textarea>
        <br>

        <label for="artikel_text">Isi Artikel</label>
        <textarea name="artikel_text" id="artikel_text"></textarea>
        <br>

        <label for="image">Gambar Artikel (Maks. Size 2MB)</label>
        <input type="file" name="image" id="image">
        <br>

        <button type="submit">Publish</button>
        <button><a style="text-decoration: none; color:#000;" href="<?= base_url('posting_temp'); ?>">Kembali</a></button>
    </form>

    <script src="<?= base_url('vendor/ckeditor/ckeditor.js'); ?>"></script>

    <script>
        // Initialize ckeditor

        CKEDITOR.replace('artikel_text', {
            width: '900px',
            height: '300px'
        });
    </script>
</body>

</html>