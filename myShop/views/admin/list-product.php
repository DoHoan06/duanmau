<div class="container-fluid mt-3">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>

        <!-- Nội dung chính -->
        <div class="col-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">Quản lý sản phẩm</h4>
                <a href="<?= BASE_URL ?>?action=admin-create-products" class="btn btn-primary btn-sm">
                    + Thêm mới
                </a>
            </div>

            <!-- Bảng dữ liệu -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Ảnh</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listData as $key => $value): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td class="text-danger fw-bold"><?= number_format($value['price']) ?> đ</td>
                                    <td><?= $value['quantity'] ?></td>
                                    <td>
                                        <?php if ($value['image'] != ""): ?>
                                            <img src="<?= $value['image'] ?>" alt="" width="80" class="rounded shadow-sm">
                                        <?php else: ?>
                                            <span class="text-muted">Không có ảnh</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $value['description'] ?></td>
                                    <td><span class="badge bg-info"><?= $value['categoryName'] ?></span></td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>?action=admin-update-products&id=<?= $value['id'] ?>" 
                                           class="btn btn-warning btn-sm">Sửa</a>
                                        <a href="<?= BASE_URL ?>?action=admin-delete-products&id=<?= $value['id'] ?>" 
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
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
