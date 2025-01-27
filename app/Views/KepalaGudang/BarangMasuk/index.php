<?= $this->extend('KepalaGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Daftar Barang Masuk</h2>
    <a href="<?= site_url('KepalaGudang/createBarangMasuk'); ?>" class="btn btn-success mb-3">Tambah Barang Masuk</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Tanggal Masuk</th>
                <th>User ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($barangMasuk as $item): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $item['nama_barang']; ?></td> <!-- Menampilkan nama barang -->
                    <td><?= $item['jumlah_masuk']; ?></td>
                    <td><?= $item['tanggal_masuk']; ?></td>
                    <td><?= $item['user_id']; ?></td>
                    <td>
                        <a href="<?= site_url('KepalaGudang/editBarangMasuk/' . $item['id_barang_masuk']); ?>"
                            class="btn btn-warning">Edit</a>
                        <a href="<?= site_url('KepalaGudang/deleteBarangMasuk/' . $item['id_barang_masuk']); ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
