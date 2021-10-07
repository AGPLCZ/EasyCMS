<?php

function namePage()
{
    return $jmenoSouboru = basename($_SERVER['PHP_SELF'], '.php');
}




define('BASE_URL', 'http://localhost/EasyCMS/EasyCMS/admin/');
define('APP_PATH', realpath(__DIR__ . '/'));
