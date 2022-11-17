<?php

namespace App\Model;

use PDO;

class BoardManager extends AbstractManager
{
    public const TABLE = 'member';

    public function selectAllMembersBySectionID(int $sectionId, string $orderBy = '', string $direction = 'ASC')
    {
        $query = 'SELECT * FROM ' . self::TABLE . ' WHERE section_id=' . $sectionId;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
