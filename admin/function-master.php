<?php

function name_page()
{
    return basename($_SERVER['PHP_SELF'], '.php');
}



function get_back_page()
{
    return $_SERVER["HTTP_REFERER"];
}


//define('BASE_URL', 'https://dobrodruzi.cz/admin/');
//define('BASE_URL_WEB', 'https://dobrodruzi.cz/');
define('BASE_URL', 'http://localhost/EasyCMS/EasyCMS/admin/');
define('BASE_URL_WEB', 'http://localhost/EasyCMS/EasyCMS/');
define('APP_PATH', realpath(__DIR__ . '/../'));
define('APP_PATH_NEW', pathinfo(__DIR__, PATHINFO_DIRNAME));






/**
 * Asset
 *
 * Creates absolute URL to asset file
 *
 * @param  string   $path   path to asset file
 * @param  string   $base   asset base url
 * @return string   absolute URL to asset file
 */
function asset($path, $base = BASE_URL . 'assets/')
{
    $path = trim($path, '/');
    return filter_var($base . $path, FILTER_SANITIZE_URL);
}





define('GALERIE_VYPIS', 'galerieVypis');
define('RUBRIKY_VYPIS', 'rubrikyVypis');


/*

bezpečnost

FILTER_FLAG_NO_ENCODE_QUOTES
FILTER_REQUIRE_ARRAY

*/

/* ----VALIDATE----- */

function filtr_validate_int($string)
{
    return filter_var($string, FILTER_VALIDATE_INT);
}


function filtr_validate_email($string)
{
    return filter_var($string, FILTER_VALIDATE_EMAIL);
}


function filtr_validate_url($string)
{
    return filter_var($string, FILTER_VALIDATE_URL);
}


function filtr_validate_boolean($string)
{
    return filter_var($string, FILTER_VALIDATE_BOOLEAN); //Returns TRUE for "1", "true", "on" and "yes"
}

/* ----SANITIZE----- */


function filter_sanitize_email($string)
{
    return filter_var($string, FILTER_SANITIZE_EMAIL);
}



function filter_sanitize_number_float($string)
{
    return filter_var($string, FILTER_SANITIZE_NUMBER_FLOAT);
}


function filter_sanitize_number_econded($string)
{
    return filter_var($string, FILTER_SANITIZE_ENCODED);
}


function filter_sanitize_stripped($string)
{
    return filter_var($string, FILTER_SANITIZE_STRIPPED);
}



function filter_sanitize_number_int($string)
{
    return filter_var($string, FILTER_SANITIZE_NUMBER_INT);
}


function filter_sanitize_url($string)
{
    return filter_var($string, FILTER_SANITIZE_URL);
}


