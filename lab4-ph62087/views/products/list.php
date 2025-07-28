<a href="<?= BASE_URL ?>?action=home" style="display:inline-block; margin: 10px 0; color: blue; text-decoration: underline;">← Quay về trang chủ</a>
<a href="<?= BASE_URL ?>?action=create">Thêm mới</a>
<br>
<form method="GET" action="<?= BASE_URL ?>">
    <input type="hidden" name="action" value="products">
    <input type="text" name="keyword" placeholder="Nhập từ khóa..." value="<?= $_GET['keyword'] ?? '' ?>">
    <button type="submit">Tìm kiếm</button>
</form>
<br>
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value): ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td>
                    <?php if ($value['image']): ?>
                        <img src="<?= BASE_ASSETS_UPLOADS . $value['image'] ?>" alt="" width="100">
                    <?php endif; ?>
                </td>
                <td><?= number_format($value['price']) ?></td>
                <td><?= $value['categoryName'] ?></td>
                <td><?= $value['description'] ?></td>
                <td><?= $value['production_date'] ?></td>
                <td>
                    <a href="<?= BASE_URL ?>?action=detail&id=<?= $value['id'] ?>">Chi tiết</a>
                    <a href="<?= BASE_URL ?>?action=update&id=<?= $value['id'] ?>">Sửa</a>
                    <a href="<?= BASE_URL ?>?action=delete&id=<?= $value['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>