<?php

class News
{
    const SHOW_BY_DEFAULT = 6;
    public static function getAllNewsList($page = 1, $sort = 'DESC')
    {
        $db = Db::getConnection();

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $limit = self::SHOW_BY_DEFAULT;

        $sql = "SELECT `id`, `title`, `category_id`, `short_description`, `add_date` FROM `news`
                WHERE `status` = 1 ORDER BY `add_date` $sort LIMIT :limit OFFSET :offset";
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        $newsList = array();
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['short_description'] = $row['short_description'];
            $newsList[$i]['add_date'] = $row['add_date'];
            $i++;
        }
        return $newsList;
    }

    public static function getNewsByCategory($categoryId, $page = 1, $sort = 'DESC'){
        $db = Db::getConnection();

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $limit = self::SHOW_BY_DEFAULT;

        $sql = "SELECT `id`, `title`, `category_id`, `short_description`, `add_date` FROM `news`
                WHERE `status` = 1 AND `category_id` = :categoryId ORDER BY `add_date` $sort LIMIT :limit OFFSET :offset";
        $result = $db->prepare($sql);
        $result->bindParam(':categoryId', $categoryId);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        $newsList = array();
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['short_description'] = $row['short_description'];
            $newsList[$i]['add_date'] = $row['add_date'];
            $i++;
        }
        return $newsList;
    }

    public static function getNewsItem($id){
        $db = Db::getConnection();
        $sql = "SELECT `id`, `title`, `category_id`, `description`, `add_date` FROM `news`
                WHERE `status` = 1 AND `id` = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row;
    }

    public static function getCategoryForNews($arrayIds)
    {
        if($arrayIds == false){
            return false;
        }
        $db = Db::getConnection();
//        $ids = implode(",", $arrayIds);
        $ids = str_repeat('?,', count($arrayIds) - 1) . '?';
//        $sql = 'SELECT category.name, news.id FROM category LEFT JOIN news ON category.id = news.category_id WHERE news.id IN ('.$ids.')';
        $sql = "SELECT category.name, news.id FROM category LEFT JOIN news ON category.id = news.category_id WHERE news.id IN ($ids)";

        $result = $db->prepare($sql);
//        $result->bindParam(':ids', $ids);
        $result->execute($arrayIds);
        $i = 3;
        $listIds = array();
        while ($row = $result->fetch()) {
            $listIds[$row['id']]['name'] = $row['name'];
            $i++;
        }
        return $listIds;
    }

    public static function getCategoryForNewsItem($id){
        $db = Db::getConnection();
        $sql = "SELECT category.name, news.id FROM category LEFT JOIN news ON category.id = news.category_id WHERE news.id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['name'];
    }
//SELECT category.name FROM category LEFT JOIN news ON category.id = news.category_id WHERE news.id IN (4, 6, 7);


    public static function getTotalNewsMainPage(){
        $db = Db::getConnection();

        $sql = "SELECT COUNT(`id`) as count FROM news";
        $result = $db->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getTotalNewsByCategory($categoryId){
        $db = Db::getConnection();

        $sql = "SELECT COUNT(`id`) AS count FROM news WHERE `category_id` = :categoryId";
        $result = $db->prepare($sql);
        $result->bindParam(':categoryId', $categoryId);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getImageForNewsItem($id){
        $path = '/upload/img/'.$id.'.jpg';
        $noImage = "No image";
        if(file_exists(ROOT.$path)){
            return $path;
        }
        else return $noImage;
    }
    public static function getImagesForNews($ids){
        $FirstPart = '/upload/img/';
        $expansion = '.jpg';
        $noImage = "No image";
        $paths = array();
        foreach($ids as $id){
            $paths[$id]['path'] = $FirstPart.$id.$expansion;
            if(!file_exists(ROOT.$paths[$id]['path'])){
                $paths[$id]['path'] = $noImage;
            }
        }
        return $paths;
    }

    public static function getAllNewsListAdmin()
    {
        $db = Db::getConnection();

        $sql = "SELECT `id`, `title`, `category_id`, `short_description`, `add_date`, `status` FROM `news`";
        $result = $db->prepare($sql);
        $result->execute();

        $i = 0;
        $newsList = array();
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['short_description'] = $row['short_description'];
            $newsList[$i]['add_date'] = $row['add_date'];
            $newsList[$i]['status'] = $row['status'];
            $i++;
        }
        return $newsList;
    }

    public static function addNews($options){
        $db = Db::getConnection();
        $sql = "INSERT INTO `news`(`title`, `category_id`, `short_description`, `description`, `status`)
                VALUES(:title, :category, :short_description, :description, :status)";
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':category', $options['category'], PDO::PARAM_INT);
        $result->bindParam(':short_description', $options['short_description'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->execute();
        if($result->execute()){
            return $db->lastInsertId();
        }
        else return false;
    }

    public static function deleteNewsById($id){
        $db = Db::getConnection();
        $sql = "DELETE FROM `news` WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
    }

    public static function getNewsById($id){
        $db = Db::getConnection();
        $sql = "SELECT * FROM `news` WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    public static function updateNewsById($id, $options){
        $db = Db::getConnection();
        $sql = "UPDATE `news` SET `title` = :title, `category_id` = :category_id, `short_description` = :short_description, 
                `description` = :description, `status` = :status WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title']);
        $result->bindParam(':category_id', $options['category_id']);
        $result->bindParam(':short_description', $options['short_description']);
        $result->bindParam(':description', $options['description']);
        $result->bindParam(':status', $options['status']);
        $result->bindParam(':id', $id);
        $result->execute();
        if($result->execute()){
            return true;
        }
        else return false;
    }

}
