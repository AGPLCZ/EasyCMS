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
