<?= $this->extend('KepalaGudang/layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4">Daftar User</h1>

    <!-- Button Tambah User -->
    <a href="<?= site_url('KepalaGudang/createUser') ?>" class="btn btn-primary mb-3">Tambah User</a>

    <!-- Tabel Daftar User -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id_user'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td>
                        <?php
                        // Menampilkan role berdasarkan nilai
                        if ($user['role'] == 1) {
                            echo 'AdminGudang';
                        } elseif ($user['role'] == 2) {
                            echo 'KepalaGudang';
                        } else {
                            echo 'Unknown';
                        }
                        ?>
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <a href="<?= site_url('KepalaGudang/editUser/' . $user['id_user']) ?>"
                            class="btn btn-warning btn-sm">Edit</a>
                        <!-- Delete Button -->
                        <a href="<?= site_url('KepalaGudang/deleteUser/' . $user['id_user']) ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>  