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



function userVypis($sort)
{

    if ($sort == 'DESC') {
        $query = "SELECT userId, userLogin,userEmail,userNickName,userFirstName,userLastName FROM users ORDER BY userId DESC";
    } else {
        $query = "SELECT userId, userLogin,userEmail,userNickName,userFirstName,userLastName FROM users ORDER BY userId ASC";
    }

    return trim($query);
}












function create_posts_query($where = '')
{
    $query = "SELECT p.*, u.email, GROUP_CONCAT(t.tag SEPARATOR '~||~') AS tags
		    FROM posts p
		    LEFT JOIN posts_tags pt ON (p.id = pt.post_id)
		    LEFT JOIN tags t ON (t.id = pt.tag_id)
		    LEFT JOIN users u ON (p.user_id = u.id)
		";

    if ($where) {
        $query .= $where;
    }

    $query .= " GROUP BY p.id";
    $query .= " ORDER BY p.created_at DESC";

    return trim($query);
}
