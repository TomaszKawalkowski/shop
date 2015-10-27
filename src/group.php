<?php


class Group
{
    static private $db;
    private $groupId;
    private $groupName;


    public static function setConnection(mysqli $db)
    {
        self::$db = $db;
    }

    public function __construct($newId, $newName)
    {
        $this->groupId = $newId;
        $this->groupName = $newName;

    }

    public static function createGroup($newName)
    {
        if (is_string($newName)) {
            $sql = "INSERT INTO product_group (product_group_name) VALUES
                    ('$newName')";
            $result = self::$db->query($sql);
            if ($result) {
                $newGroup = new Group ($result['product_group_ID'], $result['product_group_name']);

                return $newGroup;
            } else return false;
        }
    }

    public static function removeGroup($name)
    {
        $sql = "DELETE FROM product_group WHERE product_group_name = '$name'";
        $result = self::$db->query($sql);
        if ($result)
            return true;
        else return false;
    }

    public static function showAllGroups()
    {
        $ret = [];
        $sql = "SELECT * FROM product_group";
        $return = self::$db->query($sql);
        if ($return) {
            if ($return->num_rows > 0) {
                while ($row = $return->fetch_assoc()) {
                    $loadedGroup = new Group($row['product_group_ID'], $row['product_group_name']);
                    $ret[] = $loadedGroup;
                }
                return $ret;
            }
        }
    }

    public static function showNamebyId($id)
    {
        $ret = [];
        $sql = "SELECT  * FROM product_group  WHERE product_group_ID = '$id'";
        $return = self::$db->query($sql);
        if ($return) {

          $row = $return->fetch_assoc();
                $loadedGroup = new Group($row['product_group_ID'], $row['product_group_name']);


            return   $loadedGroup ;
        }

    }

    public function getGroupName()
    {
        return $this->groupName;
    }

    public function getGroupId()
    {
        return $this->groupId;
    }
}