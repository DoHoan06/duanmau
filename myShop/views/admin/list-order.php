<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>

        <!-- Nội dung chính -->
        <div class="col-10">
            <div class="card shadow-sm p-4">
                <h4 class="fw-bold mb-3">Quản lý đơn hàng</h4>

                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">STT</th>
                            <th>Người nhận</th>
                            <th style="width: 140px;">Tổng tiền</th>
                            <th style="width: 140px;">Ngày đặt</th>
                            <th style="width: 200px;">Trạng thái</th>
                            <th style="width: 120px;" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($orderData)): ?>
                            <?php foreach ($orderData as $key => $value): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <strong><?= $value['receiver_name'] ?></strong>  
                                        <br>
                                        <small>Email: <?= $value['receiver_email'] ?></small><br>
                                        <small>📞 <?= $value['receiver_phone'] ?></small><br>
                                        <small>📍 <?= $value['receiver_address'] ?></small>
                                    </td>
                                    <td class="text-danger fw-bold">
                                        <?= number_format($value['total_money']) ?> đ
                                    </td>
                                    <td>
                                        <?= date("d/m/Y", strtotime($value['date'])) ?>
                                    </td>
                                    <?php
                                    $statusList = [
                                        'pending' => 'Đang chờ xử lý',
                                        'processing' => 'Đang xử lý',
                                        'delivered' => 'Đã giao hàng',
                                        'completed' => 'Đã hoàn thành',
                                    ];
                                    $currentStatus = $value['status'];
                                    $currentIndex = array_search($currentStatus, array_keys($statusList));
                                    ?>
                                    <td>
                                        <form action="<?= BASE_URL ?>?action=admin-update-order&id=<?= $value['id'] ?>" method="post">
                                            <select class="form-select" onchange="this.form.submit()" name="status">
                                                <?php
                                                $i = 0;
                                                foreach ($statusList as $key => $label):
                                                    if ($i >= $currentIndex):
                                                ?>
                                                        <option value="<?= $key ?>" <?= $key == $currentStatus ? 'selected' : '' ?>>
                                                            <?= $label ?>
                                                        </option>
                                                <?php
                                                    endif;
                                                    $i++;
                                                endforeach;
                                                ?>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>?action=admin-detail-order&id=<?= $value['id'] ?>" 
                                           class="btn btn-info btn-sm">
                                            🔍 Chi tiết
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Chưa có đơn hàng nào
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
