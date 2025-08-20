<div class="container-fluid mt-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>

        <!-- Nội dung chính -->
        <div class="col-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">Quản lý người dùng</h4>
                <a href="<?= BASE_URL ?>?action=admin-create-users" class="btn btn-success btn-sm">
                    + Thêm mới
                </a>
            </div>

            <!-- Bảng người dùng -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>STT</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listData as $key => $value): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td><?= $value['phone'] ?></td>
                                    <td><?= $value['address'] ?></td>
                                    <td>
                                        <?php if ($value['role'] == "0"): ?>
                                            <span class="badge bg-secondary">User</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Admin</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>?action=admin-update-users&id=<?= $value['id'] ?>" 
                                           class="btn btn-warning btn-sm">Sửa</a>
                                        <?php if ($_SESSION['userLogin']['id'] != $value['id']): ?>
                                            <a href="<?= BASE_URL ?>?action=admin-delete-users&id=<?= $value['id'] ?>" 
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
