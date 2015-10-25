<?php

require_once('src/connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newUser = User::logIn($_POST['email'], $_POST['password']);
    if ($newUser != false) {
        $_SESSION['user'] = $newUser;
        header('location: index.php');
    }
    $r = 1;
}

require_once('meta.html');
require_once('menu.php');
?>

<div class="container">
    <div class="odstep" style="height: 30px;"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" style="color: white; background-color: dimgray;">

                <h1> Panel <span style="color:orangered">logowania </span>
            </div>
        </div>
    </div>


    <form action="login.php" method="post">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 ">

                <div class="tlowstepu">
                    <?Php
                    if ($r == 1) {
                        echo '

                    <div class="well" style="background-color: dimgray; color: orangered;">

                           Podałeś nieprawidłowy login lub hasło.<br>
                          Jeśli nie masz jeszcze konta
                            <a href="register.php"> <img src="pics/woman-841173_640.png" alt="" style="position:relative; left: 40px; top:20px"></a>
                           </div>';
                    }
                    ?>


                    <div class="form-group">
                        <label for="comment" style="color:white">


                        </label>
                        <input class="form-control" type="text" name="email" placeholder="email"
                            >

                        <div class="odstep" style="height: 10px;"></div>

                        <input class="form-control" type="password" name="password"
                               placeholder="Podaj hasło">

                        <div class="odstep" style="height: 20px;"></div>


                        <div class="odstep" style="height: 20px;"></div>

                        <button type="submit" class="btn btn-info" style="width:100%; background-color:orangered"> ZALOGUJ SIĘ <i class="fa fa-sign-in"></i> </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4"></div>
    </form>
</div>

<?Php
require_once('footer.html');
?>