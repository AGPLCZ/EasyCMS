<?php




require_once  "header.php";


// GET ODESLÁNO
if (isset($_GET["page"])) {

    if ($_GET["page"] == "index") {
        require_once  "page-box/box1.php";
        require_once  "page-box/box2.php";
        require_once  "page-box/box3.php";
        require_once  "page-box/box4.php";
        require_once  "page-box/box5.php";
    }


    if ($_GET["page"] == "o-mne") {
        require_once  "page-box/box-o1.php";
    }

    if ($_GET["page"] == "krouzky") {
        require_once  "page-box/box-k1.php";
    }

    if ($_GET["page"] == "vylety") {
        require_once  "page-box/box-v1.php";
    }


    if ($_GET["page"] == "cenik") {
        require_once  "page-box/box-c1.php";
    }

    if ($_GET["page"] == "kontakt") {
        require_once  "page-box/box-k1.php";
    }



    if ($_GET["page"] == "all") {
        require_once  "page-box/pageBoxAll.php";
    }
} else {

    require_once  "page-box/box1.php";
    require_once  "page-box/box2.php";
    require_once  "page-box/box3.php";
    require_once  "page-box/box4.php";
    require_once  "page-box/box5.php";
}


require_once  "footer.php";
