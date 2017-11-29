<?php

class CategoryController{

    public function actionIndex($category, $page = 1){
        $categoryList = Category::getCategoryList();
        $newsList = News::getNewsByCategory($category, $page);
        $categoryId = $category;
        $i = 0;
        $idsArray = array();
        foreach($newsList as $news){
            $idsArray[$i] = $news['id'];
            $i++;
        }
        $pathsToImages = News::getImagesForNews($idsArray);
        $categoryForNews = News::getCategoryForNews($idsArray);

        $total = News::getTotalNewsByCategory($category);
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');


        require_once ROOT.'/views/category/index.php';
        return true;
    }

    public function actionSort($category, $page = 1){
        $sort = $_GET['sort'];
        $paginationSort = '/?sort='.$sort;

        $categoryList = Category::getCategoryList();
        $newsList = News::getNewsByCategory($category, $page, $sort);
        $categoryId = $category;
        $i = 0;
        $idsArray = array();
        foreach($newsList as $news){
            $idsArray[$i] = $news['id'];
            $i++;
        }
        $pathsToImages = News::getImagesForNews($idsArray);
        $categoryForNews = News::getCategoryForNews($idsArray);

        $total = News::getTotalNewsByCategory($category);
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-', $paginationSort);


        require_once ROOT.'/views/category/index.php';
        return true;
    }
}