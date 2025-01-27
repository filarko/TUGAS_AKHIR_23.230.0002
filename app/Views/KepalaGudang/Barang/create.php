<?= $this->extend('KepalaGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Tambah Barang</h2>
    <form action="<?php echo site_url('KepalaGudang/storeBarang'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                placeholder="Masukkan nama barang" required>
        </div>
        <div class="form-group">
            <label for="jenis_id">Jenis</label>
            <select name="jenis_id" id="jenis_id" class="form-control" required>
                <option value="" disabled selected>Pilih Jenis</option>
                <?php foreach ($jenis as $item): ?>
                    <option value="<?= $item['id_jenis'] ?>"><?= $item['nama_jenis'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="satuan_id">Satuan</label>
            <select name="satuan_id" id="satuan_id" class="form-control" required>
                <option value="" disabled selected>Pilih Satuan</option>
                <?php foreach ($satuan as $item): ?>
                    <option value="<?= $item['id_satuan'] ?>"><?= $item['nama_satuan'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="gudang_id">Gudang</label>
            <select name="gudang_id" id="gudang_id" class="form-control" required>
                <option value="" disabled selected>Pilih Gudang</option>
                <?php foreach ($gudang as $item): ?>
                    <option value="<?= $item['id_gudang'] ?>"><?= $item['nama_gudang'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan jumlah stok barang"
                required>
        </div>
        <div class="form-group">
            <label for="harga_barang">Harga Barang</label>
            <input type="number" name="harga_barang" id="harga_barang" class="form-control"
                placeholder="Masukkan harga barang" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>