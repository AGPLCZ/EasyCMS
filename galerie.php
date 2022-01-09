<?php
require "admin/config.php";
require_once  "header.php";

$pageName = basename($_SERVER['PHP_SELF'], '.php');


$query2 = "SELECT id, title  FROM rubriky WHERE id";
$result2 = $conn->query($query2);

if (!$result2) {
    return false;
}

$vsechnyrubriky = 0;
while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
    $id = $row2['id'];
    $title = $row2['title'];
    $vsechnyrubriky = $vsechnyrubriky . ',' . $id;
}


$rubriky = $vsechnyrubriky;




if (isset($_GET["rubriky"])) {
    $rubriky = ($_GET["rubriky"]);
}


if (isset($_GET["posledniId"])) {

    $posledniId = ($_GET["posledniId"]);
} else {
    $posledniId = 0;
}






$limit = 18;

$query = "SELECT id, rubrikyId, title, perex, href, howOpen, img FROM galerie WHERE rubrikyId IN ($rubriky) AND id > $posledniId LIMIT $limit";
$result = $conn->query($query);

if (!$result) {
    return false;
}



?>





<main>



    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 "></h2>

        <a class="btn btn-secondary" href="?rubriky=<?php echo $vsechnyrubriky ?>">Všechny kategorie</a>
        <?php


        $query2 = "SELECT id, title  FROM rubriky WHERE id";
        $result2 = $conn->query($query2);

        if (!$result2) {
            return false;
        }

        while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
            $id = $row2['id'];
            $title = $row2['title'];


            echo ' <a class="btn btn-primary" href="?rubriky=' . $id . '">' . $title . '</a>';
        }



        ?>



        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">



            <?php

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $id = $row['id'];
                $title = $row['title'];
                $perex = $row['perex'];
                $href = $row['href'];
                $howOpen = $row['howOpen'];
                $img = $row['img'];

            ?>






                <div class="feature col">
                    <p><img src="<?php echo $img; ?>" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5"><?php echo $title; ?></h3>
                    <p class="fw-light lh-base"><?php echo $perex; ?></p>

                    <a class="btn btn-outline-secondary" href="<?php echo $href; ?>" <?php echo $howOpen ?> role="button">Zobrazit</a>
                </div>




            <?php
                $posledniId = $id;

                /* konec cyklu */
            } ?>



</main>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        if (isset($_GET["posledniId"])) {

            echo '<li class="page-item">';
        } else {
            echo '<li class="page-item disabled">';
        }
        ?>
        <a class="page-link" href="<?php echo BASE_URL_WEB . $pageName ?>.php">První stránka</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?php echo BASE_URL_WEB . $pageName; ?>.php?error=0&posledniId=<?php echo $posledniId; ?>">Zobrazit další</a>
        </li>
    </ul>
</nav>





<?php
require_once  "footer.php";
?>