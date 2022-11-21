<?php

namespace App\Model;

use PDO;

class EventManager extends AbstractManager
{
    public const TABLE = 'event';

    public function addCard(array $event, $extension)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " 
        (imgPath, title, raceDate, paragraph, section_id) VALUES 
        (:imgPath, :title, :raceDate, :paragraph, :section_id)");
        $statement->bindValue(":imgPath", $extension, PDO::PARAM_STR);
        $statement->bindValue(":title", $event['raceName'], PDO::PARAM_STR);
        $statement->bindValue(":raceDate", $event['date'], PDO::PARAM_STR_CHAR);
        $statement->bindValue(":paragraph", $event['raceDescription'], PDO::PARAM_STR);
        $statement->bindValue(":section_id", $event['sportSelect'], PDO::PARAM_INT);
        $statement->execute();
    }
    public function update(array $events, ?string $uniqueFileName, $id): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET  imgPath = :imgPath, title = :title,
        raceDate = :raceDate, paragraph = :paragraph, section_id = :section_id WHERE id=:id");
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->bindValue('title', $events['raceName'], PDO::PARAM_STR);
        $statement->bindValue('imgPath', $uniqueFileName, PDO::PARAM_STR);
        $statement->bindValue("raceDate", $events['date'], PDO::PARAM_STR_CHAR);
        $statement->bindValue('paragraph', $events['raceDescription'], PDO::PARAM_STR);
        $statement->bindValue("section_id", $events['sportSelect'], PDO::PARAM_INT);
        return $statement->execute();
    }

    public function selectAllEventsBySectionID(int $sectionId, string $orderBy = '', string $direction = 'ASC')
    {
        $query = 'SELECT * FROM ' . self::TABLE . ' WHERE section_id=' . $sectionId;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
