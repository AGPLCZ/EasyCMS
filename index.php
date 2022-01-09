<?php




require_once  "header.php";


// GET ODESLÁNO
if (isset($_GET["page"])) {

    if ($_GET["page"] == "index") {
        require_once  "page-box/box-index.php";
    }


    if ($_GET["page"] == "o-mne") {
        require_once  "page-box/box-lektor-petr.php";
    }

    if ($_GET["page"] == "krouzky") {
        require_once  "page-box/box-krouzky.php";
    }

    if ($_GET["page"] == "vylety") {
        require_once  "page-box/box-vylety.php";
    }


    if ($_GET["page"] == "cenik") {
        require_once  "page-box/box-cenik.php";
    }

    if ($_GET["page"] == "kontakt") {
        require_once  "page-box/box-kontakt.php";
    }



    if ($_GET["page"] == "all") {
        require_once  "page-box/pageBoxAll.php";
    }
} else {

    require_once  "page-box/box-index.php";
}


require_once  "footer.php";
