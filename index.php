<?php

require __DIR__ . '/vendor/autoload.php';
include('config/db.php');

$db = new mysqli('$DB_HOST', '$DB_USER', '$DB_PASSWORD', '$DB_NAME', '$DB_PORT');

if ($db->connect_error) {
    $error = $db->connect_error . '(' . $db->errno . ')';
} else {
    $db->set_charset('UTF-8');  //kodowanie na połączeniu z MySQL
}

$router = new AltoRouter();
include('routing.php');
$router->setBasePath(BASE_PATH);
$match = $router->match();
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>On-line shop</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


    <meta charset="utf-8">
    <title>Buy a car, become a better man ...</title>


</head>

<body>
<?Php

require_once('header.html');
require_once('main_body.html');
require_once('register.php');?>


<?Php

if ($match){
    require $match['target'];
}
?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script src=""></script>
</body>
</html>