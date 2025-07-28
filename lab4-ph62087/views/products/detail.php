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