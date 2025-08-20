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
            $errors = [];

            // Validate dữ liệu đầu vào
            if (empty($_POST['email'])) {
                $errors[] = "Vui lòng nhập email";
            }
            if (empty($_POST['password'])) {
                $errors[] = "Vui lòng nhập mật khẩu";
            }

            if (count($errors) > 0) {
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL . "?action=login");
                exit();
            }

            // Thực hiện kiểm tra đăng nhập
            $user = new User();
            $check = $user->checkLogin($_POST['email'], $_POST['password']);
            if ($check) {
                $_SESSION['success'] = ["Đăng nhập thành công"];
                $_SESSION['userLogin'] = [
                    'id' => $check['id'],
                    'name' => $check['name'],
                    'role' => $check['role'],
                ];
                if ($check['role'] == '1') {
                    header("Location: " . BASE_URL . "?action=admin-dashboard");
                    exit();
                }
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = ["Email hoặc mật khẩu không đúng"];
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
            $errors = [];

            // Validate dữ liệu trống
            if (empty($_POST['name'])) {
                $errors[] = "Vui lòng nhập họ tên";
            }
            if (empty($_POST['email'])) {
                $errors[] = "Vui lòng nhập email";
            }
            if (empty($_POST['password'])) {
                $errors[] = "Vui lòng nhập mật khẩu";
            }
            if (empty($_POST['confirm'])) {
                $errors[] = "Vui lòng xác nhận lại mật khẩu";
            }
            if (empty($_POST['phone'])) {
                $errors[] = "Vui lòng nhập số điện thoại";
            }
            if (empty($_POST['address'])) {
                $errors[] = "Vui lòng nhập địa chỉ";
            }

            // Kiểm tra mật khẩu khớp
            if ($_POST['password'] !== $_POST['confirm']) {
                $errors[] = "Mật khẩu xác nhận không khớp";
            }

            // Nếu có lỗi thì hiển thị
            if (count($errors) > 0) {
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL . "?action=register");
                exit();
            }

            $user = new User();
            $check = $user->findByEmail($_POST['email']);
            if ($check) {
                $_SESSION['error'] = ["Email đã được sử dụng"];
                header("Location: " . BASE_URL . "?action=register");
                exit();
            }

            // Lưu người dùng mới
            $user->register(
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                $_POST['phone'],
                $_POST['address']
            );
            $_SESSION['success'] = ["Đăng ký thành công"];
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
        $_SESSION['success'] = ["Đăng xuất thành công"];
        header("Location: " . BASE_URL . "?action=login");
        exit();
    }
    public function clientProducts()
    {
        $product = new Product();
        $search = [
            'search_name' => "",
            'search_category' => "",
            'search_min_price' => "",
            'search_max_price' => "",
        ];
        if (isset($_GET['search_name'])) {
            $search['search_name'] = $_GET['search_name'];
            $listProduct = $product->getList($search);
        } else if (isset($_GET['search_category'])) {
            $search['search_category'] = $_GET['search_category'];
            $listProduct = $product->getList($search);
        } else if (isset($_GET['search_min_price']) && isset($_GET['search_max_price'])) {
            $search['search_min_price'] = $_GET['search_min_price'];
            $search['search_max_price'] = $_GET['search_max_price'];
            $listProduct = $product->getList($search);
        } else {
            $listProduct = $product->getList($search);
        }

        $category = new Category();
        $listCategory = $category->getList();

        $title = "Trang sản phẩm";
        $view = "client/products";
        require_once PATH_VIEW_MAIN;
    }
    public function detailProducts()
    {
        $product = new Product();
        $data = $product->getOne($_GET['id']);
        $listOtherProduct = $product->getOther($data);

        $title = "Trang chi tiết sản phẩm";
        $view = "client/detail-products";
        require_once PATH_VIEW_MAIN;
    }
    public function addToCart()
    {
        $product = new Product();
        $data = $product->getOne($_GET['id']);
        $quantity = $_GET['quantity'];
        if ($quantity < 1 || $quantity > $data['quantity']) {
            $_SESSION['error'] = ["Số lượng sản phẩm không phù hợp"];
            header("Location: " . BASE_URL . "?action=client-detail-products&id=" . $_GET['id']);
            exit();
        }
        $cart = new Cart();
        $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']);
        if (!$cartUser) {
            $cart->insert($_SESSION['userLogin']['id']);
            $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']);
        }
        $cartDetail = new CartDetail();
        $cartProduct = $cartDetail->findCartDetailByProductId($cartUser['id'], $_GET['id']);
        if ($cartProduct) {
            if (($cartProduct['quantity'] + $quantity) > $data['quantity']) {
                $_SESSION['error'] = ["Số lượng sản phẩm không phù hợp"];
                header("Location: " . BASE_URL . "?action=client-detail-products&id=" . $_GET['id']);
                exit();
            }
            $cartDetail->update($cartProduct, $cartUser['id'], $_GET['id'], $quantity);
        } else {
            $cartDetail->insert($cartUser['id'], $_GET['id'], $quantity);
        }
        $_SESSION['success'] = ["Mua hàng thành công! Vui lòng kiểm tra giỏ hàng"];

        header("Location: " . BASE_URL . "?action=client-detail-products&id=" . $_GET['id']);
        exit();
    }
    public function viewCart()
    {
        $cart = new Cart();
        $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']);
        $cartUserProduct = false;
        if ($cartUser) {
            $cartDetail = new CartDetail();
            $cartUserProduct = $cartDetail->findCartDetailByCartId($cartUser['id']);
        }
        $title = "Trang giỏ hàng";
        $view = "client/cart";
        require_once PATH_VIEW_MAIN;
    }
    public function deleteCart()
    {
        if (isset($_GET['idCartDetail'])) {
            $cartDetail = new CartDetail();
            $cartDetail->delete($_GET['idCartDetail']);
        }
        header("Location: " . BASE_URL . "?action=client-view-cart");
        exit();
    }
    public function minusCart()
    {
        $cartDetail = new CartDetail();
        $data = $cartDetail->getOne($_GET['idCartDetail']);
        if (intval($data['quantity']) - 1 <= 0) {
            $_SESSION['error'] = ["Không được cập nhật số lượng sản phẩm dưới 1"];
        } else {
            $cartDetail->updateCartDetail($_GET['idCartDetail'], intval($data['quantity']) - 1);
        }
        header("Location: " . BASE_URL . "?action=client-view-cart");
        exit();
    }
    public function plusCart()
    {
        $cartDetail = new CartDetail();
        $data = $cartDetail->getOne($_GET['idCartDetail']);
        if (intval($data['quantity']) + 1 > intval($data['productQuantity'])) {
            $_SESSION['error'] = ["Vượt quá số lượng có thể mua"];
        } else {
            $cartDetail->updateCartDetail($_GET['idCartDetail'], intval($data['quantity']) + 1);
        }
        header("Location: " . BASE_URL . "?action=client-view-cart");
        exit();
    }
    public function pay()
    {
        $cart = new Cart();
        $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']);
        $cartUserProduct = false;
        if ($cartUser) {
            $cartDetail = new CartDetail();
            $cartUserProduct = $cartDetail->findCartDetailByCartId($cartUser['id']);
        }
        $user = new User();
        $userInfo = $user->getOne($_SESSION['userLogin']['id']);

        $title = "Trang thanh toán";
        $view = "client/pay";
        require_once PATH_VIEW_MAIN;
    }
    public function saveOrder()
    {
        $cart = new Cart();
        $cartUser = $cart->findCartByUserId($_SESSION['userLogin']['id']); //cart
        $cartUserProduct = false;
        if ($cartUser) {
            $cartDetail = new CartDetail();
            $cartUserProduct = $cartDetail->findCartDetailByCartId($cartUser['id']); //cart detail
        }
        $user = new User();
        $userInfo = $user->getOne($_SESSION['userLogin']['id']); //user mua hàng
        $total_money = 0;
        foreach ($cartUserProduct as $value) {
            $total_money += $value['quantity'] * $value['price'];
        }
        //Lưu order
        $order = new Order();
        $orderId = $order->insert(
            $_SESSION['userLogin']['id'],
            $total_money,
            date('Y-m-d'),
            $_POST['receiver_name'],
            $_POST['receiver_phone'],
            $_POST['receiver_address'],
            $_POST['receiver_email'],
        );
        //Lưu order detail
        $orderDetail = new OrderDetail();
        foreach ($cartUserProduct as $value) {
            $orderDetail->insert(
                $value['product_id'],
                $value['quantity'],
                $orderId,
                $value['name'],
                $value['price'],
            );
        }
        //Xóa giỏ hàng
        foreach ($cartUserProduct as $value) {
            $cartDetail->delete($value['id']);
        }
        $cart->delete($cartUser['id']);
        $_SESSION['success'] = ["Đặt hàng thành công!"];
        header("Location: " . BASE_URL);
        exit();
    }
    public function viewOrder()
    {
        $order = new Order();
        $orderData = $order->findOrderByUserId($_SESSION['userLogin']['id']);
        
        $orderDetail = new OrderDetail();
        foreach ($orderData as $key => $value) {
            $orderDetailData = $orderDetail->findOrderDetailByOrderId($value['id']);
            $orderData[$key]['order_detail'] = $orderDetailData;
        }
        $title = "Trang đơn hàng";
        $view = "client/order";
        require_once PATH_VIEW_MAIN;
    }
    public function ratingProduct(){
        $product = new Product();
        $data = $product->getOne($_GET['id-product']);
        $idOrder = $_GET['id-order'];

        $title = "Trang đánh giá";
        $view = "client/rating";
        require_once PATH_VIEW_MAIN;
    }
    public function commentProduct(){
        $comment = new Comment();
        $comment->insert(
            $_POST['content'],
            $_SESSION['userLogin']['id'],
            $_GET['id'],
            $_POST['rating'],
            $_POST['order_id'],
        );
        header("Location: " . BASE_URL . "?action=client-view-order");
        exit();
    }
}
