<?php

class User
{
    /**
     * @param $email
     * @return bool
     */
    public static function checkLoginEmail($email)
    {
        $db = Db::getConnection();
        $sql = "SELECT `id` FROM `user` WHERE `email` = :email";
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email);
        $result->execute();

        if ($row = $result->fetch()) {
            return $row['id'];
        } else return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public static function getPasswordForLogin($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT `password` FROM `user` WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        if ($row = $result->fetch()) {
            return $row['password'];
        } else return false;
    }

    /**
     * @param $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * @return bool
     */
    public static function isLogged()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isAdmin()
    {
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user'];
            $db = Db::getConnection();
            $sql = "SELECT `role` FROM `user` WHERE `id` = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $role = $result->fetch();
            if ($role['role'] == "admin") {
                return true;
            } else return false;
        } else return false;
    }

    /**
     * @param $password
     */
    public static function updatePassword($password)
    {
        $db = Db::getConnection();
        $id = $_SESSION['user'];
        $sql = "UPDATE `user` SET `password` = :password WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam('password', $password);
        $result->bindParam('id', $id);
        $result->execute();
    }

    /**
     * @return mixed
     */
    public static function getPasswordForChange()
    {
        $db = Db::getConnection();
        $id = $_SESSION['user'];
        $sql = "SELECT `password` FROM `user` WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam('id', $id);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['password'];
    }

    /**
     * @param $email
     * @return mixed
     */
    public static function checkEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}