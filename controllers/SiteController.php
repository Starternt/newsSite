<?php
class SiteController{
    public function actionIndex(){
        $categoryList = Category::getCategoryList();
        $newsList = News::getAllNewsList();

        require_once ROOT.'/views/site/index.php';
    }
}