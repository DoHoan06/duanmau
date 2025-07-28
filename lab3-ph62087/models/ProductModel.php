<?php
class ProductModel
{
    private $conn;
    public function __construct()
    {
        $db = new BaseModel();
        $this->conn = $db->getConnection();
    }
    public function getAll()
    {
        $sql = "
        SELECT products.*, categories.name AS categoryName FROM products JOIN categories ON products.category_id = categories.id ORDER BY products.id ASC;
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}