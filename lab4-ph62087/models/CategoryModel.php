<?php
    class CategoryModel{
        private $conn;
        public function __construct(){
            $db = new BaseModel();
            $this->conn = $db->getConnection();
        }
        public function getAll(){
            $sql = "
            SELECT * FROM `categories`
            ";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>