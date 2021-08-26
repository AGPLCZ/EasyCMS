<?php

require "config.php";


if (isset($_POST['loginSubmit'])) {


	$userLogin = $_POST['userLogin'];
	$userPass = $_POST['userPass'];
	$userEmail = $_POST['userLogin'];



	if (empty($userLogin) || empty($userPass)) {
		header("Location: login.php?error=prazdne&mailuid=" . $mailuid);
		exit();
	}





	/*


	// Vlož do databáze proměnné z formuláře
	$query = "SELECT * FROM users WHERE userLogin=? OR userEmail=?";
	$stmt = $conn->stmt_init();
	$stmt->prepare($query);
	
	$stmt->bind_param('ss', $userLogin, $userEmail);

	if ($stmt->execute()) {

		session_start();

		$_SESSION['userId'] = $row['userId'];
		$_SESSION['userLogin'] = $row['userLogin'];
		$_SESSION['userEmail'] = $row['userEmail'];

		header("Location: index.php?login=prihlaseny");


		$stmt->close();
		$conn->close();
		exit;
	} else {
		die('Chyba : (' . $mysqli->errno . ') ' . $mysqli->error);
	}


*/


	$sql = "SELECT * FROM users WHERE userLogin=? OR userEmail=?";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: login.php?error=sqlerror");
		exit();
	} else {

		mysqli_stmt_bind_param($stmt, "ss", $userLogin, $userEmail);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);


		if ($row = mysqli_fetch_assoc($result)) {
			$pwdCheck = password_verify($userPass, $row['userPass']);
			if ($pwdCheck == false) {
				header("Location: login.php?error=chybneHeslo");
				exit();
			} else if ($pwdCheck == true) {

				session_start();

				$_SESSION['userId'] = $row['userId'];
				$_SESSION['userLogin'] = $row['userLogin'];
				$_SESSION['userEmail'] = $row['userEmail'];

				header("Location: index.php?login=prihlaseny");
				exit();
			} else {
				header("Location: login.php?login=spatneHeslo");
				exit();
			}
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
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





<body class="app app-login p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Přihlášení</h2>


					<?php



					if (isset($_GET["error"])) {


						if ($_GET["error"] == "chybneHeslo") {
							echo '<p class="btn btn-warning">Chybné heslo</p>';
						}


						// Hláška z GET- Nevyplněné pole 
						if ($_GET["error"] == "prazdne") {
							echo '<p class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
	<path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
	<path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
  </svg> Nevyplněné pole</p>';
						}
					}
					?>







					<div class="auth-form-container text-start">
						<form action="login.php" method="post" class="auth-form login-form">
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Uživatelské jméno</label>
								<input name="userLogin" id="signin-username" type="text" class="form-control signin-email" placeholder="Uživatelské jméno" required="required">
							</div>
							<!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="userPass" type="password" class="form-control signin-password" placeholder="Heslo" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
												Pamatovat si mne
											</label>
										</div>
									</div>
									<!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="reset-password.html">Zapomenuté heslo?</a>
										</div>
									</div>
									<!--//col-6-->
								</div>
								<!--//extra-->
							</div>
							<!--//form-group-->
							<div class="text-center">
								<button name="loginSubmit" type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Přihlásit se</button>
							</div>
						</form>

						<div class="auth-option text-center pt-5"><a class="text-link" href="userRegistrace.php">Vytvořit nový účet</a></div>
					</div>
					<!--//auth-form-container-->

				</div>
				<!--//auth-body-->

				<footer class="app-auth-footer">
					<div class="container text-center py-3">

						<small class="copyright">Redakční systém</small>

					</div>
				</footer>
				<!--//app-auth-footer-->
			</div>
			<!--//flex-column-->
		</div>
		<!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">

				</div>
				<!--//auth-background-overlay-->
			</div>
			<!--//auth-background-col-->

		</div>
		<!--//row-->


</body>

</html>