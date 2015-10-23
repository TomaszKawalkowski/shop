<?php
require_once('src/user.php');
require_once('src/connection.php');

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['first_name']) && strlen(trim($_POST['last_name']))) {
        $first_name = trim($_POST['first_name']);
        $n = 1;//zmienne do podania błędów użytkownika przy rejestracji
    }


    if (isset($_POST['last_name']) && strlen(trim($_POST['last_name']))) {
        $last_name = trim($_POST['last_name']);
        $n = 1;//zmienne do podania błędów użytkownika przy rejestracji
    }
    if (isset($_POST['email']) && strlen(trim($_POST['email'])) > 1) {
        $email = trim($_POST['email']);
        $e = 1;
    }
    if (isset($_POST['adress']) && strlen(trim($_POST['adress'])) > 1) {
        $address = trim($_POST['adress']);
        $e = 1;
    }
    if (isset($_POST['password']) && strlen(trim($_POST['password'])) > 1) {
        $password = trim($_POST['password']);
        $p = 1;

    }
    if (isset($_POST['password2']) && strlen(trim($_POST['password2'])) > 1) {
        $password2 = trim($_POST['password2']);
        $p2 = 1;
        if ($password != $password2) {
            $p3 = 1;
        }
    }

    $newUser = User::register($first_name, $last_name, $email, $password, $password2, $address);
    if ($newUser != false) {
        $_SESSION['user'] = $newUser;
        header('location: index.php');
    }
    $r = 1;
}

require_once('meta.html');
?>


<div class="container">
    <div class="odstep" style="height: 30px;"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" style="color: white; background-color: dimgray;">
                <h1> Panel <span style="color:orangered">rejestracji </span>
            </div>
        </div>
    </div>


    <form action="register.php" method="post" class="anime">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 ">
                <div class="tlowstepu">
                    <?Php
                    if ($r == 1) {
                        echo '

                    <div class="well" style="background-color: dimgray; color: white;">

                           <h3><span style="color: orangered"><i class="fa fa-exclamation-circle"></i>
 Błąd rejestracji</span></h3><br>';
                        if ($n != 1) {
                            echo '<i class="fa fa-arrow-circle-right"></i>
 Nie podałeś Nick/Imię lub już taki wpis w bazie istnieje<br>';
                        }
                        if ($e != 1) {
                            echo '<i class="fa fa-arrow-circle-right"></i> Nie podałeś adresu email lub już taki adres w bazie istnieje<br>';
                        }
                        if ($p != 1) {
                            echo '<i class="fa fa-arrow-circle-right"></i> Nie podałeś hasła<br>';
                        }
                        if ($p2 != 1) {
                            echo '<i class="fa fa-arrow-circle-right"></i> Nie potwierdziłeś hasła<br>';
                        }
                        if ($p3 == 1) {
                            echo '<i class="fa fa-arrow-circle-right"></i> Hasło potwierdzające niezgodne z podanym hasłem<br>';
                        }
                        echo '</div>';
                    }
                    ?>

                    <div class="form-group" id="div_register">
                        <label for="comment" style="color:white">


                        </label>
                        <input class="form-control" type="text" name="first_name" id="first_register_name"
                               placeholder="Nick"
                               value="<?Php echo $first_name ? $first_name : '' ?>">

                        <div class="odstep" style="height: 10px;"></div>
                        <input class="form-control" type="text" name="last_name" id="last_register_name"
                               placeholder="Nick"
                               value="<?Php echo $last_name ? $last_name : '' ?>">

                        <div class="odstep" style="height: 10px;"></div>
                        <input class="form-control" type="email" name="email" id="register_email"
                               placeholder="Podaj email"
                               value="<?Php echo $email ? $email : '' ?>">

                        <div class="odstep" style="height: 10px;"></div>

                        <input class="form-control" type="text" name="adress" id="register_adress"
                               placeholder="Podaj adress"
                               value="<?Php echo $address ? $address : '' ?>">

                        <div class="odstep" style="height: 10px;"></div>

                        <input class="form-control" name="password" type="password" id="password"
                               placeholder="Podaj hasło">

                        <div class="odstep" style="height: 20px;"></div>

                        <input class="form-control" name="password2" type="password" id="password2"
                               placeholder="Potwierdź hasło"
                            >

                        <div class="odstep" style="height: 20px;"></div>
                        <button type="submit" class="btn btn-info" style="width:100%; background-color:orangered">
                            ZAREJESTRUJ SIĘ <i class="fa fa-sign-in"></i></button>

                    </div>

                </div>
            </div>

            <div class="col-md-4"></div>
    </form>
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
