<?= $this->extend('KepalaGudang/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Data Jenis</h1>
    <a href="/KepalaGudang/createJenis" class="btn btn-primary mb-3">Tambah Jenis</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jenis</th>
                <th>User ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($jenis)): ?>
                <?php foreach ($jenis as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item['nama_jenis'] ?></td>
                        <td><?= $item['user_id'] ?></td>
                        <td>
                            <a href="/KepalaGudang/editJenis/<?= $item['id_jenis'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/KepalaGudang/deleteJenis/<?= $item['id_jenis'] ?>" class="btn btn-danger btn-sm"
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