<?php

    require __DIR__.'/vendor/autoload.php';
    include('config/db.php');
    $db = new mysqli('$DB_HOST','$DB_USER','$DB_PASSWORD','$DB_NAME','$DB_PORT');

    if ($db->connect_error){
        $error = $db->connect_error.'('.$db->errno.')';
    }
    else{
        $db->set_charset('UTF-8');  //kodowanie na połączeniu z MySQL
    }


?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>On-line shop</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

</head>
<body>

<!DOCTYPE html>

<html lang="pl">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<head>
    <meta charset="utf-8">
    <title>Buy a car, become a better man ...</title>


</head>

<body>
<!--
<div style="background-color: beige; height: 50px;text-align: right"><i class="fa fa-twitter "
                                                                        style="margin-right: 20px; font-size: 40px; color:dimgray; margin-top: 5px; "></i>
    <i class="fa  fa-facebook-square  "
       style="margin-right: 100px; margin-top: 5px; font-size: 40px; color:dimgray"></i></div>
<div class="jumbotron"
     style="background-color:dimgray; color:white; border-bottom: 25px solid beige; text-align: center">
    <img src="pics/book.left.jpg"><img src="pics/book.png"><img src="pics/book.right.jpg">

    <h1>Buy a car,  a <span style="color:orangered"> better man ...</span></h1>

    <h3>Give us a call !!!<span style="color:orangered"> + 210 6535 65 32</span></h3>

</div>

    </div>

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="books">


        </div>

    </div>


</div>

-->


</body>

</html>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
    <script src=""></script>
</body>
</html>