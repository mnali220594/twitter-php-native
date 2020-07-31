<?php
class User
{
    protected $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function userData($user_id)
    {
        // $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :user_id");
        $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :user_id");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
