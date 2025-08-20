<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>

        <!-- Nội dung chính -->
        <div class="col-10">
            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0 fw-bold">Quản lý danh mục</h4>
                    <a href="<?= BASE_URL ?>?action=admin-create-categories" class="btn btn-primary btn-sm">
                        ➕ Thêm mới
                    </a>
                </div>

                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">STT</th>
                            <th>Tên danh mục</th>
                            <th style="width: 180px;" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($listData)): ?>
                            <?php foreach ($listData as $key => $value): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>?action=admin-update-categories&id=<?= $value['id'] ?>" 
                                           class="btn btn-sm btn-warning me-2">
                                            ✏️ Sửa
                                        </a>
                                        <a href="<?= BASE_URL ?>?action=admin-delete-categories&id=<?= $value['id'] ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Bạn có muốn xóa không?')">
                                            🗑️ Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">Chưa có danh mục nào</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
