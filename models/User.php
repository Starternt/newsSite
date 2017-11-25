<?php

class User{

    public static function checkLoginData($pass, $email){
        $db = Db::getConnection();
        $sql = "SELECT * FROM `user` WHERE `email` = :email AND `password` = :pass";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email);
        $result->bindParam(':pass', $pass);
        $result->execute();

        if($row = $result->fetch()){
            return $row['id'];
        }
        else return false;
    }

    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }
    public static function isLogged(){
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }
    public static function isAdmin(){
        if(isset($_SESSION['user'])) {
            $id = $_SESSION['user'];
            $db = Db::getConnection();
            $sql = "SELECT `role` FROM `user` WHERE `id` = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $role = $result->fetch();
            if($role['role'] == "admin"){
                return true;
            }
            else return false;
        }
        else return false;
    }
}