<?php

class Category
{
    /**
     * @return array
     */
    public static function getCategoryList()
    {
        $db = Db::getConnection();

        $sql = "SELECT `id`, `name`, `sort_order`, `status` FROM `category`";
        $result = $db->prepare($sql);
        $result->execute();

        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * @return array
     */
    public static function getCategoryListAdmin()
    {
        $db = Db::getConnection();

        $sql = "SELECT `id`, `name` FROM `category`";
        $result = $db->prepare($sql);
        $result->execute();

        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$row['id']]['name'] = $row['name'];
        }
        return $categoryList;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getCategoryById($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM `category` WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    /**
     * @param $id
     * @param $name
     * @param $sort
     * @param $status
     */
    public static function updateCategoryById($id, $name, $sort, $status)
    {
        $db = Db::getConnection();
        $sql = "UPDATE `category` SET `name` = :name, `sort_order` = :sort, `status` = :status WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':sort', $sort);
        $result->bindParam(':status', $status);
        $result->bindParam(':id', $id);
        $result->execute();
    }

    /**
     * @param $id
     */
    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM `category` WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
    }

    /**
     * @param $name
     * @param $sort
     * @param $status
     */
    public static function addCategory($name, $sort, $status)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO `category`(`name`, `sort_order`, `status`) VALUES(:name, :sort, :status)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':sort', $sort);
        $result->bindParam(':status', $status);
        $result->execute();
    }
}