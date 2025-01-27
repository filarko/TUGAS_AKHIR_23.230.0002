<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Barang Masuk</h2>
    <form action="<?php echo site_url('AdminGudang/updateBarangMasuk/' . $barangMasuk['id_barang_masuk']); ?>"
        method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?> <!-- Untuk keamanan -->
        <div class="form-group">
            <label for="barang_id">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="" disabled>Pilih Barang</option>
                <?php foreach ($barang as $item): ?>
                    <option value="<?= $item['id_barang'] ?>" <?= $item['id_barang'] == $barangMasuk['barang_id'] ? 'selected' : '' ?>>
                        <?= $item['nama_barang'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah_masuk">Jumlah Masuk</label>
            <input type="number" name="jumlah_masuk" id="jumlah_masuk" class="form-control"
                placeholder="Masukkan jumlah stok barang" value="<?= $barangMasuk['jumlah_masuk'] ?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
                value="<?= $barangMasuk['tanggal_masuk'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?php echo site_url('AdminGudang/BarangMasuk'); ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>