<div class="container">
    <div class="row">
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>
        <div class="col-10">
            <!-- Nội dung chính -->
            <form action="<?= BASE_URL ?>?action=admin-update-products&id=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" value="<?= $data['price'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Số lượng sản phẩm</label>
                    <input type="text" class="form-control" name="quantity" value="<?= $data['quantity'] ?>">
                </div>
                <div class="mb-4">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-control">
                        <?php foreach ($listData as $value): ?>
                            <option value="<?= $value['id'] ?>"
                                <?php if ($data['category_id'] == $value['id']): ?>
                                selected
                                <?php endif; ?>><?= $value['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if ($data['image'] != ""): ?>
                    <img src="<?= $data['image'] ?>" alt="" width="100">
                <?php endif; ?>
                <div class="mb-4">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="mb-4">
                    <label for="">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control"><?= $data['description'] ?></textarea>
                </div>
                <button class="btn btn-warning btn-sm">Chỉnh sửa</button>
            </form>
        </div>
    </div>
</div>