<a href="<?= BASE_URL ?>?action=home" style="display:inline-block; margin: 10px 0; color: blue; text-decoration: underline;">← Quay về trang chủ</a>
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
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>