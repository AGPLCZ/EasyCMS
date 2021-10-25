<?php

require_once "config.php";


function vypis()
{

    global $conn;
    $query = "SELECT id, title FROM rubriky ORDER BY id DESC";
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();
    $stmt->bind_result($id, $title);
    $i = 0;

    while ($stmt->fetch()) {
        $pole['id'][$i] = "$id";
        $pole['title'][$i] = "$title";
        $i++;
    }
    return $pole;
}



$pole = vypis();


for ($i = 0; $i <= count($pole); $i++) {
    echo $pole['id'][$i] . "<br>";
    echo $pole['title'][$i] . "<br>";
}




function vypisS()
{

    global $conn;
    $query = "SELECT id, title FROM rubriky ORDER BY id DESC";
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    $stmt->execute();



    return $stmt;
}


$stmt = vypisS();
$stmt->bind_result($id, $title);
while ($stmt->fetch()) {
    echo $id;
    echo $title;
}



echo "<pre>";
print_r($pole);
echo "</pre>";
