<?php
require "admin/config.php";
require_once  "header.php";

$pageName = basename($_SERVER['PHP_SELF'], '.php');

if (isset($_GET["posledniId"])) {

    $posledniId = ($_GET["posledniId"]);
} else {
    $posledniId = 0;
}



$limit = 8;

$query = "SELECT artId, artTitle, artPerex, artHref, artImg FROM articlesimg WHERE artId > $posledniId LIMIT $limit";
$result = $conn->query($query);

if (!$result) {
    return false;
}


?>





<main>


    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 "></h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-4">



            <?php

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $artId = $row['artId'];
                $artTitle = $row['artTitle'];
                $artPerex = $row['artPerex'];
                $artHref = $row['artHref'];
                $artImg = $row['artImg'];

            ?>






                <div class="feature col">
                    <p><img src="<?php echo $artImg; ?>" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5"><?php echo $artTitle; ?></h3>
                    <p class="fw-light lh-base"><?php echo $artPerex; ?></p>

                    <a class="btn btn-outline-secondary" href="<?php echo $artHref; ?>" role="button">Zobrazit</a>
                </div>




            <?php
                $posledniId = $artId;

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
        <a class="page-link" href="<?php echo $pageName ?>.php">První stránka</a>
        </li>
        <li class="page-item">

            <a class="page-link" href="<?php echo $pageName ?>.php?error=0&posledniId=<?php echo $posledniId; ?>">Zobrazit další</a>
        </li>
    </ul>
</nav>






<?php
require_once  "footer.php";
?>