<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'home'         => (new HomeController)->index(),
    'login'         => (new HomeController)->login(),
    'register'         => (new HomeController)->register(),
    'logout'         => (new HomeController)->logout(),
    'products'    => (new ProductController)->index(),
    'about'     => (new AboutController)->index(),
    'contact'   => (new ContactController)->index(),
    'create'         => (new ProductController)->createProduct(),
    'store'         => (new ProductController)->storeProduct(),
    'detail'         => (new ProductController)->detailProduct(),
    'update'         => (new ProductController)->updateProduct(),
    'edit'         => (new ProductController)->editProduct(),
    'delete'         => (new ProductController)->deleteProduct(),
    'search' => (new ProductController)->searchProduct(),
    'categories'       => (new CategoryController)->index(),
    'category-create'  => (new CategoryController)->create(),
    'category-store'   => (new CategoryController)->store(),
    'category-edit'    => (new CategoryController)->edit(),
    'category-update'  => (new CategoryController)->update(),
    'category-delete'  => (new CategoryController)->delete(),
    'action=add_comment' => (new CommentController)->add(),
};
