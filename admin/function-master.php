<?php

function namePage()
{
    return $jmenoSouboru = basename($_SERVER['PHP_SELF'], '.php');
}


define('BASE_URL', 'http://localhost/EasyCMS/EasyCMS/admin/');
define('BASE_URL_WEB', 'http://localhost/EasyCMS/EasyCMS/');
define('APP_PATH', realpath(__DIR__ . '/../'));
define('APP_PATH_NEW', pathinfo(__DIR__, PATHINFO_DIRNAME));





function asset($path, $base = BASE_URL . 'assets/')
{
    $path = trim($path, '/');
    return filter_var($base . $path, FILTER_SANITIZE_URL);
}






define('GALERIE_VYPIS', 'galerieVypis');
define('RUBRIKY_VYPIS', 'rubrikyVypis');



function filtrInt($id)
{

    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        return false;
    }
}

/*

function my_real_escape_string($db, $data)
{
    $data = trim($data); // ořizne string
    $data = strip_tags($data); // smaže tagy a jine pokusy
    $data = htmlspecialchars($data); // prevede HTML na specialni znaky
    $data = mysqli_real_escape_string($db, $data); // Escapes special characters in a string for use in an SQL statement
    return $data;
}

function kontrolaInputu($userLogin, $userPass, $userPassRe, $userEmail, $jmenoSouboru)
{

    // KONTROLA ZADÁVÁNÍ    

    // není-li prázdné pole
    if (empty($userLogin) || empty($userPass) || empty($userEmail)) {
        header("Location: " . $jmenoSouboru . ".php?error=prazdne&userLogin=" . $userLogin . '&userEmail=' . $userEmail);
        exit();
    }

    // pouze písmena a čísla
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userLogin)) {
        header("Location: " . $jmenoSouboru . ".php?error=invalidLogin&userEmail=" . $userEmail);
        exit();
    }
    //  kontrola emailu
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: " . $jmenoSouboru . ".php?error=invalidEmail&userLogin=" . $userLogin . '&userEmail=' . $userEmail);
        exit();
    }

    // shoda hesla
    if ($userPass !== $userPassRe) {
        header("Location: " . $jmenoSouboru . ".php?error=neshodneHeslo&userLogin=" . $userLogin . '&userEmail=' . $userEmail);
        exit();
    }
}

kontrolaInputu($userLogin, $userPass, $userPassRe, $userEmail, 'userZapis');





function getHlaska()
{
    if (isset($_GET["error"])) {

        // Hláška z GET- existující účet
        if ($_GET["error"] == "existujiciUcet") {
            echo '<p class="signuperror">Uživatelské jméno již existuje</p>';
        }


        // Hláška z GET- neshodující se heslo
        if ($_GET["error"] == "neshodneHeslo") {
            echo '<p class="signuperror">Heslo se neshoduje</p>';
        }

        // Hláška z GET- špatný email
        if ($_GET["error"] == "invalidEmail") {
            echo '<p class="signuperror">Neplatná forma emailu</p>';
        }


        // Hláška z GET- neplatné uživatelské jméno
        if ($_GET["error"] == "invalidLogin") {
            echo '<p class="signuperror">Uživatelské jméno obsahovalo zakázané znaky</p>';
        }


        // Hláška z GET- Nevyplněné pole 
        if ($_GET["error"] == "prazdne") {
            echo '<p class="signuperror">Nevyplněné pole</p>';
        }
    }

    // GET ODESLÁNO
    if (isset($_GET["odeslano"])) {

        // Hláška z GET - účet vytvořen
        if ($_GET["odeslano"] == "zapsano") {
            echo '<p class="signupsuccess">Účet byl vytvořen</p>';
        }
    }
}
*/