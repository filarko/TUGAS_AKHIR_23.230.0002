<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Tambah Satuan</h1>
    <form action="/AdminGudang/storeSatuan" method="post">
        <div class="mb-3">
            <label for="nama_satuan" class="form-label">Nama Satuan</label>
            <input type="text" name="nama_satuan" id="nama_satuan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/AdminGudang/satuan" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>