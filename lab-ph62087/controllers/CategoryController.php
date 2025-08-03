<?php
class CategoryController {
    public function index() {
        $model = new CategoryModel();
        $categories = $model->getAll();
        require_once PATH_VIEW . 'categories/index.php';
    }

    public function create() {
        require_once PATH_VIEW . 'categories/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $model = new CategoryModel();
            $model->insert($name);
            header("Location: " . BASE_URL . "?action=categories");
            exit();
        }
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $model = new CategoryModel();
            $category = $model->getOne($id);
            require_once PATH_VIEW . 'categories/edit.php';
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $model = new CategoryModel();
            $model->update($id, $name);
            header("Location: " . BASE_URL . "?action=categories");
            exit();
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $model = new CategoryModel();
            $model->delete($id);
            header("Location: " . BASE_URL . "?action=categories");
            exit();
        }
    }
}
