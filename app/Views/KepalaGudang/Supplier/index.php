<?= $this->extend('KepalaGudang/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Daftar Supplier</h2>
    <a href="<?= site_url('KepalaGudang/createSupplier'); ?>" class="btn btn-success mb-3">Tambah Supplier</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><a href="<?= base_url('uploads/');?><?= $supplier['foto']; ?>">
                        <img src="<?= base_url('uploads/');?><?= $supplier['foto']; ?>" width="100px" alt="">
                    </a>
                    </td>
                    <td><?= $supplier['nama_supplier']; ?></td>
                    <td><?= $supplier['alamat'];; ?></td>
                    <td><?= $supplier['no_telp']; ?></td>
                    <td>
                        <a href="<?= site_url('KepalaGudang/editSupplier/' .$supplier['id_supplier']); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= site_url('KepalaGudang/deleteSupplier/'. $supplier['id_supplier']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>