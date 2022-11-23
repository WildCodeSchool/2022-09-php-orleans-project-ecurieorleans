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
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            " (`name`, header, presentation, manager_id, adjunct_id, trainer_id) 
        VALUES (:name, :header, :presentation, :manager_id, :adjunct_id, :trainer_id)");
        $statement->bindValue('name', $section['name'], PDO::PARAM_STR);
        $statement->bindValue('header', $uniqueFileName, PDO::PARAM_STR);
        $statement->bindValue('presentation', $section['presentation'], PDO::PARAM_STR);
        $statement->bindValue('manager_id', $section['manager'], PDO::PARAM_INT);
        $statement->bindValue('adjunct_id', $section['adjunct'], PDO::PARAM_INT);
        $statement->bindValue('trainer_id', $section['trainer'], PDO::PARAM_INT);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $section, ?string $uniqueFileName): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET `name` = :name, header = :header,
        presentation = :presentation, manager_id= :manager_id, adjunct_id= 
        :adjunct_id, trainer_id= :trainer_id WHERE id=:id");
        $statement->bindValue('id', $section['id'], PDO::PARAM_INT);
        $statement->bindValue('name', $section['name'], PDO::PARAM_STR);
        $statement->bindValue('header', $uniqueFileName, PDO::PARAM_STR);
        $statement->bindValue('presentation', $section['presentation'], PDO::PARAM_STR);
        $statement->bindValue('manager_id', $section['manager'], PDO::PARAM_INT);
        $statement->bindValue('adjunct_id', $section['adjunct'], PDO::PARAM_INT);
        $statement->bindValue('trainer_id', $section['trainer'], PDO::PARAM_INT);

        return $statement->execute();
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

    public function selectJoinSectionOnRoleID(int $sectionId, string $orderBy = '', string $direction = 'ASC')
    {
        $query = 'SELECT s.*, m.firstname as managerf, m.lastname managerl, m2.firstname as adjunctf, 
        m2.lastname as adjunctl, m3.firstname as trainerf, m3.lastname as trainerl  FROM ' . static::TABLE . ' as s' .
            ' JOIN ' . BoardManager::TABLE . ' as m ON m.id=s.manager_id' .
            ' JOIN ' . BoardManager::TABLE . ' as m2 ON m2.id=s.adjunct_id' .
            ' JOIN ' . BoardManager::TABLE . ' as m3 ON m3.id=s.trainer_id' .
            ' WHERE s.id=' . $sectionId;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
