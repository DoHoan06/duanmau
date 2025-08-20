<div class="container">
    <div class="row">
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>
        <div class="col-10">
            <!-- Nội dung chính -->
            <form action="<?= BASE_URL ?>?action=admin-create-users" method="post">
                <div class="mb-4">
                    <label for="">Tên người dùng</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-4">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="mb-4">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-4">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="mb-4">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="mb-4">
                    <label for="">Vai trò</label>
                    <select name="role" class="form-control">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-sm">Thêm mới</button>
            </form>
        </div>
    </div>
</div>