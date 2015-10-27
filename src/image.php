<?php


class Image
{
    static private $db;
    private $imageId;
    private $image_productId;
    private $image_pwd;


    public
    static function setConnection(mysqli $db)
    {
        self::$db = $db;
    }

    public function __constructor($imageId, $image_productId, $image_pwd)
    {
        $this->image_productId = $image_productId;
        $this->image_pwd = $image_pwd;
        $this->imageId = $imageId;
    }


    public static function AddImage($image_productId, $image_pwd)
    {
        $sql = "INSERT INTO images (product_id, link) VALUES ('$image_productId', '$image_pwd')";
        $re = self::$db->query($sql);
        if ($re) {
            $imageId = self::$db->insert_id;
            $newImage = new Image($imageId, $image_productId, $image_pwd);
            return $newImage;
        }
        return false;
    }

    public static function loadImgbyProduct(Product $product){
         $m = $product->getId();
        $sql = "SELECT * FROM images where product_id = '$m'";
        $re = self::$db->query($sql);
        if ($re) {


           return $re['link'];

        }

    }
}

