<?php

class AdminController{

    public function actionLogin(){
        if(User::isAdmin()){
            header('location: /admin/cabinet');
        }
        $email = false;
        $password = false;
        $checkResult = false;
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $checkResult = User::checkLoginData($password, $email);
            if($checkResult){
                User::auth($checkResult);
                header('location: /admin/cabinet');
            }
        }

        require_once ROOT.'/views/admin/login.php';
        return true;
    }

    public function actionIndex()
    {
        if (!User::isAdmin()) {
            header('location: /');
        }

        require_once ROOT . '/views/admin/cabinet.php';
        return true;
    }

    public function actionLogout(){
        unset($_SESSION['user']);
        header('location: /');
    }

    public function actionChange(){
        $newPassword = false;
        if(isset($_POST['submit'])){
            $oldPassword = $_POST['oldPassword'];
            $oldHash = User::getPassword();
            if(password_verify($oldPassword, $oldHash)){
                   $newPassword = $_POST['newPassword'];
                   $newHash = password_hash($newPassword, PASSWORD_DEFAULT);
                   User::updatePassword($newHash);
                   header('location: /admin/cabinet');
            }
        }
        require_once ROOT.'/views/admin/change.php';
        return true;
    }
}