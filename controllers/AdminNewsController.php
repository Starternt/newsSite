<?php

class AdminNewsController
{
    public function actionIndex()
    {
        if (!User::isAdmin()) {
            header('location: /');
        }

        $news = News::getAllNewsListAdmin();
        $category = Category::getCategoryListAdmin();
        require_once ROOT . '/views/adminNews/index.php';
        return true;
    }

    public function actionAdd()
    {
        if (!User::isAdmin()) {
            header('location: /');
        }

        $categories = Category::getCategoryList();
        if (isset($_POST['submit'])) {
            $options = array();
            $options['title'] = $_POST['title'];
            $options['short_description'] = $_POST['short_description'];
            $options['description'] = $_POST['description'];
            $options['category'] = $_POST['category'];
            $options['status'] = $_POST['status'];
            $id = News::addNews($options);
            if ($id) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/img/$id.jpg");
                }
                header('location: /admin/news');
            }
        }
        require_once ROOT . '/views/adminNews/add.php';
        return true;
    }

    public function actionEdit($id)
    {
        if (!User::isAdmin()) {
            header('location: /');
        }

        $news = News::getNewsById($id);
        $categories = Category::getCategoryList();
        $newsImage = News::getImageForNewsItem($id);
        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['short_description'] = $_POST['short_description'];
            $options['description'] = $_POST['description'];
            $options['category_id'] = $_POST['category'];
            $options['status'] = $_POST['status'];
            if (News::updateNewsById($id, $options)) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/img/$id.jpg");
                }
                header('location: /admin/news');
            }
        }

        require_once ROOT . '/views/adminNews/edit.php';
        return true;
    }

    public function actionDelete($id)
    {
        if (!User::isAdmin()) {
            header('location: /');
        }

        $news = News::getNewsById($id);
        if (isset($_POST['submit'])) {
            News::deleteNewsById($id);
            header('location: /admin/news');
        }

        require_once ROOT . '/views/adminNews/delete.php';
        return true;
    }

    public function actionView($id)
    {
        if (!User::isAdmin()) {
            header('location: /');
        }
        $categoryList = Category::getCategoryList();
        $newsItem = News::getNewsItem($id);
        $pathToImage = News::getImageForNewsItem($id);

        $categoryForNewsItem = News::getCategoryForNewsItem($id);

        require_once ROOT . '/views/adminNews/view.php';
        return true;
    }
}