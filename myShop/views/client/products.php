<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <!-- Tìm kiếm -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <form action="<?= BASE_URL ?>" method="get">
                        <input type="hidden" name="action" value="client-products">
                        <h5 class="card-title mb-3">🔍 Tìm kiếm</h5>
                        <input type="text" class="form-control mb-2" placeholder="Nhập tên sản phẩm..." name="search_name">
                        <button class="btn btn-primary w-100">Tìm kiếm</button>
                    </form>
                </div>
            </div>

            <!-- Lọc theo danh mục -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">📂 Danh mục</h5>
                    <div class="list-group">
                        <?php foreach ($listCategory as $value): ?>
                            <a href="<?= BASE_URL ?>?action=client-products&search_category=<?= $value['id'] ?>"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <?= $value['name'] ?>
                                <span class="badge bg-secondary rounded-pill">›</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Lọc theo giá -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">💰 Khoảng giá</h5>
                    <form action="<?= BASE_URL ?>" method="get">
                        <input type="hidden" name="action" value="client-products">
                        <div class="input-group mb-2">
                            <span class="input-group-text">Từ</span>
                            <input type="number" class="form-control" name="search_min_price">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Đến</span>
                            <input type="number" class="form-control" name="search_max_price">
                        </div>
                        <button class="btn btn-success w-100">Lọc</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="col-md-9">
            <div class="row g-4">
                <?php foreach ($listProduct as $value): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="card h-100 shadow-sm product-card">
                            <div class="p-2">
                                <img src="<?= $value['image'] ?>"
                                    class="card-img-top img-fluid"
                                    alt="<?= $value['name'] ?>"
                                    style="height: 220px; object-fit: contain; border-radius: 8px;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title"><?= $value['name'] ?></h6>
                                <p class="card-text text-danger fw-bold"><?= number_format($value['price']) ?> đ</p>
                                <a href="<?= BASE_URL ?>?action=client-detail-products&id=<?= $value['id'] ?>"
                                    class="btn btn-outline-primary btn-sm mt-auto"> 🔎 Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Hiệu ứng hover -->
<style>
    .product-card {
        transition: all 0.3s ease-in-out;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>