<?php

$serverName = "127.0.0.1";
$userName = "dobrodruzi.cz";
$dbPassword = "e4gXbzJ7qmtM";
$dbName = "dobrodruzicz1";

$conn = new mysqli($serverName, $userName, $dbPassword, $dbName);


if ($conn->connect_errno) {
    die('Nelze se připojit do databáze: ' . $conn->connect_error);
}


require_once "function-master.php";
require_once "function-post.php";
