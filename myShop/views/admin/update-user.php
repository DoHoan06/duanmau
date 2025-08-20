<div class="container">
    <div class="row">
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>
        <div class="col-10">
            <!-- Nội dung chính -->
            <form action="<?= BASE_URL ?>?action=admin-update-users&id=<?= $data['id'] ?>" method="post">
                <div class="mb-4">
                    <label for="">Tên người dùng</label>
                    <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $data['email'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-4">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="<?= $data['phone'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="<?= $data['address'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Vai trò</label>
                    <select name="role" class="form-control">
                        <option value="0"
                            <?php if ($data['role'] == "0"): ?>
                            selected
                            <?php endif; ?>>User</option>
                        <option value="1" <?php if ($data['role'] == "1"): ?>
                            selected
                            <?php endif; ?>>Admin</option>
                    </select>
                </div>
                <button class="btn btn-warning btn-sm">Chỉnh sửa</button>
            </form>
        </div>
    </div>
</div>