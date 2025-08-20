<div class="container my-5">
    <div class="row">
        <!-- Giỏ hàng -->
        <div class="col-lg-9">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">Giỏ hàng của bạn</h5>
                </div>
                <div class="card-body p-4">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tongTien = 0; ?>
                            <?php if (!empty($cartUserProduct)): ?>
                                <?php foreach ($cartUserProduct as $value): ?>
                                    <tr>
                                        <!-- Xóa -->
                                        <td>
                                            <a href="<?= BASE_URL ?>?action=client-delete-cart-detail&idCartDetail=<?= $value['id'] ?>" 
                                               class="btn btn-sm btn-outline-danger" 
                                               onclick="return confirm('Bạn có muốn xóa sản phẩm này không?') ">
                                                <i class="bi bi-trash"></i>
                                                Xóa
                                            </a>
                                        </td>
                                        <!-- Thông tin sản phẩm -->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= $value['image'] ?>" alt="" width="80" class="rounded me-3 border">
                                                <div>
                                                    <a target="_blank" 
                                                       href="<?= BASE_URL ?>?action=client-detail-products&id=<?= $value['product_id'] ?>" 
                                                       class="text-decoration-none text-dark">
                                                        <h6 class="mb-1"><?= $value['name'] ?></h6>
                                                    </a>
                                                    <small class="text-muted">Còn: <?= $value['productQuantity'] ?> sản phẩm</small>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Giá -->
                                        <td class="text-danger fw-bold">
                                            <?= number_format($value['price']) ?> đ
                                        </td>
                                        <!-- Số lượng -->
                                        <td width="180">
                                            <div class="input-group input-group-sm">
                                                <a class="btn btn-outline-secondary" 
                                                   href="<?= BASE_URL ?>?action=client-minus-cart-detail&idCartDetail=<?= $value['id'] ?>">-</a>
                                                <input type="text" class="form-control text-center" 
                                                       value="<?= $value['quantity'] ?>" disabled>
                                                <a class="btn btn-outline-secondary" 
                                                   href="<?= BASE_URL ?>?action=client-plus-cart-detail&idCartDetail=<?= $value['id'] ?>">+</a>
                                            </div>
                                        </td>
                                        <!-- Thành tiền -->
                                        <td class="fw-bold text-danger">
                                            <?php 
                                                $thanhtien = intval($value['price']) * intval($value['quantity']);
                                                echo number_format($thanhtien);
                                                $tongTien += $thanhtien;
                                            ?> đ
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Không có sản phẩm nào trong giỏ hàng</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="<?= BASE_URL ?>?action=client-products" class="btn btn-outline-primary">
                            ← Tiếp tục mua hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thanh toán -->
        <div class="col-lg-3">
            <div class="card shadow-sm border-0 sticky-top" style="top: 100px;">
                <div class="card-body">
                    <h5 class="mb-3">Thanh toán</h5>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0 fw-bold">Tổng tiền:</p>
                        <span class="text-danger fw-bold">
                            <?= number_format($tongTien) ?> đ
                        </span>
                    </div>
                    <hr>
                    <?php if (!empty($cartUserProduct)): ?>
                        <div class="d-grid">
                            <a href="<?= BASE_URL ?>?action=client-pay" class="btn btn-warning btn-lg fw-bold">
                                Thanh toán ngay
                            </a>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">Thêm sản phẩm để thanh toán</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
