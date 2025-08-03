<form action="<?= BASE_URL ?>?action=edit&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="<?= $data_product['name'] ?>">
    </div>
    <?php if ($data_product['image']): ?>
        <img src="<?= BASE_ASSETS_UPLOADS . $data_product['image'] ?>" alt="" width="100">
    <?php endif; ?>
    <div class="mb-4">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="mb-4">
        <label for="">Price</label>
        <input type="number" class="form-control" name="price" value="<?= $data_product['price'] ?>">
    </div>
    <div class="mb-4">
        <label for="">Category Name</label>
        <select name="category_id" class="form-control">
            <?php foreach ($data_category as $value): ?>
                <option value="<?= $value['id'] ?>"
                    <?php if ($data_product['category_id'] == $value['id']): ?>
                    selected
                    <?php endif; ?>>
                    <?= $value['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-4">
        <label for="">Description</label>
        <input type="text" class="form-control" name="description" value="<?= $data_product['description'] ?>">
    </div>
    <div class="mb-4">
        <label for="">Production_date</label>
        <input type="date" class="form-control" name="production_date" value="<?= $data_product['production_date'] ?>">
    </div>
    <button class="btn btn-primary">Chỉnh sửa</button>
</form>