<?php require "config.php"; ?>

<?php
if (isset($_POST["userSubmit"])) {
	$userLogin = $_POST["userLogin"];
	$userPass = $_POST["userPass"];
	$userPassRe = $_POST["userPassRe"];
	$userEmail = $_POST["userEmail"];
	$userNickName = $_POST["userNickName"];
	$userFirstName = $_POST["userFirstName"];
	$userLastName = $_POST["userLastName"];



	// KONTROLA ZADÁVÁNÍ    
	$jmenoSouboru = 'userRegistrace';

	// není-li prázdné pole
	if (empty($userLogin) || empty($userPass) || empty($userEmail)) {
		header("Location: " . $jmenoSouboru . ".php?error=prazdne&userLogin=" . $userLogin . '&userEmail=' . $userEmail  . '&userUpdateId=' . $userUpdateId);
		exit();
	}

	// pouze písmena a čísla
	if (!preg_match("/^[a-zA-Z0-9]*$/", $userLogin)) {
		header("Location: " . $jmenoSouboru . ".php?error=invalidLogin&userEmail=" . $userEmail  . '&userUpdateId=' . $userUpdateId);
		exit();
	}
	//  kontrola emailu
	if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
		header("Location: " . $jmenoSouboru . ".php?error=invalidEmail&userLogin=" . $userLogin . '&userEmail=' . $userEmail  . '&userUpdateId=' . $userUpdateId);
		exit();
	}

	// shoda hesla
	if ($userPass !== $userPassRe) {
		header("Location: " . $jmenoSouboru . ".php?error=neshodneHeslo&userLogin=" . $userLogin . '&userEmail=' . $userEmail  . '&userUpdateId=' . $userUpdateId);

		exit();
	}


	// Kolik existuje v databázi záznamů - userLogin, 
	$sql = "SELECT userLogin FROM users WHERE userLogin=?";
	$stmt = $conn->stmt_init();
	$stmt->prepare($sql);
	$stmt->bind_param("s", $userLogin);
	$stmt->execute();
	$stmt->store_result();

	$resultCount = $stmt->num_rows();

	if ($resultCount > 0) {
		header("Location: userRegistrace.php?error=existujiciUcet&userLogin=" . $userLogin . '&userEmail=' . $userEmail);
		exit();
	}

	// Vlož do databáze proměnné z formuláře
	$query = "INSERT INTO users(userLogin,userPass,userEmail,userNickName,userFirstName,userLastName) VALUES(?,?,?,?,?,?)";
	$stmt = $conn->stmt_init();
	$stmt->prepare($query);
	$userPassHash = password_hash($userPass, PASSWORD_DEFAULT);
	$stmt->bind_param('ssssss', $userLogin, $userPassHash, $userEmail, $userNickName, $userFirstName, $userLastName);

	if ($stmt->execute()) {
		header("Location: " . BASE_URL . namePage() . ".php?odeslano=zapsano");
		$stmt->close();
		$conn->close();
		exit;
	} else {
		die('Chyba : (' . $mysqli->errno . ') ' . $mysqli->error);
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


								<h2 class="auth-heading text-center mb-5">Vytvořit účet</h2>
								<!--<h1 class="app-page-title">Aktualizace údajů</h1>
								<hr class="mb-4">-->
								<div class="row g-4 settings-section">
									<div class="col-auto">
										<a class="btn app-btn-secondary" href="login.php">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
											</svg>
											zpět na přihlášení
										</a>

									</div>





									<div class="col-12 col-md-8">
										<div class="app-card app-card-settings shadow-sm p-4">

											<div class="app-card-body">
												<form action="userRegistrace.php" method="post" class="form-signup">



													<?php


													if (isset($_GET["error"])) {

														// Hláška z GET- existující účet
														if ($_GET["error"] == "existujiciUcet") {
															echo '<p class="badge bg-danger">Uživatelské jméno již existuje</p>';
														}


														// Hláška z GET- neshodující se heslo
														if ($_GET["error"] == "neshodneHeslo") {
															echo '<p class="badge bg-danger">Heslo se neshoduje</p>';
														}

														// Hláška z GET- špatný email
														if ($_GET["error"] == "invalidEmail") {
															echo '<p class="badge bg-danger">Neplatná forma emailu</p>';
														}


														// Hláška z GET- neplatné uživatelské jméno
														if ($_GET["error"] == "invalidLogin") {
															echo '<p class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
															<path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
															<path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
														  </svg> Uživatelské jméno obsahovalo zakázané znaky</p>';
														}


														// Hláška z GET- Nevyplněné pole 
														if ($_GET["error"] == "prazdne") {
															echo '<p class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
													<path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
													<path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
												  </svg> Nevyplněné pole</p>';
														}
													}

													// GET ODESLÁNO
													if (isset($_GET["odeslano"])) {

														// Hláška z GET - účet vytvořen
														if ($_GET["odeslano"] == "zapsano") {
															echo '<p class="btn btn-warning">
													
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
															
															Účet byl vytvořen</p>';
														}


														// Hláška z GET - účet vytvořen
														if ($_GET["odeslano"] == "dbok") {
															echo '<p class="btn btn-success">
														
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
																
																Databáze vytvořena. Smažte soubor install.php!</p>';
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


													echo '<div class="mb-3">
												<label for="setting-input-1" class="form-label">Uživatelské jméno</label>';

													// Zobraz podle GET input
													if (isset($_GET["userLogin"])) {
														echo '<input type="text" name="userLogin" class="form-control" placeholder="Uživatelské jméno" value="' . $_GET["userLogin"] . '">';
													} else {
														echo '<input type="text" name="userLogin" class="form-control" placeholder="Uživatelské jméno">';
													}
													echo '</div>';

													echo '<div class="mb-3">
															<label for="setting-input-2" class="form-label">Heslo</label>';
													// Vypiš heslo
													echo '<input type="password" name="userPass" class="form-control"  placeholder="Heslo">';
													echo '<input type="password" name="userPassRe" class="form-control" placeholder="Heslo">';
													echo '</div>';

													echo '<div class="mb-3">
												<label for="setting-input-3" class="form-label">Email</label>';

													// Zobraz podle GET input
													if (isset($_GET["userEmail"])) {
														echo '<input type="text" name="userEmail" class="form-control" placeholder="E-mail" value="' . $_GET["userEmail"] . '">';
													} else {
														echo '<input type="text" name="userEmail" class="form-control" placeholder="E-mail">';
													}
													echo '</div>';

													echo '<div class="mb-3">
															<label for="setting-input-4" class="form-label">Osobní údaje</label>';

													echo '
												<input type="text" name="userNickName" class="form-control" placeholder="Přezdívka">
												<input type="text" name="userFirstName" class="form-control" placeholder="Jméno">
												<input type="text" name="userLastName" class="form-control" placeholder="Příjmení">
												</div>
												<div class="section-intro">Vytvořením účtu automaticky přijímáte <a href="#">Podmínky použití.</a></div><br>
												<button type="submit" name="userSubmit" class="btn app-btn-primary">Vytvořit uživatele</button>
												';


													?>
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