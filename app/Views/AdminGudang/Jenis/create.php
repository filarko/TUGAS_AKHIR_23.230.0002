<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Tambah Jenis</h1>
    <form action="/AdminGudang/storeJenis" method="post">
        <div class="mb-3">
            <label for="nama_jenis" class="form-label">Nama Jenis</label>
            <input type="text" name="nama_jenis" id="nama_jenis" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/AdminGudang/jenis" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>