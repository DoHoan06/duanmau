<div class="container my-5">
    <div class="row">
        <!-- Ảnh sản phẩm -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <img src="<?= $data['image'] ?>" alt="<?= $data['name'] ?>" class="img-fluid rounded">
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h2 class="fw-bold mb-2"><?= $data['name'] ?></h2>
                <h6 class="text-warning"><?= $data['categoryName'] ?></h6>
                <p class="fs-4 text-danger fw-bold"><?= number_format($data['price']) ?> đ</p>
            </div>

            <div class="card shadow-sm p-4 mt-4">
                <h4 class="mb-3">Mô tả sản phẩm</h4>
                <p class="text-muted"><?= $data['description'] ?></p>
            </div>
        </div>
    </div>

    <!-- Đánh giá -->
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4">Đánh giá sản phẩm</h4>
                <form action="<?= BASE_URL ?>?action=client-comment-product&id=<?= $data['id'] ?>" method="post">
                    <input type="hidden" name="order_id" value="<?= $idOrder ?>">

                    <!-- Rating -->
                    <div class="mb-3">
                        <label class="form-label">Đánh giá</label>
                        <select name="rating" class="form-select w-25">
                            <option value="1">⭐ 1 sao</option>
                            <option value="2">⭐⭐ 2 sao</option>
                            <option value="3">⭐⭐⭐ 3 sao</option>
                            <option value="4">⭐⭐⭐⭐ 4 sao</option>
                            <option value="5">⭐⭐⭐⭐⭐ 5 sao</option>
                        </select>
                    </div>

                    <!-- Comment -->
                    <div class="mb-3">
                        <label class="form-label">Bình luận</label>
                        <textarea name="content" class="form-control" rows="4" placeholder="Hãy chia sẻ cảm nhận của bạn..."></textarea>
                    </div>

                    <!-- Submit -->
                    <button class="btn btn-success px-4">Gửi đánh giá</button>
                </form>
            </div>
        </div>
    </div>
</div>
