<div class="container">
    <div class="row">
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>
        <div class="col-10">
            <h2>Danh sách bình luận</h2>
            <?php if ($data): ?>
                <table border="1" cellpadding="8" cellspacing="0" class="table">
                    <tr>
                        <th>ID</th>
                        <th>Người bình luận</th>
                        <th>Nội dung</th>
                        <th>Đánh giá</th>
                        <th>Ngày</th>
                    </tr>
                    <?php foreach ($data as $comment): ?>
                        <tr>
                            <td><?= $comment['id'] ?></td>
                            <td><?= htmlspecialchars($comment['user_name']) ?></td>
                            <td><?= htmlspecialchars($comment['content']) ?></td>
                            <td><?= $comment['rating'] ?>/5</td>
                            <td><?= $comment['created_at'] ?? '' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>Sản phẩm không có đánh giá</p>
            <?php endif; ?>
        </div>
    </div>
</div>