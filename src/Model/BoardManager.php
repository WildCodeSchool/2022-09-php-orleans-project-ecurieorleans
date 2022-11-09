<?php

namespace App\Model;

use PDO;

class BoardManager extends AbstractManager
{
    public const TABLE = 'member';

    public function selectAllBoardMembers(
        bool $isBoardMember,
        string $orderBy = '',
        string $direction = 'ASC'
    ): array {
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE is_board_member = ' . $isBoardMember;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
