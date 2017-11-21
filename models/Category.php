<?php

class Category{
    public static function getCategoryList(){
        $db = Db::getConnection();

        $sql = "SELECT `id`, `name`, `sort_order`, `status` FROM `category`";
        $result = $db->prepare($sql);
        $result->execute();

        $i = 0;
        $categoryList = array();
        while($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }
}