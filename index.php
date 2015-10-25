<?php


/*
$router = new AltoRouter();
include('routing.php');
$router->setBasePath(BASE_PATH);
$match = $router->match();

*/
require_once('meta.html');
?>

<?Php


require_once('menu.php');
require_once('header2.php');
require_once('main_body.html');


if ($match){
    require $match['target'];
}
require_once('footer.html');
?>
