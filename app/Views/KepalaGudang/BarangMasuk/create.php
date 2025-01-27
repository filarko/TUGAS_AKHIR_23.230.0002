<?= $this->extend('KepalaGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Tambah Barang Masuk</h2>
    <form action="<?php echo site_url('KepalaGudang/storeBarangMasuk'); ?>" method="POST" enctype="multipart/form-data"> 
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
            <label for="jumlah_masuk">Jumlah Masuk</label>
            <input type="number" name="jumlah_masuk" id="jumlah_masuk" class="form-control" placeholder="Masukkan jumlah stok barang"
                required>
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
                placeholder="Masukkan harga barang" required>
        </div> 
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>