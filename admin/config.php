<?php

$serverName = "localhost";
$userName = "root";
$dbPassword = "";
$dbName = "konstrakt";

$conn = new mysqli($serverName, $userName, $dbPassword, $dbName);


if ($conn->connect_errno) {
    die('Nelze se připojit do databáze: ' . $conn->connect_error);
}
