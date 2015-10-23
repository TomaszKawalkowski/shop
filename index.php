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


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
    <script src=""></script>
</body>
</html>