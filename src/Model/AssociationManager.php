<?php

namespace App\Model;

class AssociationManager extends AbstractManager
{
    public const TABLE = "association";
    public function selectOne(): array|false
    {
        // prepared request
        $statement = $this->pdo->query("SELECT * FROM " . self::TABLE);

        return $statement->fetch();
    }
}
