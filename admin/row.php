<?php
require "config.php";
require "header.php";
require "sidebar.php";
?>

<section class="section-default">
    <h1>Výpis uživatelů</h1>
</section>

<?php
$userLogin = 'agpl';
$minStranka = 0;
$maxStranka = 120;
$verzeWhile = 3;
$query = ("SELECT userId, userLogin,userEmail FROM users WHERE userId > $minStranka");

//$query = ("SELECT userId, userLogin,userEmail FROM users WHERE userId > $minStranka AND userId < $maxStranka AND userLogin = '" . $userLogin . "'");
//$query = ("SELECT userId, userLogin,userEmail FROM users WHERE userLogin = '" . $userLogin . "'");
$result = $conn->query($query);
//$result = mysqli_query($connection, $sql);

if (!$result) {
    return false;
}


// Metoda mysqli_fetch_row(), určeno pro list() while
if ($verzeWhile == 0) {

    while ($row = $result->fetch_row()) {
        $userId = $row[0];
        $userLogin = $row[1];
        $userEmail = $row[2];

        echo "ID: " . $userId . "\n";
        echo ("useLogin: " . $userLogin . "\n");
        echo ("userEmail: " . $userEmail . "\n");
        echo "<br>";
    }
}


if ($verzeWhile == 7) {

    while ($row = $result->fetch_row()) {
        $userId = $row[0];
        $userLogin = $row[1];
        $userEmail = $row[2];

        echo "ID: " . $userId . "\n";
        echo ("useLogin: " . $userLogin . "\n");
        echo ("userEmail: " . $userEmail . "\n");
        echo "<br>";
    }
}


// Metoda mysqli_fetch_array() - MYSQLI_NUM
if ($verzeWhile == 1) {

    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        //while ($row = $result->fetch_row()) {
        $userId = $row[0];
        $userLogin = $row[1];
        $userEmail = $row[2];

        echo "ID: " . $userId . "\n";
        echo ("useLogin: " . $userLogin . "\n");
        echo ("userEmail: " . $userEmail . "\n");
        echo "<br>";
    }
}

// Metoda mysqli_fetch_array() - MYSQLI_ASSOC
if ($verzeWhile == 2) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $userId = $row['userId'];
        $userLogin = $row['userLogin'];
        $userEmail = $row['userEmail'];

        echo "ID: " . $userId . "\n";
        echo ("Login: " . $userLogin . "\n");
        echo ("Email: " . $userEmail . "\n");
        echo "<br>";
    }
}

// Metoda  mysqli_fetch_assoc()pracuje  stejně  jako předchozí  metoda  mysqli_fetch_array(), kdyžse vparametru zadáhodnota MYSQLI_ASSOC.
if ($verzeWhile == 3) {
    while ($row = $result->fetch_assoc()) {
        $userId = $row['userId'];
        $userLogin = $row['userLogin'];
        $userEmail = $row['userEmail'];

        echo "ID: " . $userId . "\n";
        echo ("Login: " . $userLogin . "\n");
        echo ("Email: " . $userEmail . "\n");
        echo "<br>";
    }
}


if ($verzeWhile == 4) {

    while ($row = mysqli_fetch_assoc($result)) {
        $userId = $row['userId'];
        $userLogin = $row['userLogin'];
        $userEmail = $row['userEmail'];

        echo "ID: " . $userId . "\n";
        echo ("Login: " . $userLogin . "\n");
        echo ("Email: " . $userEmail . "\n");
        echo "<br>";
    }

    echo "<br>";
}


if ($verzeWhile == 5) {

    while ($row = mysqli_fetch_array($result)) {
        $userId = $row['userId'];
        $userLogin = $row['userLogin'];
        $userEmail = $row['userEmail'];

        echo "ID: " . $userId . "\n";
        echo ("Login: " . $userLogin . "\n");
        echo ("Email: " . $userEmail . "\n");
        echo "<br>";
    }

    echo "<br>";
}



if ($verzeWhile == 6) {

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $userId = $row['userId'];
        $userLogin = $row['userLogin'];
        $userEmail = $row['userEmail'];

        echo "ID: " . $userId . "\n";
        echo ("Login: " . $userLogin . "\n");
        echo ("Email: " . $userEmail . "\n");
        echo "<br>";
    }

    echo "<br>";
}


if ($verzeWhile == 0) {

    while ($row = mysqli_fetch_row($result)) {
        $userId = $row[0];
        $userLogin = $row[1];
        $userEmail = $row[2];

        echo "ID: " . $userId . "\n";
        echo ("useLogin: " . $userLogin . "\n");
        echo ("userEmail: " . $userEmail . "\n");
        echo "<br>";
    }
}






$conn->close();



require "footer.php";


?>