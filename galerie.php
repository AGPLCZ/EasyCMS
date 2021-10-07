<?php
require "admin/config.php";
require_once  "header.php";

$pageName = basename($_SERVER['PHP_SELF'], '.php');


$query2 = "SELECT rubrikyId, rubrikyName  FROM rubriky WHERE rubrikyId";
$result2 = $conn->query($query2);

if (!$result2) {
    return false;
}

$vsechnyrubriky = 0;
while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
    $rubrikyId = $row2['rubrikyId'];
    $rubrikyName = $row2['rubrikyName'];
    $vsechnyrubriky = $vsechnyrubriky . ',' . $rubrikyId;
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






$limit = 8;

$query = "SELECT galerieId, rubrikyId, galerieTitle, galeriePerex, galerieHref, galerieOut, galerieImg FROM galerie WHERE rubrikyId IN ($rubriky) AND galerieId > $posledniId LIMIT $limit";
$result = $conn->query($query);

if (!$result) {
    return false;
}





/*


SELECT SupplierName
FROM Suppliers
WHERE EXISTS (SELECT ProductName FROM Products WHERE Products.SupplierID = Suppliers.supplierID AND Price = 22);
*/

?>





<main>



    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 "></h2>

        <a class="btn btn-secondary" href="?rubriky=<?php echo $vsechnyrubriky ?>">Všechny kategorie</a>
        <?php

        $query2 = "SELECT rubrikyId, rubrikyName  FROM rubriky WHERE rubrikyId";
        $result2 = $conn->query($query2);

        if (!$result2) {
            return false;
        }

        while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
            $rubrikyId = $row2['rubrikyId'];
            $rubrikyName = $row2['rubrikyName'];


            echo ' <a class="btn btn-primary" href="?rubriky=' . $rubrikyId . '">' . $rubrikyName . '</a>';
        }



        ?>



        <div class="row g-4 py-5 row-cols-1 row-cols-lg-4">



            <?php

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $galerieId = $row['galerieId'];
                $galerieTitle = $row['galerieTitle'];
                $galeriePerex = $row['galeriePerex'];
                $galerieHref = $row['galerieHref'];
                $galerieOut = $row['galerieOut'];
                $galerieImg = $row['galerieImg'];

            ?>






                <div class="feature col">
                    <p><img src="<?php echo $galerieImg; ?>" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5"><?php echo $galerieTitle; ?></h3>
                    <p class="fw-light lh-base"><?php echo $galeriePerex; ?></p>

                    <a class="btn btn-outline-secondary" href="<?php echo $galerieHref; ?>" <?php echo $galerieOut ?> role="button">Zobrazit</a>
                </div>




            <?php
                $posledniId = $galerieId;

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