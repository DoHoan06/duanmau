<h2>Danh sách danh mục</h2>
<a href="?action=category-create" class="btn btn-success mb-2">Thêm mới</a>
<br>
<a href="<?= BASE_URL ?>?action=products" class="btn btn-secondary mb-3">← Quay về danh sách</a>
<table class="table table-bordered">
    <thead>
        <tr><th>ID</th><th>Tên danh mục</th><th>Hành động</th></tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $cat): ?>
            <tr>
                <td><?= $cat['id'] ?></td>
                <td><?= $cat['name'] ?></td>
                <td>
                    <a href="?action=category-edit&id=<?= $cat['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="?action=category-delete&id=<?= $cat['id'] ?>" class="btn btn-danger btn-sm">Xoá</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
