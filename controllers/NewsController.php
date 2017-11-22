<?php

class NewsController{

    public function actionView($newsId){

        $categoryList = Category::getCategoryList();
        $newsItem = News::getNewsItem($newsId);
        $pathToImage = News::getImageForNewsItem($newsId);

        $categoryForNewsItem = News::getCategoryForNewsItem($newsId);

        require_once ROOT.'/views/newsitem/index.php';
        return true;
    }
}