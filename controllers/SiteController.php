<?php

class SiteController
{
    public function actionIndex($page = 1)
    {
        $categoryList = Category::getCategoryList();
        $newsList = News::getAllNewsList($page);
        $i = 0;
        $idsArray = array();
        foreach ($newsList as $news) {
            $idsArray[$i] = $news['id'];
            $i++;
        }
        $categoryForNews = News::getCategoryForNews($idsArray);
        $pathsToImages = News::getImagesForNews($idsArray);

        $total = News::getTotalNewsMainPage();
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        require_once ROOT . '/views/site/index.php';
        return true;
    }

    public function actionSort($page = 1)
    {
        $sort = $_GET['sort'];
        // Переменная для класса Pagination. Добавляет в адрес ссылок сортировку
        $paginationSort = '/?sort=' . $sort;

        $categoryList = Category::getCategoryList();
        $newsList = News::getAllNewsList($page, $sort);
        $i = 0;
        $idsArray = array();
        foreach ($newsList as $news) {
            $idsArray[$i] = $news['id'];
            $i++;
        }
        $categoryForNews = News::getCategoryForNews($idsArray);
        $pathsToImages = News::getImagesForNews($idsArray);

        $total = News::getTotalNewsMainPage();
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-', $paginationSort);

        require_once ROOT . '/views/site/index.php';
        return true;
    }
}