function filter_sanitize_string($string)
{
    return filter_var($string, FILTER_SANITIZE_STRING); // filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}


function filter_sanitize_special_chars($string)
{
    return filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
}



function escape_string($db, $data)
{
    $data = trim($data); // ořizne string
    $data = strip_tags($data, '<p><a>');  // smaže tagy a jine pokusy mimo jmenované
    $data = stripslashes($data);
    return $data;
}






function my_real_escape_string($conn, $dosazeni_stringu_do_quaery)
{

    return mysqli_real_escape_string($conn, $dosazeni_stringu_do_quaery); // Escapes special characters in a string for use in an SQL statement

}



/**
 * filtr_int
 *
 * @param  string $str
 * @return string TRUE/FALSE
 */
function filtr_int($str)
{

    if (!filter_var($str, FILTER_VALIDATE_INT)) {
        return false;
    }
}

function orezat($data)
{
    $data = ltrim($data, '/'); // ořizne string

}


/**
 * plain
 *
 * Escape (though not from New York)
 *
 * @param  string $data
 * @return string
 */
function plain_quotes($data)
{
    return htmlspecialchars($data, ENT_QUOTES); // Převede uvozovky i apostrofy.
}



/**
 * plain
 *
 * Escape (though not from New York)
 *
 * @param  string $data
 * @return string
 */
function plain($data)
{
    $data = htmlspecialchars($data); // prevede HTML na specialni znaky
}



/**
 * plain_back
 *
 * Escape (though not from New York)
 *
 * @param  string $str
 * @return string
 */
function plain_back($str)
{

    return htmlspecialchars_decode($str);
}




function stripy($data)
{
    return strip_tags($data, '<p><a>');
}







/*
kontrola zadávání
input control
*/



function only_text_number($data)
{
    // pouze písmena a čísla
    if (!preg_match("/^[a-zA-Z0-9]*$/", $data)) {
        return false;
    } else {
        return true;
    }
}

function is_email($data)
{
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

function same_repass($userPass, $userPassRe)
{
    if ($userPass == $userPassRe) {
        return true;
    } else {
        return false;
    }
}



function is_empty($data)
{
    if (empty($data)) {
        return true;
    } else {
        return false;
    }
}


function redirect($file_name, $get_message = "")
{
    header("Location: " . BASE_URL . $file_name . ".php" . $get_message);
}


function redirect_nowhere($get_message = "")
{
    header("Location: " . BASE_URL . name_page() . ".php" . $get_message);
}


/*
 	if (is_email($userEmail)){
		redirect_back();
	}
 */




/**
 * Word Limiter
 * Omezovač slov
 *
 * Limits a string to X number of words.
 *
 * @param	string
 * @param	int
 * @param	string	the end character. Usually an ellipsis
 * @return	string
 */
function word_limiter($str, $limit = 100, $end_char = '&#8230;')
{
    if (trim($str) === '') {
        return $str;
    }

    preg_match('/^\s*+(?:\S++\s*+){1,' . (int) $limit . '}/', $str, $matches);

    if (strlen($str) === strlen($matches[0])) {
        $end_char = '';
    }

    return rtrim($matches[0]) . $end_char;
}



/**
 * Add Paragraphs
 *
 * Adds line breaks into text
 * And breaks it into paragraphs as needed
 *
 * @param  string  $str
 * @return mixed|string
 */
function add_paragraphs($str)
{
    // Trim whitespace
    if (($str = trim($str)) === '') return '';

    // Standardize newlines
    $str = str_replace(array("\r\n", "\r"), "\n", $str);

    // Trim whitespace on each line
    $str = preg_replace('~^[ \t]+~m', '', $str);
    $str = preg_replace('~[ \t]+$~m', '', $str);

    // The following regexes only need to be executed if the string contains html
    if ($html_found = (strpos($str, '<') !== FALSE)) {
        // Elements that should not be surrounded by p tags
        $no_p = '(?:p|div|article|header|aside|hgroup|canvas|output|progress|section|figcaption|audio|video|nav|figure|footer|video|details|main|menu|summary|h[1-6r]|ul|ol|li|blockquote|d[dlt]|pre|t[dhr]|t(?:able|body|foot|head)|c(?:aption|olgroup)|form|s(?:elect|tyle)|a(?:ddress|rea)|ma(?:p|th))';

        // Put at least two linebreaks before and after $no_p elements
        $str = preg_replace('~^<' . $no_p . '[^>]*+>~im', "\n$0", $str);
        $str = preg_replace('~</' . $no_p . '\s*+>$~im', "$0\n", $str);
    }

    // Do the <p> magic!
    $str = '<p>' . trim($str) . '</p>';
    $str = preg_replace('~\n{2,}~', "</p>\n\n<p>", $str);

    // The following regexes only need to be executed if the string contains html
    if ($html_found !== FALSE) {
        // Remove p tags around $no_p elements
        $str = preg_replace('~<p>(?=</?' . $no_p . '[^>]*+>)~i', '', $str);
        $str = preg_replace('~(</?' . $no_p . '[^>]*+>)</p>~i', '$1', $str);
    }

    // Convert single linebreaks to <br />
    $str = preg_replace('~(?<!\n)\n(?!\n)~', "<br>\n", $str);

    return $str;
}



/**
 * Filter Url
 *
 * URL filter. Automatically converts text web addresses (URLs, e-mail addresses,
 * ftp links, etc.) into hyperlinks.
 *
 * @param  string  $text
 * @return mixed|string
 */
function filter_url($text)
{
    // Pass length to regexp callback
    filter_url_trim(NULL, 72);

    $text = ' ' . $text . ' ';

    // Match absolute URLs.
    $text = preg_replace_callback(
        "`(<p>|<li>|<br\s*/?" . ">|[ \n\r\t\(])((http://|https://|ftp://|mailto:|smb://|afp://|file://|gopher://|news://|ssl://|sslv2://|sslv3://|tls://|tcp://|udp://)([a-zA-Z0-9@:%_+*~#?&=.,/;()-]*[a-zA-Z0-9@:%_+*~#&=/;-]))([.,?!]*?)(?=(</p>|</li>|<br\s*/?" . ">|[ \n\r\t\)]))`i",
        'filter_url_parse_full_links',
        $text
    );

    // Match e-mail addresses.
    $text = preg_replace("`(<p>|<li>|<br\s*/?" . ">|[ \n\r\t\(])([A-Za-z0-9._-]+@[A-Za-z0-9._+-]+\.[A-Za-z]{2,4})([.,?!]*?)(?=(</p>|</li>|<br\s*/?" . ">|[ \n\r\t\)]))`i", '\1<a href="mailto:\2">\2</a>\3', $text);

    // Match www domains/addresses.
    $text = preg_replace_callback(
        "`(<p>|<li>|[ \n\r\t\(])(www\.[a-zA-Z0-9@:%_+*~#?&=.,/;-]*[a-zA-Z0-9@:%_+~#\&=/;-])([.,?!]*?)(?=(</p>|</li>|<br\s*/?" . ">|[ \n\r\t\)]))`i",
        'filter_url_parse_partial_links',
        $text
    );
    $text = substr($text, 1, -1);

    return $text;
}



/**
 * Filter Url Parse Full Links
 *
 * Make links out of absolute URLs.
 *
 * @param  string $match
 * @return string
 */
function filter_url_parse_full_links($match)
{
    $caption = filter_url_trim($match[2]);
    return $match[1] . '<a href="' . $match[2] . '" title="' . $match[2] . '">' . $caption . '</a>' . $match[5];
}



/**
 * Filter Url Parse Partial Links
 *
 * Make links out of domain names starting with "www."
 *
 * @param  $match
 * @return string
 */
function filter_url_parse_partial_links($match)
{
    $caption = filter_url_trim($match[2]);
    return $match[1] . '<a href="http://' . $match[2] . '" title="' . $match[2] . '">' . $caption . '</a>' . $match[3];
}



/**
 * Filter Url Trim
 *
 * Shortens long URLs to http://www.example.com/long/url...
 *
 * @param  string  $text
 * @param  null    $length
 * @return string
 */
function filter_url_trim($text, $length = NULL)
{
    static $_length;

    if ($length !== NULL) $_length = $length;
    if (strlen($text) > $_length) $text = substr($text, 0, $_length) . '&hellip;';

    return $text;
}



/**
 * Slugify
 *
 * Create slug from string
 *
 * @param  $text
 * @return mixed|string
 */
function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}













/**
 * Reduce Double Slashes
 *
 * Converts double slashes in a string to a single slash,
 * except those found in http://
 *
 * http://www.some-site.com//index.php
 *
 * becomes:
 *
 * http://www.some-site.com/index.php
 *
 * @param	string
 * @return	string
 */
function reduce_double_slashes($str)
{
    return preg_replace('#(^|[^:])//+#', '\\1/', $str);
}



/**
 * Reduce Multiples
 *
 * Reduces multiple instances of a particular character.  Example:
 *
 * Fred, Bill,, Joe, Jimmy
 *
 * becomes:
 *
 * Fred, Bill, Joe, Jimmy
 *
 * @param	string
 * @param	string	the character you wish to reduce
 * @param	bool	TRUE/FALSE - whether to trim the character from the beginning/end
 * @return	string
 */
function reduce_multiples($str, $character = ',', $trim = FALSE)
{
    $str = preg_replace('#' . preg_quote($character, '#') . '{2,}#', $character, $str);
    return ($trim === TRUE) ? trim($str, $character) : $str;
}



/**
 * Create a "Random" String
 *
 * @param	string	type of random string.  basic, alpha, alnum, numeric, nozero, unique, md5, encrypt and sha1
 * @param	int	number of characters
 * @return	string
 */
function random_string($type = 'alnum', $len = 8)
{
    switch ($type) {
        case 'basic':
            return mt_rand();
        case 'alnum':
        case 'numeric':
        case 'nozero':
        case 'alpha':
            switch ($type) {
                case 'alpha':
                    $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    break;
                case 'alnum':
                    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    break;
                case 'numeric':
                    $pool = '0123456789';
                    break;
                case 'nozero':
                    $pool = '123456789';
                    break;
            }
            return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
        case 'unique': // todo: remove in 3.1+
        case 'md5':
            return md5(uniqid(mt_rand()));
        case 'encrypt': // todo: remove in 3.1+
        case 'sha1':
            return sha1(uniqid(mt_rand(), TRUE));
    }
}




/**
 * Convert PHP tags to entities
 *
 * @param	string
 * @return	string
 */
function encode_php_tags($str)
{
    return str_replace(array('<?', '?>'), array('&lt;?', '?&gt;'), $str);
}




/*


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