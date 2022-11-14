<?php

namespace App\Model;

use PDO;

class EventManager extends AbstractManager
{
    public const TABLE = 'event';

    public function addCard(array $event, $extension)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " 
        (imgPath, title, course, raceDate, paragraph) VALUES (:imgPath, :title, :course, :raceDate, :paragraph)");
        $statement->bindValue(":imgPath", $extension, PDO::PARAM_STR);
        $statement->bindValue(":title", $event['raceName'], PDO::PARAM_STR);
        $statement->bindValue(":course", $event['sportSelect'], PDO::PARAM_STR);
        $statement->bindValue(":raceDate", $event['date'], PDO::PARAM_STR);
        $statement->bindValue(":paragraph", $event['raceDescription'], PDO::PARAM_STR);
        $statement->execute();
    }
}
