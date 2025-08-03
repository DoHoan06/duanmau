<?php

class HomeController
{
    public function index()
    {
        $title = "Trang chủ";
        $view = "home";
        require_once PATH_VIEW_MAIN;
    }
    public function login()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            $user = new UserModel();
            $check = $user->checklogin($_POST['email'], $_POST['password']);
            if ($check) {
                $_SESSION['success'] = "Đăng nhập thành công";
                //Thông tin user đã đăng nhập
                $_SESSION['userLogin'] = [
                    'id' => $check['id'],
                    'name' => $check['name']
                ];
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'][] = "Đăng nhập thất bại";
                header("Location: " . BASE_URL . "?action=login");
                exit();
            }
        }
        $title = "Trang đăng nhập";
        $view = "login";
        require_once PATH_VIEW_MAIN;
    }
    public function register()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST') {
            $_SESSION['error'] = [];

            // Kiểm tra các trường bắt buộc
            if (
                empty($_POST['name']) ||
                empty($_POST['email']) ||
                empty($_POST['password']) ||
                empty($_POST['confirm']) ||
                empty($_POST['phone'])
            ) {
                $_SESSION['error'][] = "Bạn phải nhập đầy đủ thông tin đăng ký";
                header("Location: " . BASE_URL . "?action=register");
                exit();
            }

            // Kiểm tra mật khẩu khớp
            if ($_POST['password'] != $_POST['confirm']) {
                $_SESSION['error'][] = "Mật khẩu và xác nhận không khớp";
                header("Location: " . BASE_URL . "?action=register");
                exit();
            }

            // Kiểm tra email tồn tại
            $user = new UserModel();
            $check = $user->findByEmail($_POST['email']);
            if ($check) {
                $_SESSION['error'][] = "Email đã tồn tại";
                header("Location: " . BASE_URL .  "?action=register");
                exit();
            }

            // Nếu không có lỗi, tiến hành đăng ký
            $user->register(
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                $_POST['phone']
            );
            $_SESSION['success'] = "Đăng ký thành công";
            header("Location: " . BASE_URL . "?action=login");
            exit();
        }

        $title = "Trang đăng ký";
        $view = "register";
        require_once PATH_VIEW_MAIN;
    }

    public function logout()
    {
        unset($_SESSION['userLogin']);
        $_SESSION['success'] = "Đăng xuất thành công";
        header("Location: " . BASE_URL . "?action=login");
        exit();
    }
}
