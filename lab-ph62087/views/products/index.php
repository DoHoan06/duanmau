<h2>Danh sách sản phẩm</h2>

<table border="1">
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
        <?php foreach ($data as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><img src="<?= BASE_ASSETS_UPLOADS . $item['image'] ?>" width="80"></td>
                <td><?= number_format($item['price']) ?></td>
                <td><?= $item['categoryName'] ?></td>
                <td><?= $item['description'] ?></td>
                <td><?= $item['production_date'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
