<?php

namespace App\Model;

use PDO;
use App\Model\BoardManager;
use App\Model\EventManager;
use App\Model\PartnerManager;

class SectionManager extends AbstractManager
{
    public const TABLE = 'section';

    public function insert(array $section, ?string $uniqueFileName): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, header, presentation) 
        VALUES (:name, :header, :presentation)");
        $statement->bindValue('id', $section['id'], PDO::PARAM_INT);
        $statement->bindValue('name', $section['name'], PDO::PARAM_STR);
        $statement->bindValue('header', $uniqueFileName, PDO::PARAM_STR);
        $statement->bindValue('presentation', $section['presentation'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $section, ?string $uniqueFileName): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `name` = :name, header = :header,
        presentation = :presentation WHERE id=:id");
        $statement->bindValue('id', $section['id'], PDO::PARAM_INT);
        $statement->bindValue('name', $section['name'], PDO::PARAM_STR);
        $statement->bindValue('header', $uniqueFileName, PDO::PARAM_STR);
        $statement->bindValue('presentation', $section['presentation'], PDO::PARAM_STR);

        return $statement->execute();
    }

    public function selectSectionIDofMember(int $id, string $orderBy = '', string $direction = 'ASC')
    {
        $query = 'SELECT x.id FROM ' . BoardManager::TABLE . ' as x' .
            ' LEFT JOIN ' . static::TABLE . ' ON ' . static::TABLE . '.id=x.' .
            static::TABLE . '_id' . ' WHERE ' . static::TABLE . '.id=' . $id;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    public function selectSectionIDofPartner(int $id, string $orderBy = '', string $direction = 'ASC')
    {
        $query = 'SELECT x.id FROM ' . PartnerManager::TABLE . ' as x' .
            ' LEFT JOIN ' . static::TABLE . ' ON ' . static::TABLE . '.id=x.' .
            static::TABLE . '_id' . ' WHERE ' . static::TABLE . '.id=' . $id;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
    public function selectSectionIDofEvent(int $id, string $orderBy = '', string $direction = 'ASC')
    {
        $query = 'SELECT x.id FROM ' . EventManager::TABLE . ' as x' .
            ' LEFT JOIN ' . static::TABLE . ' ON ' . static::TABLE . '.id=x.' .
            static::TABLE . '_id' . ' WHERE ' . static::TABLE . '.id=' . $id;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
