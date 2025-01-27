<?= $this->extend('KepalaGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Data Gudang</h1>
    <a href="/KepalaGudang/create" class="btn btn-primary mb-3">Tambah Gudang</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gudang</th>
                <th>User ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($gudang)): ?>
                <?php foreach ($gudang as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item['nama_gudang'] ?></td>
                        <td><?= $item['user_id'] ?></td>
                        <td>
                            <a href="/KepalaGudang/edit/<?= $item['id_gudang'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/KepalaGudang/delete/<?= $item['id_gudang'] ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>