<?php




require_once  "header.php";


// GET ODESLÁNO
if (isset($_GET["page"])) {

    if ($_GET["page"] == "index") {
        require_once  "page-box/box-index.php";
    }


    if ($_GET["page"] == "lektor-petr") {
        require_once  "page-box/box-lektor-petr.php";
    }

    if ($_GET["page"] == "o-nas") {
        require_once  "page-box/box-o-nas.php";
    }


    if ($_GET["page"] == "krouzky") {
        require_once  "page-box/box-krouzky.php";
    }

    if ($_GET["page"] == "vylety") {
        require_once  "page-box/box-vylety.php";
    }

    if ($_GET["page"] == "kurzy-programovani") {
        require_once  "page-box/box-kurzy-programovani.php";
    }

    if ($_GET["page"] == "krouzek-programovani") {
        require_once  "page-box/box-krouzek-programovani.php";
    }


    if ($_GET["page"] == "kurzy-lukostrelby") {
        require_once  "page-box/box-kurzy-lukostrelby.php";
    }


    if ($_GET["page"] == "kurzy-vodactvi") {
        require_once  "page-box/box-kurzy-vodactvi.php";
    }


    if ($_GET["page"] == "cenik") {
        require_once  "page-box/box-cenik.php";
    }


    if ($_GET["page"] == "kalendar") {
        require_once  "page-box/box-kalendar.php";
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
