<?php
class CommentController {
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $product_id = $_POST['product_id'];
            $user_id = $_SESSION['user']['id'] ?? null;
            $date = date('Y-m-d');

            if ($user_id && !empty($content)) {
                $model = new CommentModel();
                $model->addComment($content, $product_id, $user_id, $date);
            }

            header("Location: index.php?action=detail&id=$product_id");
            exit;
        }
    }
}

