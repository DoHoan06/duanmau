<?php
class ProductController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data = $productModel->getAll();

        $title = 'Danh sách sản phẩm';
        $view = 'products/list';
        require_once PATH_VIEW_MAIN;
    }
    public function createProduct()
    {
        $category = new CategoryModel();
        $data = $category->getAll();
        $title = "Thêm sản phẩm";
        $view = "products/create";
        require_once PATH_VIEW_MAIN;
    }
    public function storeProduct()
    {
        $image = null;
        if (isset($_FILES['image']) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
            $image = upload_file("products", $_FILES['image']);
        }
        $product = new ProductModel();
        $product->insert($image);
        header("Location: " . BASE_URL . "?action=products");
        exit();
    }
    public function detailProduct()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL . "?action=products");
            exit();
        }
        $product = new ProductModel();
        $data = $product->getOne();
        $title = "Xem chi tiết sản phẩm";
        $view = "products/detail";
        $model = new ProductModel();
        $product = $model->getOne();

        $commentModel = new CommentModel();
        $comments = $commentModel->getCommentsByProductId($_GET['id']);
        require_once PATH_VIEW_MAIN;
    }
    public function updateProduct()
    {
        $product = new ProductModel();
        $data_product = $product->getOne();
        $category = new CategoryModel();
        $data_category = $category->getAll();
        $title = "Chỉnh sửa sản phẩm";
        $view = "products/update";
        require_once PATH_VIEW_MAIN;
    }
    public function editProduct()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL . "?action=products");
            exit();
        }
        $product = new ProductModel();
        $data = $product->getOne();
        $image = $data['image'];
        if (isset($_FILES['image']) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
            $image = upload_file("products", $_FILES['image']);
        }
        $product->update($image);
        header("Location: " . BASE_URL . "?action=products");
        exit();
    }
    public function deleteProduct()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: " . BASE_URL . "?action=products");
            exit();
        }
        $id = (int)$_GET['id'];
        $product = new ProductModel();
        $product->delete($id);  // Gọi đúng theo tham số
        header("Location: " . BASE_URL . "?action=products");
        exit();
    }
    public function searchProduct()
    {
        $keyword = $_GET['keyword'] ?? '';
        $productModel = new ProductModel();
        $data = $productModel->search($keyword);

        require_once PATH_VIEW . 'products/index.php';
    }
}
