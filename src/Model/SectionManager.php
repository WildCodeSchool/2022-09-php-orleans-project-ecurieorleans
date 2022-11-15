<?php

namespace App\Model;

use PDO;

class SectionManager extends AbstractManager
{
    public const TABLE = 'section';

    public function update(array $section): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `name` = :name, header = :header, presentation = :presentation WHERE id=:id");
        $statement->bindValue('id', $section['id'], PDO::PARAM_INT);
        $statement->bindValue('name', $section['name'], PDO::PARAM_STR);
        $statement->bindValue('header', $section['header'], PDO::PARAM_STR);
        $statement->bindValue('presentation', $section['presentation'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
