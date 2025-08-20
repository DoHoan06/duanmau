<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <!-- Card bọc bảng -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📦 Danh sách đơn hàng</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Người nhận</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderData as $key => $value): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <p class="fw-bold mb-1"><?= $value['receiver_name'] ?></p>
                                        <small class="text-muted"><?= $value['receiver_email'] ?> | <?= $value['receiver_phone'] ?></small>
                                        <br>
                                        <small class="text-muted"><?= $value['receiver_address'] ?></small>
                                    </td>
                                    <td><?= date("d/m/Y", strtotime($value['date'])) ?></td>
                                    <td class="fw-bold text-danger"><?= number_format($value['total_money']) ?> đ</td>
                                    <td>
                                        <?php if ($value['status'] == "pending"): ?>
                                            <span class="badge bg-warning text-dark">⏳ Đang chờ xử lý</span>
                                        <?php elseif ($value['status'] == "processing"): ?>
                                            <span class="badge bg-info text-dark">🔄 Đang xử lý</span>
                                        <?php elseif ($value['status'] == "delivered"): ?>
                                            <span class="badge bg-primary">🚚 Đã giao hàng</span>
                                        <?php elseif ($value['status'] == "completed"): ?>
                                            <span class="badge bg-success">✅ Hoàn thành</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <!-- Chi tiết sản phẩm -->
                                <tr>
                                    <td colspan="5" class="p-0">
                                        <table class="table mb-0">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th style="width:50px"></th>
                                                    <th>#</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Thành tiền</th>
                                                    <th>Đánh giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($value['order_detail'] as $key2 => $value2): ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?= $key2 + 1 ?></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="<?= $value2['image'] ?>" alt="" width="80" class="rounded border me-3">
                                                                <div>
                                                                    <a target="_blank" href="<?= BASE_URL ?>?action=client-detail-products&id=<?= $value2['product_id'] ?>" class="text-decoration-none fw-semibold">
                                                                        <?= $value2['product_name'] ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?= $value2['quantity'] ?></td>
                                                        <td><?= number_format($value2['product_price']) ?> đ</td>
                                                        <td class="fw-bold text-danger"><?= number_format(intval($value2['product_price'] * intval($value2['quantity']))) ?> đ</td>
                                                        <td>
                                                            <?php if ($value['status'] == 'completed'): ?>
                                                                <?php
                                                                $comment = new Comment();
                                                                $check = $comment->checkComment($value2['product_id'], $value['id']);
                                                                ?>
                                                                <?php if (!$check): ?>
                                                                    <a href="<?= BASE_URL ?>?action=client-rating-product&id-product=<?= $value2['product_id'] ?>&id-order=<?= $value['id'] ?>" class="btn btn-sm btn-warning">Đánh giá</a>
                                                                <?php else: ?>
                                                                    <span class="text-success fw-bold">✔ Đã đánh giá</span>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <span class="text-muted">-</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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