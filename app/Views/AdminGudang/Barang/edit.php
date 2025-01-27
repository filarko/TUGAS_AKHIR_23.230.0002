<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Barang</h2>
    <form action="<?= site_url('AdminGudang/updateBarang/' . $barang['id_barang']); ?>" method="post"
        enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                value="<?= $barang['nama_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label for="jenis_id">Jenis</label>
            <select name="jenis_id" id="jenis_id" class="form-control" required>
                <option value="">Pilih Jenis</option>
                <?php foreach ($jenis as $item): ?>
                    <option value="<?= $item['id_jenis']; ?>" <?= $barang['jenis_id'] == $item['id_jenis'] ? 'selected' : ''; ?>>
                        <?= $item['nama_jenis']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="satuan_id">Satuan</label>
            <select name="satuan_id" id="satuan_id" class="form-control" required>
                <option value="">Pilih Satuan</option>
                <?php foreach ($satuan as $item): ?>
                    <option value="<?= $item['id_satuan']; ?>" <?= $barang['satuan_id'] == $item['id_satuan'] ? 'selected' : ''; ?>>
                        <?= $item['nama_satuan']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="gudang_id">Gudang</label>
            <select name="gudang_id" id="gudang_id" class="form-control" required>
                <option value="">Pilih Gudang</option>
                <?php foreach ($gudang as $item): ?>
                    <option value="<?= $item['id_gudang']; ?>" <?= $barang['gudang_id'] == $item['id_gudang'] ? 'selected' : ''; ?>>
                        <?= $item['nama_gudang']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="<?= $barang['stok']; ?>" required>
        </div>
        <div class="form-group">
            <label for="harga_barang">Harga Barang</label>
            <input type="number" name="harga_barang" id="harga_barang" class="form-control"
                value="<?= $barang['harga_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
            <?php if (!empty($barang['image'])): ?>
                <img src="<?= base_url('uploads/' . $barang['image']); ?>" alt="<?= $barang['nama_barang']; ?>"
                    class="img-thumbnail mt-2" width="200">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>