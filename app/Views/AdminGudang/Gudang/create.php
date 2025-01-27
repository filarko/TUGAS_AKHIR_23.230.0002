<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Tambah Gudang</h1>
    <form action="/AdminGudang/store" method="post">
        <div class="mb-3">
            <label for="nama_gudang" class="form-label">Nama Gudang</label>
            <input type="text" name="nama_gudang" id="nama_gudang" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/AdminGudang/gudang" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>