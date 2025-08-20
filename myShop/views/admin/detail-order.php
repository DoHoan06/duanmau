<div class="container">
    <div class="row">
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>
        <div class="col-10">
            <!-- Nội dung chính -->
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderDetailData as $key2 => $value2): ?>
                        <tr>
                            <td></td>
                            <td><?= $key2 + 1 ?></td>
                            <td>
                                <div class="d-flex items-center justify-between">
                                    <img src="<?= $value2['image'] ?>" alt="" width="100">
                                    <div>
                                        <a target="_blank" href="<?= BASE_URL ?>?action=client-detail-products&id=<?= $value2['product_id'] ?>">
                                            <h5><?= $value2['product_name'] ?></h5>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td><?= $value2['quantity'] ?></td>
                            <td><?= number_format($value2['product_price']) ?> đ</td>
                            <td><?= number_format(intval($value2['product_price'] * intval($value2['quantity']))) ?> đ</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>