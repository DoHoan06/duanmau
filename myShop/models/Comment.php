<?php
class Comment
{
    protected $pdo;
    public function __construct()
    {
        $database = new BaseModel();
        $this->pdo = $database->getConnection();
    }

    public function insert($content, $user_id, $product_id, $rating, $order_id)
    {
        $sql = "INSERT INTO `comments`(`content`, `user_id`, `product_id`, `rating`, `order_id`) 
                VALUES (:content, :user_id, :product_id, :rating, :order_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':content' => $content,
            ':user_id' => $user_id,
            ':product_id' => $product_id,
            ':rating' => $rating,
            ':order_id' => $order_id,
        ]);
    }

    public function checkComment($productId, $orderId)
    {
        $sql = "SELECT * FROM `comments` WHERE product_id = :product_id AND order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':product_id' => $productId,
            ':order_id' => $orderId,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findCommentByProductId($productId)
    {
        $sql = "SELECT c.*, u.name AS user_name 
                FROM `comments` c 
                JOIN `users` u ON c.user_id = u.id 
                WHERE c.product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':product_id' => $productId,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
