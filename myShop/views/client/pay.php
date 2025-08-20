<div class="container my-5">
    <div class="row">
        <!-- Form thông tin người nhận -->
        <div class="col-5">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4">Thông tin nhận hàng</h4>
                <form action="<?= BASE_URL ?>?action=client-save-order" method="post">
                    <div class="mb-3">
                        <label class="form-label">Tên người nhận</label>
                        <input type="text" name="receiver_name" class="form-control" value="<?= $userInfo['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email người nhận</label>
                        <input type="email" name="receiver_email" class="form-control" value="<?= $userInfo['email'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại người nhận</label>
                        <input type="text" name="receiver_phone" class="form-control" value="<?= $userInfo['phone'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ người nhận</label>
                        <textarea name="receiver_address" class="form-control" rows="2" required><?= $userInfo['address'] ?></textarea>
                    </div>
                    <button class="btn btn-success w-100">Đặt hàng</button>
                </form>
            </div>
        </div>

        <!-- Giỏ hàng -->
        <div class="col-7">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4">Sản phẩm trong đơn hàng</h4>
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tongTien = 0; ?>
                        <?php foreach ($cartUserProduct as $value): ?>
                            <?php $thanhtien = intval($value['price']) * intval($value['quantity']); ?>
                            <?php $tongTien += $thanhtien; ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $value['image'] ?>" alt="" width="80" class="me-3 rounded">
                                        <div>
                                            <a target="_blank" href="<?= BASE_URL ?>?action=client-detail-products&id=<?= $value['product_id'] ?>">
                                                <h6 class="mb-0"><?= $value['name'] ?></h6>
                                            </a>
                                            <small class="text-muted">Còn: <?= $value['productQuantity'] ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-danger"><?= number_format($value['price']) ?> đ</td>
                                <td><?= $value['quantity'] ?></td>
                                <td class="text-danger fw-bold"><?= number_format($thanhtien) ?> đ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
