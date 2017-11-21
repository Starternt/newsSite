<?php

class News
{
    const SHOW_BY_DEFAULT = 6;
    public static function getAllNewsList($page = 1)
    {
        $db = Db::getConnection();
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $limit = self::SHOW_BY_DEFAULT;

        $sql = "SELECT `id`, `title`, `category_id`, `short_description`, `add_date` FROM `news`
                WHERE `status` = 1 LIMIT :limit OFFSET :offset";
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

    public static function getCategoryForNews($arrayIds)
    {
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
        while($row = $result->fetch()){
            $listIds[$row['id']]['name'] = $row['name'];
            $i++;
        }
        return $listIds;
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

        $sql = "SELECT COUNT(`id`) as count FROM news WHERE `category` = :categoryId";
        $result = $db->prepare($sql);
        $result->bindParam(':categoryId', $categoryId);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getNewsByCategory($categoryId, $page = 1){
        $db = Db::getConnection();

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $limit = self::SHOW_BY_DEFAULT;

        $sql = "SELECT `id`, `title`, `category_id`, `short_description`, `add_date` FROM `news`
                WHERE `status` = 1 AND `category_id` = :categoryId LIMIT :limit OFFSET :offset";
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


}