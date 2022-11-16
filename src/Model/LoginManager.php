<?php

namespace  App\Model;

class LoginManager extends AbstractManager
{
    public const TABLE = "admin";
    public function selectOneByEmail(string $email)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE email=:email");
        $statement->bindValue('email', $email, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }
}
