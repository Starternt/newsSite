<?php

class News{
    public static function getAllNewsList(){
        $db = Db::getConnection();

        $sql = "SELECT `id`, `title`, `category_id`, `short_description`, `add_date` FROM `news`
                WHERE `status` = 1";
        $result = $db->prepare($sql);
        $result->execute();

        $i = 0;
        $newsList = array();
        while($row = $result->fetch()){
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