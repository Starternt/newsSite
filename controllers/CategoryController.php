<?php

class CategoryController{

    public function actionIndex($category, $page = 1){
        $categoryList = Category::getCategoryList();
        $newsList = News::getNewsByCategory($category, $page);

        $i = 0;
        $idsArray = array();
        foreach($newsList as $news){
            $idsArray[$i] = $news['id'];
            $i++;
        }
        $categoryForNews = News::getCategoryForNews($idsArray);

        $total = News::getTotalNewsByCategory($category);
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');


        require_once ROOT.'/views/category/index.php';
        return true;
    }
}