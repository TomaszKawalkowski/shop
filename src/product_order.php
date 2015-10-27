<?php

class ProductOrder{
    static private $db;

    private $order_id;
    private $product_id;

    public static function setConnection(mysqli $newConnection){
        self::$db=$newConnection;
    }

    public function __construct($newOrderId,$newProductId){
        $this->setOrderId($newOrderId);
        $this->setProductId($newProductId);
    }

    public function createPosition($newOrderId,$newProductId){
        $sql = "INSERT INTO product_order (order_id,product_id) VALUES ({$newOrderId},{$newProductId})";
        echo("query=".$sql);
        $return = self::$db->query($sql);
        if($return){
            $newProductOrder = new ProductOrder($newOrderId,$newProductId);
            return $newProductOrder;
        }
        else return false;
    }

    public function getProductsByOrderId($orderId){
        $ret=[];
        $sql = "SELECT * FROM product_order WHERE order_id={$orderId}";
        $return = self::$db->query($sql);
        if($return){
            if ($return->num_rows > 0){
                while($row = $return->fetch_assoc()){
                    $ret[] = $row;
                }
                return $ret;
            }
        }
        else return false;
    }

    public function getOrderId(){
        return $this->order_id;
    }

    public function setOrderId($order_id){
        if (is_int($order_id)){
            $this->order_id = $order_id;
        }
    }


    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id){
        if (is_int($product_id)){
            $this->product_id = $product_id;
        }
    }

}