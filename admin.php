<?php


require_once('src/connection.php');
require_once('meta.html');
require_once('menu.php');

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->getEmail() != 'admin@admin') {
        echo '<br><br><br><br><br><h1 style="text-align: center; color: red; background-color: yellow">You are not authorized to see this page !!!<br><br> Immediately Call someone smarter !!!';
        die;

    }
}

if ((!$_SESSION['user'])) {
    echo '<br><br><br><br><br><h1 style="text-align: center; color: red; background-color: yellow">You are not authorized to see this page !!!<br><br> Immediately Call someone smarter !!!';
    die;
}

if (($_SERVER['REQUEST_METHOD']) == 'POST') {
//zarzadzanie grupa
    if (isset($_POST['sel1'])) {
        $groupToDelete = $_POST['sel1'];
        Group::removeGroup($groupToDelete);
    }
    if (isset($_POST['newgroup'])) {
        $groupToAdd = $_POST['newgroup'];
        Group::createGroup($groupToAdd);
    }

//zarzadzenie produktem
}
if (isset($_POST['product'])) {
    $productToDelete = $_POST['product'];
    Product::removeProduct($productToDelete);
}
if (isset($_POST['productname'])) {
    $productName = $_POST['productname'];
}
if (isset($_POST['productdescription'])) {
    $productDescription = $_POST['productdescription'];
}
if (isset($_POST['productstock'])) {
    $productStock = $_POST['productstock'];
}
if (isset($_POST['productstock'])) {
    $productPrice = $_POST['productstock'];
}
if (isset($_POST['group'])) {
    $productGroup = $_POST['group'];
}
if (isset($_POST['productname'])) {
    $productToAdd = $_POST['productname'];
    Product::createProduct($productName, $productPrice, $productDescription, $productStock, $productGroup);
}

//zarzadzanie obrazkami
if (isset($_FILES['imageToLoad'])) {
    $imageToLoad = $_FILES['imageToLoad'];
    $dir = dirname(__FILE__);
    $uploadDir = $dir . '/product_image';

    $fileName = $imageToLoad['name'];
    $tmp_name = $imageToLoad['tmp_name'];

    $fileDir = $uploadDir . '/' . $fileName;
    move_uploaded_file($tmp_name, $fileDir);
    if (isset($_POST['image_product'])) {
        $productName = $_POST['image_product'];
        $ret = Product::getProductObjectbyName($productName);
        $productId = $ret[0]->getId();
        $newImage = Image::AddImage($productId, $fileDir);
    }
}
?>


<div class="container">
    <div style="height: 75px;"></div>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header" STYLE="letter-spacing: 2px; color:beige;">Admin Page</div>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6">
                    <div class="header firstanime" id="Group_Management">Group Management</div>
                    <div class="anime">
                        <form action="" id="cargroup" method="post">
                            <div class="form-group">
                                <select class="form-control formadmin" id="sel1" name="sel1">
                                    <?Php
                                    $ret = Group::showAllGroups();

                                    for ($i = 0;
                                         $i < count($ret);
                                         $i++) {
                                        echo '<option value=' . $ret[$i]->getGroupName() . '>' . $ret[$i]->getGroupName() . '</option>';
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-info del">
                                    Del <i class="fa fa-trash-o" style="font-size:18px;"></i>
                                    </i></button>
                            </div>
                        </form>
                        <form action="" id="newgroup" method="post">

                            <div style="clear:both; height: 10px;"></div>
                            <div class="form-group formadmin">

                                <input type="text" class="form-control" name="newgroup" id="newgroup"
                                       placeholder="write a name of a new group ...">
                            </div>
                            <button type="submit" class="btn btn-info del">New
                                <i class="fa fa-plus-square" style="font-size:18px;">
                                </i></button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="header firstanime" id="Product_Management">Product Managament</div>
                    <div class="anime">
                        <form action="" id="cargroup" method="post">

                            <div class="form-group">
                                <select class="form-control formadmin" id="product" name="product">
                                    <?Php
                                    $ret = Product::showAllProducts();

                                    for ($i = 0;
                                         $i < count($ret);
                                         $i++) {
                                        echo '<option value=' . $ret[$i]->getName() . '>' . $ret[$i]->getName() . '</option>';
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-info del">Del
                                    <i class="fa fa-trash-o" style="font-size:18px;"></i>
                                    </i></button>
                            </div>
                        </form>
                        <form action="" id="newproduct" method="post">

                            <div style="clear:both; height: 10px;"></div>
                            <div class="form-group formadmin">

                                <input type="text" class="form-control" name="productname"
                                       placeholder="set a name of a new product ...">
                                <input type="text" class="form-control" name="productdescription"
                                       placeholder="set a description of a new product ...">
                                <input type="number" class="form-control" name="productstock"
                                       placeholder="set a quantity of a new product ...">
                                <input type="text" class="form-control" name="productprice"
                                       placeholder="set a price of a new product ...">
                                <select class="form-control formadmin" id="group" name="group">
                                    <?Php
                                    $ret = Group::showAllGroups();

                                    for ($i = 0;
                                         $i < count($ret);
                                         $i++) {
                                        echo '<option value=' . $ret[$i]->getGroupId() . '>' . $ret[$i]->getGroupName() . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-info del">New
                                <i class="fa fa-plus-square" style="font-size:18px;">
                                </i></button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6">
                    <div class="header secondanime" id="User_Management">Image Management</div>
                    <div class="anime2">
                        <form action="" method="post" name="image_product" enctype="multipart/form-data">
                            <label>Choose a product ... then add an image</label>
                            <select class="form-control formadmin" id="image_product" name="image_product">
                                <?Php
                                $ret = Product::showAllProducts();

                                for ($i = 0;
                                     $i < count($ret);
                                     $i++) {
                                    echo '<option value =' . $ret[$i]->getName() . '>' . $ret[$i]->getName() . '</option>';
                                }
                                ?>
                            </select>


                            <div style="clear:both"></div>

                            <input type="file" name="imageToLoad" ID="imageToLoad" class="file">
                            <button type="submit" class="btn btn-info del">Add
                                <i class="fa fa-trash-o" style="font-size:18px;"></i>
                                </i></button>
                        </form>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="header secondanime" id="Order_Management">Order Management</div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="header" id="User_Management">User Management</div>
                </div>
                <div class="col-sm-6">
                    <div class="header " id="Order_Management">Order Management</div>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div style="height: 50px;"></div>
    <?Php require_once('main_body.html');
    echo '</div>';
    require_once('footer.html');
    ?>
