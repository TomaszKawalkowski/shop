<?php

require_once('src/connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['first_name_edit'])) {
    if (isset($_SESSION['user']) == true) {

        $loggedUser = $_SESSION['user'];


        $x = 1; //zmienna u�yta w skrypcie zmieniaj�ca t�o dla zalogowanego u�ytkownika
    }
    if (isset($_POST['first_name_edit']) && strlen(trim($_POST['first_name_edit']))) {
        $first_name = trim($_POST['first_name_edit']);
        $n = 1;//zmienne do podania b��d�w u�ytkownika przy rejestracji
    }


    $email = $loggedUser->getEmail();
    if (isset($_POST['last_name_edit']) && strlen(trim($_POST['last_name_edit']))) {
        $last_name = trim($_POST['last_name_edit']);
        $n = 1;//zmienne do podania b��d�w u�ytkownika przy rejestracji
    }

    if (isset($_POST['address_edit']) && strlen(trim($_POST['address_edit']))) {
        $address = trim($_POST['address_edit']);
        $e = 1;
    }

    $loggedUser = User::editUser($first_name, $last_name, $email, $address);
    if ($loggedUser != false) {
        $_SESSION['user'] = $loggedUser;

    }
}
require_once('meta.html');
require_once('menu.php');


?>


<div class="container">
    <div style="height: 75px;"></div>


    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

            <div class="row">


                <div class="col-sm-6">
                    <div class="header firstanime" id="edytujdane">Edytuj dane</div>
                    <div class="mainform">
                        <form action="" method="post">
                            <table class="table anime">
                                <tr>
                                    <td>
                                        <label for='first_name_edit'> First name </label>
                                        <input type="text" name="first_name_edit" class="form-control"
                                               value="<?Php echo $loggedUser->getFirstName() ?>"
                                               placeholder="<?Php echo $loggedUser->getFirstName() ?>">

                                    </td>
                                </tr>
                                <tr>

                                    <td>
                                        <label for='last_name_edit'> Last name </label>
                                        <input type="text" name="last_name_edit" class="form-control"
                                               value="<?Php echo $loggedUser->getLastName() ?>"
                                               placeholder="<?Php echo $loggedUser->getLastName() ?>">

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for='address_edit'> Address </label>
                                        <input type="text" name="address_edit" class="form-control"
                                               value="<?Php echo $loggedUser->getAddress() ?>"
                                               placeholder="<?Php echo $loggedUser->getAddress() ?>">

                                    </td>
                                </tr>

                                <tr>
                                    <td>

                                        <button type="submit" class="btn btn-info"
                                                style="width:100%; background-color:orangered"> SEND CHANGES <i
                                                class="fa fa-sign-in"></i></button>

                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="header anime" id="twojezamowienia">Twoje zam�wienia</div>
                    <div class="mainform"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-2"></div>
    </div>



        <?Php require_once('main_body.html'); ?>

    </div>
</div>
<?Php
require_once('footer.html');
?>