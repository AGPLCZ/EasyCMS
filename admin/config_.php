<?php

$serverName = "127.0.0.1";
$userName = "petrlizal.com";
$dbPassword = "6y7m27Sa";
$dbName = "petrlizalcom4";

$conn = new mysqli($serverName, $userName, $dbPassword, $dbName);


if ($conn->connect_errno) {
    die('Nelze se připojit do databáze: ' . $conn->connect_error);
}


require_once "function-master.php";
require_once "function-post.php";
