<?= $this->extend('KepalaGudang/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Supplier</h2>
    <form action="<?= site_url('KepalaGudang/updateSupplier/' . $supplier['id_supplier']); ?>" method="post"
        enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_supplier">Nama Supplier</label>
            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control"
                value="<?= $supplier['nama_supplier']; ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required><?= $supplier['alamat']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*" onchange="previewImage()">
            <!-- Pratinjau gambar -->
            <img id="fotoPreview" src="<?= base_url('uploads/' . $supplier['foto']); ?>" alt="Foto Supplier"
                style="margin-top: 10px; max-width: 200px; max-height: 200px;">
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= $supplier['no_telp']; ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    function previewImage() {
        const file = document.getElementById('foto').files[0];
        const preview = document.getElementById('fotoPreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>

<?= $this->endSection() ?>