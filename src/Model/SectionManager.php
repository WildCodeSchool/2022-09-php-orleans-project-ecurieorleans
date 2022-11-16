<?php

namespace App\Model;

use PDO;

class SectionManager extends AbstractManager
{
    public const TABLE = 'section';

    public function insert(array $section, ?string $uniqueFileName): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, header, presentation) VALUES (:name, :header, :presentation)");
        $statement->bindValue('name', $section['name'], PDO::PARAM_STR);
        $statement->bindValue('header', $uniqueFileName, PDO::PARAM_STR);
        $statement->bindValue('presentation', $section['presentation'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
