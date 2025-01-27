<?= $this->extend('KepalaGudang/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Tambah Supplier</h2>
    <form action="<?php echo site_url('KepalaGudang/storeSupplier'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_supplier">Nama Supplier</label>
            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*" onchange="previewImage()" required>
            <img id="fotoPreview" src="#" alt="Preview Gambar" style="display: none; margin-top: 10px; max-width: 200px; max-height: 200px;">
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    function previewImage() {
        const file = document.getElementById('foto').files[0];
        const preview = document.getElementById('fotoPreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
<?= $this->endSection() ?>