<?php
class ProductController
{
    public function index() {
        $productModel = new ProductModel();
        $data = $productModel->getAll();

        $title = 'Danh sách sản phẩm';
        $view = 'products/list';
        require_once PATH_VIEW_MAIN;
    }
}

