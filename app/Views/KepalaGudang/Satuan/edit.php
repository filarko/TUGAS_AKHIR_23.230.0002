<?= $this->extend('KepalaGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Edit Satuan</h1>
    <form action="/KepalaGudang/updateSatuan/<?= $satuan['id_satuan'] ?>" method="post">
        <div class="mb-3">
            <label for="nama_satuan" class="form-label">Nama Satuan</label>
            <input type="text" name="nama_satuan" id="nama_satuan" class="form-control"
                value="<?= $satuan['nama_satuan'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/KepalaGudang/satuan" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>