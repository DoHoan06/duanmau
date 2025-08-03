<table class="table" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Production_date</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['name'] ?></td>
                <td>
                    <?php if ($data['image']): ?>
                        <img src="<?= BASE_ASSETS_UPLOADS . $data['image'] ?>" alt="" width="100">
                    <?php endif; ?>
                </td>
                <td><?= number_format($data['price']) ?></td>
                <td><?= $data['categoryName'] ?></td>
                <td><?= $data['description'] ?></td>
                <td><?= $data['production_date'] ?></td>
            </tr>
    </tbody>
</table>
<h4>Bình luận</h4>

<?php if (isset($_SESSION['user'])): ?>
    <form action="?action=addComment" method="post">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
        <textarea name="content" rows="4" cols="50" placeholder="Nhập bình luận..."></textarea><br>
        <button type="submit">Gửi</button>
    </form>
<?php else: ?>
    <a href="?action=login">Đăng nhập để bình luận</a>
<?php endif; ?>
