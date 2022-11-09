<?php

namespace App\Model;

use PDO;

class BoardManager extends AbstractManager
{
    public const TABLE = 'member';

    public function selectAllBoardMembers(string $orderBy = '', string $direction = 'ASC', bool $is_board_member = true): array
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE is_board_member = ' . $is_board_member;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
