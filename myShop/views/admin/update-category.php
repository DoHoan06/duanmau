<div class="container">
    <div class="row">
        <div class="col-2">
            <?php include "views/admin/sidebar.php" ?>
        </div>
        <div class="col-10">
            <!-- Nội dung chính -->
            <form action="<?= BASE_URL ?>?action=admin-update-categories&id=<?= $data['id'] ?>" method="post">
                <div class="mb-4">
                    <label for="">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>">
                </div>
                <button class="btn btn-warning btn-sm">Chỉnh sửa</button>
            </form>
        </div>
    </div>
</div>