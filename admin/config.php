<?php

$serverName = "localhost";
$userName = "root";
$dbPassword = "heslo";
$dbName = "konstrakt";

$conn = new mysqli($serverName, $userName, $dbPassword, $dbName);


if ($conn->connect_errno) {
    die('Nelze se připojit do databáze: ' . $conn->connect_error);
}


require_once "function-master.php";
require_once "function-post.php";
