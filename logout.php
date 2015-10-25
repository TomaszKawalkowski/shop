<?php
session_start();
$loggedUser = null;
$_SESSION['user'] = false;

header('location: index.php');