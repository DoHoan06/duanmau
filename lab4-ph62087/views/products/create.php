<form action="<?= BASE_URL ?>?action=store" method="post" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-4">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="mb-4">
        <label for="">Price</label>
        <input type="number" class="form-control" name="price">
    </div>
    <div class="mb-4">
        <label for="">Category Name</label>
        <select name="category_id" class="form-control">
            <?php foreach($data as $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-4">
        <label for="">Description</label>
        <input type="text" class="form-control" name="description">
    </div>
    <div class="mb-4">
        <label for="">Production_date</label>
        <input type="date" class="form-control" name="production_date">
    </div>
    <button class="btn btn-primary">Thêm mới</button>
</form>