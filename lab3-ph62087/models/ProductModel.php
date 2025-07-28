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
            INSERT INTO `courses`(`name`, `thumbnail`, `instructor_id`, `duration`, `price`) VALUES (:name, :thumbnail, :instructor_id, :duration, :price)
            ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':thumbnail', $thumbnail);
        $stmt->bindParam(':instructor_id', $_POST['instructor_id']);
        $stmt->bindParam(':duration', $_POST['duration']);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->execute();
    }
    public function getOne()
    {
        $sql = "
            SELECT courses.*, instructor.name AS instructorName FROM courses JOIN instructor ON courses.instructor_id = instructor.id where courses.id = :id;
            ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($thumbnail)
    {
        $sql = "
            UPDATE `courses` SET `name`=:name,`thumbnail`=:thumbnail,`instructor_id`=:instructor_id,`duration`=:duration,`price`=:price WHERE  id = :id
            ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':thumbnail', $thumbnail);
        $stmt->bindParam(':instructor_id', $_POST['instructor_id']);
        $stmt->bindParam(':duration', $_POST['duration']);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
    }
    public function delete($id)
    {
        $sql = "
    DELETE FROM `courses` WHERE id = :id
    ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
