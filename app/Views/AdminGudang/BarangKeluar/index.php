<?= $this->extend('AdminGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Daftar Barang Keluar</h2>
    <a href="<?= site_url('AdminGudang/createBarangKeluar'); ?>" class="btn btn-success mb-3">Tambah Barang Keluar</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Tanggal Keluar</th>
                <th>User ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($barangKeluar as $item): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $item['nama_barang']; ?></td> <!-- Menampilkan nama barang -->
                    <td><?= $item['jumlah_keluar']; ?></td>
                    <td><?= $item['tanggal_keluar']; ?></td>
                    <td><?= $item['user_id']; ?></td>
                    <td>
                        <a href="<?= site_url('AdminGudang/editBarangKeluar/' . $item['id_barang_keluar']); ?>"
                            class="btn btn-warning">Edit</a>
                        <a href="<?= site_url('AdminGudang/deleteBarangKeluar/' . $item['id_barang_keluar']); ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>