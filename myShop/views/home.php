<!-- Banner Carousel -->
<div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner rounded shadow">
        <div class="carousel-item active">
            <img src="assets/image/banner2.jpg" class="d-block w-100" alt="Banner 1" height="500">
        </div>
        <div class="carousel-item">
            <img src="assets/image/banner1.jpg" class="d-block w-100" alt="Banner 2" height="500">
        </div>
        <div class="carousel-item">
            <img src="assets/image/banner3.jpg" class="d-block w-100" alt="Banner 3" height="500">
        </div>
    </div>

    <!-- Nút điều hướng -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Trước</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Tiếp</span>
    </button>
</div>

<!-- Section sản phẩm nổi bật -->
<div class="container">
    <div class="mb-4 text-center">
        <h1 class="fw-bold text-primary">✨ Sản phẩm nổi bật</h1>
        <p class="text-muted">Khám phá những sản phẩm bán chạy nhất hiện nay</p>
    </div>
    <div class="row g-4">
        <!-- Sản phẩm 1 -->
        <div class="col-md-3 col-sm-6 product-card">
            <div class="card h-100 shadow-sm">
                <img src="assets/image/oppoa17.jpg" class="card-img-top" alt="Sản phẩm 1">
                <div class="card-body">
                    <h5 class="card-title">Oppo A17</h5>
                    <p class="card-text text-danger fw-bold">2,300,000 đ</p>
                    <a href="<?= BASE_URL ?>?action=client-detail-products&id=18" class="btn btn-outline-primary w-100"> 🔎 Xem chi tiết</a>
                </div>
            </div>
        </div>

        <!-- Sản phẩm 2 -->
        <div class="col-md-3 col-sm-6 product-card">
            <div class="card h-100 shadow-sm">
                <img src="assets/image/ip16pro.jpg" class="card-img-top" alt="Sản phẩm 2">
                <div class="card-body">
                    <h5 class="card-title">Iphone 16 Pro</h5>
                    <p class="card-text text-danger fw-bold">39,000,000 đ</p>
                    <a href="<?= BASE_URL ?>?action=client-detail-products&id=7" class="btn btn-outline-primary w-100"> 🔎 Xem chi tiết</a>
                </div>
            </div>
        </div>

        <!-- Sản phẩm 3 -->
        <div class="col-md-3 col-sm-6 product-card">
            <div class="card h-100 shadow-sm">
                <img src="assets/image/snxperiaxa1.jpg" class="card-img-top" alt="Sản phẩm 3">
                <div class="card-body">
                    <h5 class="card-title">Sony Xperia XA1 Ultra</h5>
                    <p class="card-text text-danger fw-bold">19,000,000 đ</p>
                    <a href="<?= BASE_URL ?>?action=client-detail-products&id=15" class="btn btn-outline-primary w-100"> 🔎 Xem chi tiết</a>
                </div>
            </div>
        </div>

        <!-- Sản phẩm 4 -->
        <div class="col-md-3 col-sm-6 product-card">
            <div class="card h-100 shadow-sm">
                <img src="assets/image/sszfold7.jpg" class="card-img-top" alt="Sản phẩm 4">
                <div class="card-body">
                    <h5 class="card-title">Samsung Galaxy Z Fold7</h5>
                    <p class="card-text text-danger fw-bold">44,990,000 đ</p>
                    <a href="<?= BASE_URL ?>?action=client-detail-products&id=12" class="btn btn-outline-primary w-100"> 🔎 Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-light py-4 mt-5">
  <div class="container text-center">
    <p>&copy; <?= date('Y') ?> MyShop. All rights reserved.</p>
  </div>
</footer> 

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