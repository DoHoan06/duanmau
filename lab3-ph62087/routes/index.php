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
};
