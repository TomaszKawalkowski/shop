<?Php


require_once('src/connection.php');


if (isset($_SESSION['user']) == true) {

    $loggedUser = $_SESSION['user'];


    $x = 1; //zmienna użyta w skrypcie zmieniająca tło dla zalogowanego użytkownika
}
else {$loggedUser = null;}?>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <i class="fa fa-car"></i> BEST CAR SHOP EVER  <i class="fa fa-car"></i></a>
        </div>
        <div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Main</a></li>
                    <li><a href="cars.php">Cars
                        </a></li>
                    <li><a href="">Orders</a></li>
                    <li><a href="">Buy a car
                        </a></li>
                    <li><a href="">Basket <i class="fa fa-cart-arrow-down"></i>
                        </a></li>
                    <li><a href="user_page.php">User</a></li>
                    <li><a href=""></a></li>
                    <?Php
                    if (!$loggedUser) {
                    echo '

                    <li><a href="login.php"   class="logreg" style="color: orangered; font-weight: bolder">Login <i class="fa fa-sign-in"></i></a></a></li>
                    <li ><a href="register.php" class="logreg"  style="color: blue; font-weight: bolder">Register  <i class="fa fa-sign-in"></i></a></li>';}?>
                    <li><a href="" style="color: orangered; ">

                            <?Php
                            if ($loggedUser) {

                                echo 'Loged as:
                        </a></li>
                            <li><a href=""';
                                echo 'style="color: orangered;">';
                            }
                            if ($loggedUser) {
                               echo $loggedUser->getFirstName();
                                echo ' ';

                             echo $loggedUser->getLastName();
                                echo ' ';
                                echo ' | ';
                                echo $loggedUser->getEmail();
                            } ?>
                        </a></li>
                    <?Php
                    if ($loggedUser) {
                    echo '

                    <li><a href="logout.php">Logout <i class="fa fa-sign-out"></i></a></li>';

                    if ($loggedUser->getFirstName() == 'admin') {
                    echo '

                    <li><a href="admin.php" style="color: blue; font-weight: bolder"> Admin Page <i class="fa fa-sign-in"></i></a></li>';}}?>
                </ul>
            </div>
        </div>
    </div>
</nav>
