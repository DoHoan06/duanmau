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
                    <h4 class="mb-0 fw-bold">Quản lý bình luận</h4>
                </div>

                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">STT</th>
                            <th style="width: 180px;">Tên</th>
                            <th style="width: 120px;">Ảnh</th>
                            <th style="width: 250px;">Mô tả</th>
                            <th style="width: 150px;">Danh mục</th>
                            <th style="width: 120px;" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($listData)): ?>
                            <?php foreach ($listData as $key => $value): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td>
                                        <?php if (!empty($value['image'])): ?>
                                            <img src="<?= $value['image'] ?>" alt="Ảnh sản phẩm" class="img-thumbnail" style="max-width:100px;">
                                        <?php else: ?>
                                            <span class="text-muted">Không có ảnh</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-truncate" style="max-width: 250px;">
                                        <?= $value['description'] ?>
                                    </td>
                                    <td><?= $value['categoryName'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>?action=admin-detail-comment&id=<?= $value['id'] ?>" 
                                           class="btn btn-info btn-sm">
                                            🔍 Chi tiết
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Chưa có sản phẩm nào</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
