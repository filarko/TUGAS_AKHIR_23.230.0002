<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Barang keluar</h2>
    <form action="<?php echo site_url('AdminGudang/updateBarangKeluar/' . $barangkeluar['id_barang_keluar']); ?>"
        method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?> <!-- Untuk keamanan -->
        <div class="form-group">
            <label for="barang_id">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="" disabled>Pilih Barang</option>
                <?php foreach ($barang as $item): ?>
                    <option value="<?= $item['id_barang'] ?>" <?= $item['id_barang'] == $barangkeluar['barang_id'] ? 'selected' : '' ?>>
                        <?= $item['nama_barang'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah_keluar">Jumlah keluar</label>
            <input type="number" name="jumlah_keluar" id="jumlah_keluar" class="form-control"
                placeholder="keluarkan jumlah stok barang" value="<?= $barangkeluar['jumlah_keluar'] ?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal_keluar">Tanggal keluar</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control"
                value="<?= $barangkeluar['tanggal_keluar'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?php echo site_url('AdminGudang/BarangKeluar'); ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>