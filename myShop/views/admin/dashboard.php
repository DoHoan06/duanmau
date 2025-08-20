<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>

        <!-- Nội dung chính -->
        <div class="col-10 bg-light">
            <!-- Header -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 mb-4">
                <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
                <div class="ms-auto">
                    <span class="me-3">Xin chào, Admin</span>
                    <a href="<?= BASE_URL ?>?action=logout" class="btn btn-outline-danger btn-sm">Đăng xuất</a>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="container-fluid">
                <div class="row g-4 mb-4">
                    <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="card shadow border-0 p-3">
                            <h5 class="fw-bold text-primary">Sản phẩm</h5>
                            <p class="fs-4 fw-bold">120</p>
                            <small class="text-muted">Tổng số sản phẩm</small>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card shadow border-0 p-3">
                            <h5 class="fw-bold text-success">Đơn hàng</h5>
                            <p class="fs-4 fw-bold">85</p>
                            <small class="text-muted">Đơn hàng trong tháng</small>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="card shadow border-0 p-3">
                            <h5 class="fw-bold text-warning">Khách hàng</h5>
                            <p class="fs-4 fw-bold">250</p>
                            <small class="text-muted">Người dùng đăng ký</small>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-3">
                        <div class="card shadow border-0 p-3">
                            <h5 class="fw-bold text-danger">Doanh thu</h5>
                            <p class="fs-4 fw-bold">15,200,000 đ</p>
                            <small class="text-muted">Doanh thu tháng</small>
                        </div>
                    </div>
                </div>

                <!-- Biểu đồ -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow border-0 p-4">
                            <h5 class="fw-bold mb-3">Thống kê doanh thu</h5>
                            <canvas id="revenueChart" height="120"></canvas>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow border-0 p-4">
                            <h5 class="fw-bold mb-3">Tỷ lệ sản phẩm</h5>
                            <canvas id="productChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Doanh thu theo tháng
    const ctx = document.getElementById('revenueChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6'],
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: [3000000, 5000000, 4000000, 7000000, 6000000, 8000000],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0,123,255,0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: true } }
        }
    });

    // Biểu đồ tròn sản phẩm
    const ctx2 = document.getElementById('productChart');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Điện thoại', 'Laptop', 'Phụ kiện'],
            datasets: [{
                label: 'Sản phẩm',
                data: [50, 30, 20],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
