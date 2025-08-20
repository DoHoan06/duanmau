<div class="container my-5">
    <div class="row">
        <!-- Hình ảnh sản phẩm -->
        <div class="col-md-5">
            <div class="border rounded p-3 bg-white shadow-sm">
                <img src="<?= $data['image'] ?>" alt="<?= $data['name'] ?>"
                    class="img-fluid rounded"
                    style="height: 350px; object-fit: contain;">
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-7">
            <h2 class="fw-bold"><?= $data['name'] ?></h2>
            <span class="badge bg-warning text-dark mb-2"><?= $data['categoryName'] ?></span>
            <h4 class="text-danger mt-2"><?= number_format($data['price']) ?> đ</h4>
            <p class="text-muted">Số lượng còn: <strong><?= $data['quantity'] ?></strong></p>

            <form class="d-flex align-items-center mt-4" action="<?= BASE_URL ?>" method="get">
                <input type="hidden" name="action" value="client-add-to-cart">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <div class="me-3" style="width: 100px;">
                    <input type="number" class="form-control" value="1" min="1" max="<?= $data['quantity'] ?>" name="quantity">
                </div>

                <?php if (isset($_SESSION['userLogin'])): ?>
                    <button class="btn btn-danger px-4" type="submit">🛒 Thêm vào giỏ</button>
                <?php else: ?>
                    <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal" data-bs-target="#modalLogin">
                        🛒 Thêm vào giỏ
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <!-- Mô tả sản phẩm -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-3">📖 Mô tả sản phẩm</h3>
            <div class="border rounded p-3 bg-light">
                <?= nl2br($data['description']) ?>
            </div>
        </div>
    </div>

    <!-- Bình luận -->
    <?php
    $comment = new Comment();
    $listComment = $comment->findCommentByProductId($data['id']);
    ?>
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-3">💬 Bình luận sản phẩm</h3>
            <?php if ($listComment): ?>
                <?php foreach ($listComment as $cmt): ?>
                    <div class="border rounded p-3 mb-3 bg-white shadow-sm">
                        <div class="d-flex justify-content-between">
                            <strong><?= htmlspecialchars($cmt['user_name'] ?? 'Người dùng ẩn danh') ?></strong>
                            <span class="text-warning">⭐ <?= $cmt['rating'] ?>/5</span>
                        </div>
                        <p class="mt-2 mb-0"><?= nl2br(htmlspecialchars($cmt['content'])) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">Chưa có bình luận nào.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Sản phẩm cùng loại -->
    <div class="row mt-5">
        <h3 class="mb-4">🛍️ Sản phẩm cùng loại</h3>
        <?php foreach ($listOtherProduct as $value): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="<?= $value['image'] ?>" class="card-img-top" alt="<?= $value['name'] ?>" style="height: 200px; object-fit: contain;">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title"><?= $value['name'] ?></h6>
                        <p class="card-text text-danger fw-bold"><?= number_format($value['price']) ?> đ</p>
                        <a href="<?= BASE_URL ?>?action=client-detail-products&id=<?= $value['id'] ?>" class="btn btn-outline-primary btn-sm mt-auto">
                            🔎 Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal đăng nhập -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Thông báo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Bạn chưa đăng nhập, vui lòng đăng nhập để mua sản phẩm!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <a href="<?= BASE_URL ?>?action=login" class="btn btn-primary">Đăng nhập</a>
            </div>
        </div>
    </div>
</div>