<div class="container">
    <div class="row">
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>
        <div class="col-10"><?php if ($data): ?>
                <?php foreach ($data as $value): ?>
                    <small>Rating: <?= $value['rating'] ?></small>
                    <p>Nội dung bình luận: <?= $value['content'] ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Sản phẩm không có đánh giá</p>
            <?php endif; ?>
        </div>
    </div>
</div>  