<?php

class Product
{
    static private $db;

    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $product_group;

    public static function setConnection(mysqli $db)
    {
        self::$db = $db;
    }

    public function __construct($id, $newName, $newPrice, $newDescription,
                                $newStock, $newProduct_group)
    {

        $this->id = $id;
        $this->name = $newName;
        $this->description = $newDescription;
        $this->price = $newPrice;
        $this->stock = $newStock;
        $this->product_group = $newProduct_group;
    }

    public static function showAllProducts()
    {
        $ret = [];
        $sql = "SELECT * FROM products";
        $return = self::$db->query($sql);
        if ($return) {
            if ($return->num_rows > 0) {
                while ($row = $return->fetch_assoc()) {
                    $loadedProduct = new Product($row['product_id'], $row['name'], $row['price'],
                        $row['description'], $row['stock'], $row['product_group']);
                    $ret[] = $loadedProduct;
                }
                return $ret;
            }
        }
    }

    public static function createProduct($newName, $newPrice, $newDescription, $newStock, $newProduct_group)
    {
        //  if (is_string($newName) && is_string($newDescription) && is_numeric($newPrice)
        //  && is_int($newStock)){
        $sql = "INSERT INTO products (name,price,description,stock,product_group) VALUES
                    ('$newName','$newPrice','$newDescription','$newStock','$newProduct_group')";
        $result = self::$db->query($sql);
        if ($result) {
            $newProduct = new Product($result['product_id'], $result['name'], $result['price'], $result['description'], $result['stock'], $result['product_group']);
            return $newProduct;
        } else return false;
    }

    // }

    public static function removeProduct($name)
    {
        $sql = "DELETE FROM products WHERE name='$name'";
        $result = self::$db->query($sql);
        if ($result)
            return true;
        else return false;
    }


    public static function getProductObjectbyName($name)
    {
        $sql = "SELECT * FROM products WHERE name = '$name'";
        $return = self::$db->query($sql);
        if ($return) {
            $ret = [];
            while ($row = $return->fetch_assoc()) {
                $loadedProduct = new Product($row['product_id'], $row['name'], $row['price'],
                    $row['description'], $row['price'], $row['stock'], $row['product_group']);
                $ret[] = $loadedProduct;
            }
            return $ret;
        } else return false;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($newName)
    {
        if (is_string($newName) && strlen($newName) > 0 && strlen($newName) < 255) {
            $this->name = $newName;
        }
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($newDescription)
    {
        if (is_string($newDescription) && strlen($newDescription) > 0 && strlen($newDescription) < 255) {
            $this->description = $newDescription;
        }
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($newPrice)
    {
        if (is_numeric($newPrice) && $newPrice > 0 && $newPrice < 100000) {
            $this->price = round($newPrice, 2);
        }
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($newStock)
    {
        if (is_int($newStock) && $newStock >= 0) {
            $this->stock = $newStock;
        }
    }

    public function getProductGroup()
    {
        return $this->product_group;
    }

    public function setProductGroup($product_group)
    {
        $this->product_group = $product_group;
    }
}
