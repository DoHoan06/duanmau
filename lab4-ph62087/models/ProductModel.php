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
    public function insert($image)
    {
        $sql = "
            INSERT INTO `products`(`name`, `image`, `price`, `category_id`, `description`, `production_date`) VALUES (:name, :image, :price, :category_id, :description, :production_date)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':category_id', $_POST['category_id']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':production_date', $_POST['production_date']);
        $stmt->execute();
    }
    public function getOne()
    {
        $sql = "
        SELECT products.*, categories.name AS categoryName FROM products JOIN categories ON products.category_id = categories.id where products.id = :id ORDER BY products.id ASC;
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($image)
    {
        $sql = "
            UPDATE `products` SET `name`=:name,`image`=:image,`price`=:price,`category_id`=:category_id,`description`=:description,`production_date`=:production_date WHERE id = :id
            ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':category_id', $_POST['category_id']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':production_date', $_POST['production_date']);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
    }
    public function delete($id)
    {
        $sql = "
        DELETE FROM `products` WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
