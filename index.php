<?php

    require __DIR__.'/vendor/autoload.php';
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

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<body>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src=""></script>
</body>
</html>