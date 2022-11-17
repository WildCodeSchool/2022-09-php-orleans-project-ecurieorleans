<?php

namespace App\Model;

use PDO;

class PartnerManager extends AbstractManager
{
    public const TABLE = 'partner';

    public function insert(array $partner, ?string $uniqName): void
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `URL`, `logo`) 
        VALUES (:name, :URL, :logo)");
        $statement->bindValue('name', $partner['name'], PDO::PARAM_STR);
        $statement->bindValue('URL', $partner['URL'], PDO::PARAM_STR);
        $statement->bindValue('logo', $uniqName, PDO::PARAM_STR);
        $statement->execute();
    }
}
