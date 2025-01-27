<?= $this->extend('KepalaGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Edit Gudang</h1>
    <form action="/KepalaGudang/update/<?= $gudang['id_gudang'] ?>" method="post">
        <div class="mb-3">
            <label for="nama_gudang" class="form-label">Nama Gudang</label>
            <input type="text" name="nama_gudang" id="nama_gudang" class="form-control"
                value="<?= $gudang['nama_gudang'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/KepalaGudang/gudang" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>