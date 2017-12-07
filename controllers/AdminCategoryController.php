<?php

class AdminCategoryController
{
    public function actionIndex()
    {
        if (!User::isAdmin()) {
            header('location: /');
        }
        $categories = Category::getCategoryList();
        require_once ROOT . '/views/adminCategory/index.php';
        return true;
    }

    public function actionEdit($id)
    {
        if (!User::isAdmin()) {
            header('location: /');
        }
        $category = Category::getCategoryById($id);
        if (isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $sort = htmlspecialchars($_POST['sort_order']);
            $status = htmlspecialchars($_POST['status']);
            Category::updateCategoryById($id, $name, $sort, $status);
            header('location: /admin/category');
        }

        require_once ROOT . '/views/adminCategory/edit.php';
        return true;
    }

    public function actionDelete($id)
    {
        if (!User::isAdmin()) {
            header('location: /');
        }
        $category = Category::getCategoryById($id);
        if (isset($_POST['submit'])) {
            Category::deleteCategoryById($id);
            header('location: /admin/category');
        }

        require_once ROOT . '/views/adminCategory/delete.php';
        return true;
    }

    public function actionAdd()
    {
        if (!User::isAdmin()) {
            header('location: /');
        }
        if (isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $sort = htmlspecialchars($_POST['sort_order']);
            $status = htmlspecialchars($_POST['status']);
            Category::addCategory($name, $sort, $status);
            header('location: /admin/category');
        }

        require_once ROOT . '/views/adminCategory/add.php';
        return true;
    }
}