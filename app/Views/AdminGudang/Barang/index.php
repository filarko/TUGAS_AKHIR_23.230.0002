<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Daftar Barang</h2>
    <a href="<?php echo site_url('AdminGudang/createBarang'); ?>" class="btn btn-success mb-3">Tambah Barang</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Satuan</th>
                <th>Gudang</th>
                <th>Stok</th>
                <th>Harga Barang</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($barang as $item): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $item['nama_barang']; ?></td>
                    <td><?= $item['nama_jenis']; ?></td>
                    <td><?= $item['nama_satuan']; ?></td>
                    <td><?= $item['nama_gudang']; ?></td>
                    <td><?= $item['stok']; ?></td>
                    <td><?= number_format($item['harga_barang'], 0, ',', '.'); ?></td>
                    <td>
                        <?php if (!empty($item['image'])): ?>
                            <img src="<?= base_url('uploads/' . $item['image']); ?>" alt="<?= $item['image']; ?>"
                                class="img-thumbnail" width="100">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo site_url('AdminGudang/editBarang/' . $item['id_barang']); ?>"
                            class="btn btn-warning">Edit</a>
                        <a href="<?php echo site_url('AdminGudang/deleteBarang/' . $item['id_barang']); ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>