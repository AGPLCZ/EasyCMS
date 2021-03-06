<?php
require_once "function-master.php";


if (isset($_POST["submit"])) {
    $serverName = $_POST['serverName'];
    $userName = $_POST['userName'];
    $dbPassword = $_POST['dbPassword'];
    $dbName = $_POST['dbName'];

    $conn = new mysqli($serverName, $userName, $dbPassword, $dbName);




    if ($conn->connect_errno) {
        header("Location:" . BASE_URL . "install.php?odeslano=dbko");
        die();
    }



    // smazani existujících tabulek
    $tables = array('users', 'galerie', 'rubriky');
    foreach ($tables as $table) {

        $sql = "DROP TABLE IF EXISTS $table";

        $result = $conn->query($sql);

        if (!$result) {
            echo "Chyba při mazání tabulek";
        } else {
            $smazanyTabulky = "true";
        }
    }
    if ($smazanyTabulky) {
        echo "Staré tabulky smazány.<br>";
    }




    /*

$query[] = "
CREATE DATABASE `konstraktx` CHARACTER SET utf8;
";

*/

    $query = array();

    $query[] = "


CREATE TABLE `users` (
`userId` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
`userLogin` varchar(128) NOT NULL,
`userPass` varchar(255) NOT NULL,
`userEmail` varchar(128) NOT NULL,
`userNickName` varchar(128) NOT NULL,
`userFirstName` varchar(128) NOT NULL,
`userLastName` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

";



    $query[] = "



CREATE TABLE `rubriky` (
`id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`title` varchar(128) CHARACTER SET latin2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



";




    $query[] = "


CREATE TABLE `galerie` (
`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
`rubrikyId` int(11) NOT NULL,
`title` varchar(128) NOT NULL,
`perex` varchar(255) NOT NULL,
`href` varchar(128) NOT NULL,
`howOpen` varchar(128) NOT NULL,
`img` varchar(128) NOT NULL,
FOREIGN KEY (rubrikyId) REFERENCES rubriky(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




";



    $celkemTabulekProVytvoreni = count($query);
    $pocetVytvorenychTabulek = 0;

    foreach ($query as $line) {

        $result = $conn->query($line);

        if (!$result) {
            $ok = "false";
        } else {
            $pocetVytvorenychTabulek += 1;
            $ok = "true";
        }
    }

    if ($ok) {
        echo "Databáze vytvořena.<br>";
        echo "Počet vytvořených tabulek: " . $pocetVytvorenychTabulek . " / " . $celkemTabulekProVytvoreni;
        header("Location:" . BASE_URL . "userRegistrace.php?odeslano=dbok&pocetVytvorenychTabulek=" . $pocetVytvorenychTabulek . "&celkemTabulekProVytvoreni=" . $celkemTabulekProVytvoreni);
        exit();
    } else {
        echo "Nastala neznámá chyba!";
    }
}

?>



<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Redakční systém - Konstrakt Admin Bootstrap 5">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">



    <title>Redakční systém</title>
</head>

<body class="app">
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class=" tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


                        <div class="app-content pt-3 p-md-3 p-lg-4">
                            <div class="container-xl">


                                <h2 class="auth-heading text-center mb-5">Instalace</h2>

                                <p class="text-center">



                                </p>



                                <hr class="mb-4">
                                <div class="row g-4 settings-section">
                                    <div class="col-auto">
                                        <a class="btn app-btn-secondary" href="#.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                            </svg>
                                            Přečíst manuál
                                        </a>

                                    </div>





                                    <div class="col-12 col-md-8">
                                        <div class="app-card app-card-settings shadow-sm p-4">

                                            <div class="app-card-body">
                                                <form action="install.php" method="post" class="form-signup">



                                                    <?php


                                                    // GET ODESLÁNO
                                                    if (isset($_GET["odeslano"])) {

                                                        // Hláška z GET - účet vytvořen
                                                        if ($_GET["odeslano"] == "dbok") {
                                                            echo '<p class="btn btn-warning">
													
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
															
															Databáze vytvořena</p>';
                                                        }

                                                        // Hláška z GET - účet vytvořen
                                                        if ($_GET["odeslano"] == "dbko") {
                                                            echo '<p class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg>
                                                                            
                                                                            Nelze se připojit k databázi</p>';
                                                        }
                                                    }

                                                    if (isset($_GET["pocetVytvorenychTabulek"]) and (isset($_GET["celkemTabulekProVytvoreni"]))) {

                                                        $pocetVytvorenychTabulek = $_GET["pocetVytvorenychTabulek"];
                                                        $celkemTabulekProVytvoreni = $_GET["celkemTabulekProVytvoreni"];

                                                        echo '<br><p class="btn btn-success">
														
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
																
																

																';
                                                        echo "Počet vytvořených tabulek: " . $pocetVytvorenychTabulek . " / " . $celkemTabulekProVytvoreni . "</p>";
                                                    }

                                                    ?>

                                                    <div class="mb-3">
                                                        <label for="setting-input-1" class="form-label">Server name</label>

                                                        <input type="text" name="serverName" class="form-control" placeholder="localhost" value="localhost">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="setting-input-4" class="form-label">Uživatelské jméno</label>
                                                        <input type="text" name="userName" class="form-control" placeholder="userName" value="root">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="setting-input-3" class="form-label">Heslo</label>
                                                        <input type="password" name="dbPassword" class="form-control" placeholder="heslo" value="heslo">
                                                    </div>


                                                    <div class=" mb-3">
                                                        <label for="setting-input-4" class="form-label">Jméno databáze</label>
                                                        <input type="text" name="dbName" class="form-control" placeholder="dbName" value="konstraktx">
                                                    </div>
                                                    <div class="section-intro">Vytvořením účtu automaticky přijímáte <a href="#">Podmínky použití.</a></div><br>
                                                    <button type="submit" name="submit" class="btn app-btn-primary">Vytvořit databázi</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="app-footer">
        <div class="container text-center py-3">
            <small class="copyright">Redakční systém Konstrakt</small>

        </div>
    </footer>

    </div>


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>