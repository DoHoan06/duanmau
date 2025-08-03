<h2>Chỉnh sửa danh mục</h2>
<form action="?action=category-update" method="post">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <div class="mb-3">
        <label>Tên danh mục</label>
        <input type="text" name="name" class="form-control" value="<?= $category['name'] ?>" required>
    </div>
    <button class="btn btn-primary">Cập nhật</button>
</form>
