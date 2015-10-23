<?php

class Product{
    static private $db;

    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $product_group;

    public static function setConnection(mysqli $newConnection){
        self::$db = $newConnection;
    }

    public function __construct($newId,$newName, $newPrice,$newDescription,$newStock,$newProduct_group){
        $this->$newId;
        $this->setName($newName);
        $this->setDescription($newDescription);
        $this->setPrice($newPrice);
        $this->setStock($newStock);
        $this->setProductGroup($newProduct_group);
    }

    public static function showAllProducts(){
        $ret=[];
        $sql = "SELECT * FROM products";
        $return = self::$db->query($sql);
        if (!$return){
            if ($return->num_rows>0){
                while ($row = $return->fetch_assoc()){
                    $loadedProduct = new Product($row['product_id'],$row['name'],$row['price'],
                        $row['description'],$row['price'], $row['stock'],$row['product_group']);
                    $ret[]=$loadedProduct;
                }
            }
        }
    }

    public static function createProduct($newName, $newDescription, $newPrice, $newProduct_group){
        if (is_string($newName) && is_string($newDescription) && is_numeric($newPrice) ){
            $sql = "INSERT INTO products (name,price,description,stock) VALUES
                    ('$newName',$newPrice,'$newDescription',0,$newProduct_group)";
            $result = self::$db->query($sql);
            if(!$result){
                $newProduct = new Product($result->insert_id,'$newName',
                                    '$newDescription', $newPrice, $newProduct_group);
                return $newProduct;
            }
            else return false;
        }

    }

    public function removeProduct(Product $product){
        $sql = "DELETE FROM products WHERE product_id={$product->getId()}";
        $result = self::$db->query($sql);
        if (!$result)
            return true;
        else return false;
    }

    public function changeStock(Product $product, $quantity){
        $sql = "SELECT * FROM product WHERE product_id={$product->getId()}";
        $result = self::$db->query($sql);
        if (!$result && is_int($quantity) && $quantity<=$result->getStock()){
            $newQuantity = $result->getStock() + $quantity;
            $sql = "INSERT INTO products (stock) VALUES $newQuantity WHERE product_id={$product->getId()}";
            $result = self::$db->query($sql);
            if (!$result)
                return true;
            else return false;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($newName){
        if (is_string($newName) && strlen($newName)>0 && strlen($newName)<255){
            $this->name = $newName;
        }
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($newDescription)
    {
        if (is_string($newDescription) && strlen($newDescription)>0 && strlen($newDescription)<255){
            $this->description = $newDescription;
        }
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($newPrice){
        if (is_numeric($newPrice) && $newPrice>0 && $newPrice <100000){
        $this->price = round($newPrice,2);
        }
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($newStock){
        if (is_int($newStock) && $newStock >= 0){
        $this->stock = $newStock;
        }
    }

    public function getProductGroup(){
        return $this->product_group;
    }

    public function setProductGroup($product_group){
        $this->product_group = $product_group;
    }
}
