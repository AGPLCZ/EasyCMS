<?php

function namePage()
{
    return $jmenoSouboru = basename($_SERVER['PHP_SELF'], '.php');
}


define('BASE_URL', 'http://localhost/EasyCMS/EasyCMS/admin/');
define('BASE_URL_WEB', 'http://localhost/EasyCMS/EasyCMS/');
define('APP_PATH', realpath(__DIR__ . '/'));


define('GALERIE_VYPIS', 'galerieVypis');
define('RUBRIKY_VYPIS', 'rubrikyVypis');


function filtrInt($id)
{

    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        return false;
    }
}



function vypis($sloupce, $tabulka, $podminka)
{
    $query = "SELECT $sloupce FROM $tabulka WHERE $podminka";
    return $query;
}




function update($sloupce, $tabulka, $podminka)
{
    $query = "UPDATE $tabulka SET $sloupce WHERE $podminka";
    return $query;
}




function vypisJOIN($sloupce, $tabulka, $podminka)
{
    $query = "UPDATE $tabulka SET $sloupce WHERE $podminka";
    $query = "SELECT galerie.id, galerie.rubrikyId, galerie.title, rubriky.title AS tit FROM $tabulka JOIN rubriky ON rubriky.id = galerie.rubrikyId ORDER BY id DESC";
    return $query;
}
