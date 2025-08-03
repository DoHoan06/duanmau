<?php
class CommentModel {
    private $conn;

    public function __construct() {
        $db = new BaseModel();
        $this->conn = $db->getConnection();
    }

    // Lấy tất cả comment theo sản phẩm
    public function getCommentsByProductId($product_id) {
        $stmt = $this->conn->prepare("SELECT * FROM comments WHERE product_id = ? ORDER BY date DESC");
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm bình luận mới
    public function addComment($content, $product_id, $user_id, $date) {
        $stmt = $this->conn->prepare("INSERT INTO comments (content, product_id, user_id, date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$content, $product_id, $user_id, $date]);
    }
}

