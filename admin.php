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

    $groupToDelete = $_POST['sel1'];
    $groupToAdd = $_POST['newgroup'];
    Group::createGroup($groupToAdd);
    Group::removeGroup($groupToDelete);


    $productToDelete = $_POST['product'];
    $productToAdd = $_POST['newproduct'];
    $productName = $_POST['productname'];
    $productDescription = $_POST['productdescription'];
    $productStock = $_POST['productstock'];
    $productPrice = $_POST['productprice'];
    $productGroup = $_POST['product'];

    $t = Product::createProduct($productName, $productPrice, $productDescription, $productStock, $productGroup);
    Product::removeProduct($productToDelete);
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

                                    for ($i = 0; $i < count($ret); $i++) {
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

                                for ($i = 0; $i < count($ret); $i++) {
                                    echo '<option value=' . $ret[$i]->getName() . '>' . $ret[$i]->getName() . '</option>';
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-info del">Del
                                <i class="fa fa-trash-o" style="font-size:18px;"></i>
                                </i></button>
                        </div>
                    </form>
                    <form action="" id="newgroup" method="post">

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
                            <select class="form-control formadmin" id="product" name="product">
                                <?Php
                                $ret = Group::showAllGroups();

                                for ($i = 0; $i < count($ret); $i++) {
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
    <?Php require_once('main_body.html');echo '</div>';
    require_once('footer.html');
    ?>
