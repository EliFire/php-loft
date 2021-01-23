<?php

class Burger
{

    public function getUserByEmail(string $email)
    {
        $db = Db::getInstance();//подключение к БД
        $query = "select * from users where email = :email";//запрос
        return $db->fetchOne($query, __METHOD__, [':email' => $email]);//защита от инъекций
    }

    public function createUser(string $email, string $name)
    {
        $db = Db::getInstance();
        $query = "insert into users(email, `name`) values (:email, :name)";
        $result = $db->exec($query,
            __METHOD__,
            [
                ':email' => $email,
                ':name' => $name
            ]
        );

        if (!$result) {
            return false;
        }
        return $db->lastInsertId();
    }

    public function addOrder(int $userId, array $data)
    {
        $db = Db::getInstance();
        $query = "insert into orders(user_id, adress, created_at) values(:user_id, :adress, :created_at)";
        return $db->exec(
            $query,
            __METHOD__,
            [
                ':userId' => $userId,
                ':adress' => $data['adress'],
                ':created_at' => date('Y-m-d H:i:s')
            ]
        );

        if (!$result) {
            return false;
        }
        return $db->lastInsertId();
    }

    public function incOrders(int $userId)
    {
        $db = Db::getInstance();
        $query = "update users set orders_count = orders_count + 1 where id = $userId";
        return $db->exec($query, __METHOD__);
    }

}