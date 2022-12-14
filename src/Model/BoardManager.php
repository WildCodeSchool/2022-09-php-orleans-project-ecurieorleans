<?php

namespace App\Model;

use PDO;

class BoardManager extends AbstractManager
{
    public const TABLE = 'member';

    public function selectAllMembersBySectionID(int $sectionId, string $orderBy = '', string $direction = 'ASC')
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' as x' .
            ' JOIN ' . SectionManager::TABLE . ' ON ' . SectionManager::TABLE . '.id=x.' .
            SectionManager::TABLE . '_id' . ' WHERE section_id=' . $sectionId;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    public function selectRoles()
    {
        return $this->pdo->query("SELECT `role` from " . self::TABLE)->fetchAll();
    }

    public function edit($member, $id)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET firstname=:fname, lastname=:lname,
        gender=:gender,phone=:phone, mail=:mail, is_board_member=:boardmember, `role`=:role WHERE id = :id ");
        $statement->bindValue(":id", $id);
        $statement->bindValue(":fname", $member['firstname']);
        $statement->bindValue(":lname", $member['lastname']);
        $statement->bindValue(":gender", $member['gender']);
        $statement->bindValue(":mail", $member['email']);
        $statement->bindValue(":phone", $member['phone']);
        $statement->bindValue(":boardmember", $member['boardmember']);
        $statement->bindValue(":role", $member['role']);
        $statement->execute();
    }
    public function add($member)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (firstname, lastname, gender, phone, mail,
         is_board_member, `role`) VALUES (:fname, :lname, :gender, 
         :phone, :mail, :boardmember, :role)");
        $statement->bindValue(":fname", $member['firstname']);
        $statement->bindValue(":lname", $member['lastname']);
        $statement->bindValue(":gender", $member['gender']);
        $statement->bindValue(":mail", $member['email']);
        $statement->bindValue(":phone", $member['phone']);
        $statement->bindValue(":boardmember", $member['boardmember']);
        $statement->bindValue(":role", $member['role']);
        $statement->execute();
    }
}
