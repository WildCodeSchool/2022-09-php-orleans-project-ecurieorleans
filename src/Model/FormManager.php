<?php

namespace App\Model;

use PDO;

class FormManager extends AbstractManager
{
    public const TABLE = 'form';

    public function insert()
    {
        $sql = 'INSERT INTO ' . self::TABLE .
        ' (name, email, message) VALUES
(:name, :email, :message)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':name', $_POST['name']);
        $statement->bindValue(':email', $_POST['email']);
        $statement->bindValue(':message', $_POST['message']);
        $statement->execute();
    }
}
