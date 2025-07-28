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
};
