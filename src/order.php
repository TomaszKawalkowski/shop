<?php
class Order{
    private static $db;

    private $order_id;
    private $user_id;
    private $order_status;

    public static function setConnection(mysqli $newConnection){
        self::$db = $newConnection;
    }

    public function __construct($newId, $newUser,$newOrderStatus){
        $this->order_id = $newId;
        $this->user_id = $newUser;
        $this->order_status = $newOrderStatus;
    }

    public function createOrder($newUserId){
        $orderStatus = false;
        $sql = "INSERT INTO orders (user_id) VALUES ($newUserId)";
        $result = self::$db->query($sql);
        if( !$result){
            $newOrder = new Order($result->insert_id,$newUserId,$orderStatus);
            return $newOrder;
        }
        else
            return false;
    }

    public function getAllOrdersByUser_id($newId){
        $ret = [];
        $sql = "SELECT * FROM orders WHERE user_id={$newId}";
        $return  = self::$db->query($sql);
        if (!$return){
            if ($return->num_rows()>0){
                while ($row = $return->fetch_assoc()){
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

    public function getUserId(){
        return $this->user_id;
    }

    public function setUserId($user_id){
        if (is_int($user_id))
        $this->user_id = $user_id;
    }

    public function getOrder_status(){
        return $this->order_status;
    }

    public function setOrder_status($newOrder_status){
        if (is_bool($newOrder_status))
            $this->order_status = $newOrder_status;
    }

}