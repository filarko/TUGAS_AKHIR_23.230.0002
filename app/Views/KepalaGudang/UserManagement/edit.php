<?= $this->extend('KepalaGudang/layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4">Edit User</h1>

    <form action="<?= site_url('KepalaGudang/updateUser/' . $user['id_user']) ?>" method="POST">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>AdminGudang</option>
                <option value="2" <?= $user['role'] == 2 ? 'selected' : '' ?>>KepalaGudang</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">Nomor Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= $user['no_telp'] ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>"
                required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" <?= $user['is_active'] ? 'checked' : '' ?>>
            <label for="is_active" class="form-check-label">Aktif</label>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>

<?= $this->endSection() ?>