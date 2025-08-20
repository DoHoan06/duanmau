<div class="container">
    <div class="row">
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>
        <div class="col-10">
            <!-- Nội dung chính -->
            <form action="<?= BASE_URL ?>?action=admin-create-products" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-4">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="mb-4">
                    <label for="">Số lượng sản phẩm</label>
                    <input type="text" class="form-control" name="quantity">
                </div>
                <div class="mb-4">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-control">
                        <?php foreach ($listData as $value): ?>
                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="mb-4">
                    <label for="">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary btn-sm">Thêm mới</button>
            </form>
        </div>
    </div>
</div>