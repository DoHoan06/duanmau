<div class="container">
    <div class="row">
        <div class="col-12">
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
                    <?php foreach ($value['order_detail'] as $key => $value): ?>
                        <tr>
                            <td></td>
                            <td><?= $key + 1 ?></td>
                            <td>
                                <div class="d-flex items-center justify-between">
                                    <img src="<?= $value['image'] ?>" alt="" width="100">
                                    <div>
                                        <a target="_blank" href="<?= BASE_URL ?>?action=client-detail-products&id=<?= $value['product_id'] ?>">
                                            <h5><?= $value['product_name'] ?></h5>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td><?= $value['quantity'] ?></td>
                            <td><?= number_format($value['product_price']) ?> đ</td>
                            <td><?= number_format(intval($value['product_price'] * intval($value['quantity']))) ?> đ</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>