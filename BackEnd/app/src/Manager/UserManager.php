<?php

namespace App\Manager;

use App\Entity\User;

class UserManager extends BaseManager
{

    /**
     * @return User[]
     */


    public function insertUser(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO User (password, username) VALUES (:password, :username)");
        $query->bindValue("password", $user->getHashedPassword(), \PDO::PARAM_STR);
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->execute();
    }
}
