<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Tambah Barang Keluar</h2>
    <form action="<?php echo site_url('AdminGudang/storeBarangKeluar'); ?>" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
            <label for="barang_id">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="" disabled selected>Pilih Barang</option>
                <?php foreach ($barang as $item): ?>
                    <option value="<?= $item['id_barang'] ?>"><?= $item['nama_barang'] ?></option>
                <?php endforeach; ?>
            </select>
        </div> 
        <div class="form-group">
            <label for="jumlah_keluar">Jumlah Keluar</label>
            <input type="number" name="jumlah_keluar" id="jumlah_keluar" class="form-control" placeholder="Keluarkan jumlah stok barang"
                required>
        </div>
        <div class="form-group">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control"
                placeholder="Keluarkan harga barang" required>
        </div> 
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>