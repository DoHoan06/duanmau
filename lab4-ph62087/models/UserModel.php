<?php
class UserModel
{
    protected $pdo;
    public function __construct()
    {
        $database = new BaseModel();
        $this->pdo = $database->getConnection();
    }
    public function findByEmail($email)
    {
        $sql = "SELECT * FROM `users` WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function register($name, $email, $password, $phone)
    {
        $sql = "
        INSERT INTO `users`(`name`, `email`, `password`, `phone`) VALUES (:name, :email, :password, :phone)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => md5($password),
            ':phone' => $phone,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function checkLogin($email, $password)
    {
        $sql = "SELECT * FROM `users` WHERE email = :email AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':password' => md5($password)
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // trả về mảng người dùng nếu đúng, hoặc false nếu sai
    }
}
