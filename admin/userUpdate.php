<?php
require "config.php";
?>
<?php


if (isset($_GET["userUpdateId"])) {

	$userUpdateId = $_GET['userUpdateId'];
}


if (isset($_POST["userSubmit"])) {
	$userUpdateId = $_POST["userUpdateId"];
}



if (isset($_POST["userSubmit"])) {

	$userLogin = $_POST["userLogin"];
	$userPass = $_POST["userPass"];
	$userPassRe = $_POST["userPassRe"];
	$userEmail = $_POST["userEmail"];
	$userNickName = $_POST["userNickName"];
	$userFirstName = $_POST["userFirstName"];
	$userLastName = $_POST["userLastName"];


	// KONTROLA ZADÁVÁNÍ    
	$jmenoSouboru = 'userUpdate';

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

	/*
	// Kolik existuje v databázi záznamů - userLogin, 
	$sql = "SELECT userId, userLogin FROM users WHERE userLogin=?";
	$stmt = $conn->stmt_init();
	$stmt->prepare($sql);
	$stmt->bind_param("s", $userLogin);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($userIdExist, $userLoginExist);

	$resultCount = $stmt->num_rows();

	// první způsob
	while ($stmt->fetch()) {
		//k tomuto je potřeba bint_result
		$userLoginExist;
		$userIdExist;
	}

	
	// druhý způsob
	while ($row = $result->fetch_assoc()) {
		$userIdExist = $row['userId'];
		$userLoginExist = $row['userLogin'];
	}


	if ($userLoginExist === $userUpdateId) {
		header("Location: userUpdate.php?userUpdateId=" . $userUpdateId . '&error=existujiciUcet' . '&userLogin=' . $userLogin . '&userEmail=' . $userEmail .  '&userIdExist=' . $userIdExist);
		exit();
	}
*/

	// Vlož do databáze proměnné z formuláře
	$query = "UPDATE users SET userLogin=?,userPass=?,userEmail=?,userNickName=?,userFirstName=?,userLastName=? WHERE userId=?";
	$stmt = $conn->stmt_init();
	$stmt->prepare($query);
	$userPassHash = password_hash($userPass, PASSWORD_DEFAULT);
	$stmt->bind_param('sssssss', $userLogin, $userPassHash, $userEmail, $userNickName, $userFirstName, $userLastName, $userUpdateId);

	if ($stmt->execute()) {
		header("Location: userUpdate.php?userUpdateId=" . $userUpdateId . "&odeslano=zapsano");
		exit;
	} else {
		die('Chyba : (' . $mysqli->errno . ') ' . $mysqli->error);
	}
	$stmt->close();
	$conn->close();
}




require "header.php";

?>



<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Uživatel</h1>
				</div>


				<div class="col-auto">
					<a class="btn app-btn-secondary" href="userVypis.php">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
						</svg>
						zpět na přehled uživatelů
					</a>
				</div>

				<!--//col-auto-->
			</div>
			<!--//row-->
			<div class=" tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">

								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">ID</th>
											<th class="cell">Login</th>
											<th class="cell">Heslo</th>
											<th class="cell">Heslo</th>
											<th class="cell">Email</th>
											<th class="cell">Nick</th>
											<th class="cell">Jméno</th>
											<th class="cell">Příjmení</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$query = "SELECT userId, userLogin,userEmail,userNickName,userFirstName,userLastName FROM users WHERE userId LIKE ? limit 1";
										$stmt = $conn->stmt_init();
										$stmt->prepare($query);
										$stmt->bind_param('s', $userUpdateId);
										$stmt->execute();
										$stmt->bind_result($userId, $userLogin, $userEmail, $userNickName, $userFirstName, $userLastName);



										while ($stmt->fetch()) {
											echo '<tr>
												<td class="cell"><span class="cell-data">' . $userId . '</span><span class="note">userId</span></td>
												<td class="cell">' . $userLogin . '</td>
												<td class="cell"></td>
												<td class="cell"></td>
												<td class="cell">' . $userEmail . '</td>
												<td class="cell">' . $userNickName . '</td>
												<td class="cell">' . $userFirstName . '</td>
												<td class="cell">' . $userLastName . '</td>' . '

											</tr>';
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="app-content pt-3 p-md-3 p-lg-4">
						<div class="container-xl">
							<!--<h1 class="app-page-title">Aktualizace údajů</h1>
								<hr class="mb-4">-->
							<div class="row g-4 settings-section">

								<div class="col-12 col-md-4">
									<h3 class="section-title">Uživatelské údaje</h3>
									<div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
								</div>



								<div class="col-12 col-md-8">
									<div class="app-card app-card-settings shadow-sm p-4">

										<div class="app-card-body">


											<?php


											if (isset($_GET["error"])) {

												// Hláška z GET- existující účet
												if ($_GET["error"] == "existujiciUcet") {
													echo '<p class="btn btn-warning">Uživatelské jméno již existuje</p>';
												}


												// Hláška z GET- neshodující se heslo
												if ($_GET["error"] == "neshodneHeslo") {
													echo '<p class="btn btn-warning">Heslo se neshoduje</p>';
												}

												// Hláška z GET- špatný email
												if ($_GET["error"] == "invalidEmail") {
													echo '<p class="btn btn-warning">Neplatná forma emailu</p>';
												}


												// Hláška z GET- neplatné uživatelské jméno
												if ($_GET["error"] == "invalidLogin") {
													echo '<p class="btn btn-warning">Uživatelské jméno obsahovalo zakázané znaky</p>';
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
													
													Účet byl upraven</p>';
												}
											}


											echo '
												<form action="userUpdate.php" method="post" class="settings-form">
													<div class="mb-3">
														<label for="setting-input-1" class="form-label">Přihlašovací jméno*</label>';
											echo '<input type="hidden" name="userUpdateId" placeholder="' . $userUpdateId . '"' .  ' value="' . $userUpdateId . '">';

											// Zobraz podle GET input
											if (isset($_GET["userLogin"])) {
												echo '<input type="text" class="form-control" name="userLogin" placeholder="userLogin" value="' . $_GET["userLogin"] . '">';
											} else {
												echo '<input type="text" class="form-control" name="userLogin" placeholder="' . 'prihlasovacijmeno' . '"' .  ' value="' . $userLogin . '">';
											}

											echo '</div>';

											echo '<div class="mb-3">
															<label for="setting-input-2" class="form-label">Heslo*</label>';
											// Vypiš heslo
											echo '<input type="password" class="form-control" name="userPass" placeholder="Heslo">';
											echo '<input type="password" class="form-control" name="userPassRe" placeholder="Heslo">';


											echo '</div>';

											echo '<div class="mb-3">
															<label for="setting-input-3" class="form-label">Email*</label>';


											// Zobraz podle GET input
											if (isset($_GET["userEmail"])) {
												echo '<input type="text" class="form-control" name="userEmail" placeholder="E-mail" value="' . $_GET["userEmail"] . '">';
											} else {
												echo '<input type="text" class="form-control" name="userEmail" placeholder="' . 'Email' . '"' .  ' value="' . $userEmail . '">';
											}

											echo '</div>';


											echo '<div class="mb-3">
															<label for="setting-input-4" class="form-label">Osobní údaje</label>';
											echo '<input type="text" class="form-control" name="userNickName" placeholder="' . 'Nick' . '"' .  ' value="' . $userNickName . '">';



											echo '<input type="text" class="form-control" name="userFirstName" placeholder="' . 'Křestní jméno' . '"' .  ' value="' . $userFirstName . '">';
											//echo '<input type="text" class="form-control" name="userLastName" placeholder="' . 'Příjmení' . '"' .  'value="' . $userLastName . '">';
											?>
											<input type="text" class="form-control" name="userLastName" placeholder="Příjmení" value="<?php echo $userLastName ?>">

											<?php

											echo '</div>';

											echo '<button type="submit" class="btn app-btn-primary" name="userSubmit">Aktualizovat uživatele</button>';



											?>


											</form>
										</div>
										<!--//app-card-body-->

										<!--//app-card-->
									</div>
								</div>
								<!--//row-->
								<hr class="my-4">
								<div class="row g-4 settings-section">
									<div class="col-12 col-md-4">
										<h3 class="section-title">Plan</h3>
										<div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
									</div>
									<div class="col-12 col-md-8">
										<div class="app-card app-card-settings shadow-sm p-4">

											<div class="app-card-body">
												<div class="mb-2"><strong>Current Plan:</strong> Pro</div>
												<div class="mb-2"><strong>Status:</strong> <span class="badge bg-success">Active</span></div>
												<div class="mb-2"><strong>Expires:</strong> 2030-09-24</div>
												<div class="mb-4"><strong>Invoices:</strong> <a href="#">view</a></div>
												<div class="row justify-content-between">
													<div class="col-auto">
														<a class="btn app-btn-primary" href="#">Upgrade Plan</a>
													</div>
													<div class="col-auto">
														<a class="btn app-btn-secondary" href="#">Cancel Plan</a>
													</div>
												</div>

											</div>
											<!--//app-card-body-->

										</div>
										<!--//app-card-->
									</div>
								</div>
								<!--//row-->
								<hr class="my-4">
								<div class="row g-4 settings-section">
									<div class="col-12 col-md-4">
										<h3 class="section-title">Data &amp; Privacy</h3>
										<div class="section-intro">Settings section intro goes here. Morbi vehicula, est eget fermentum ornare. </div>
									</div>
									<div class="col-12 col-md-8">
										<div class="app-card app-card-settings shadow-sm p-4">
											<div class="app-card-body">
												<form class="settings-form">
													<div class="form-check mb-3">
														<input class="form-check-input" type="checkbox" value="" id="settings-checkbox-1" checked>
														<label class="form-check-label" for="settings-checkbox-1">
															Keep user app activity history
														</label>
													</div>
													<!--//form-check-->
													<div class="form-check mb-3">
														<input class="form-check-input" type="checkbox" value="" id="settings-checkbox-2" checked>
														<label class="form-check-label" for="settings-checkbox-2">
															Keep user app preferences
														</label>
													</div>
													<div class="form-check mb-3">
														<input class="form-check-input" type="checkbox" value="" id="settings-checkbox-3">
														<label class="form-check-label" for="settings-checkbox-3">
															Keep user app search history
														</label>
													</div>
													<div class="form-check mb-3">
														<input class="form-check-input" type="checkbox" value="" id="settings-checkbox-4">
														<label class="form-check-label" for="settings-checkbox-4">
															Lorem ipsum dolor sit amet
														</label>
													</div>
													<div class="form-check mb-3">
														<input class="form-check-input" type="checkbox" value="" id="settings-checkbox-5">
														<label class="form-check-label" for="settings-checkbox-5">
															Aenean quis pharetra metus
														</label>
													</div>
													<div class="mt-3">
														<button type="submit" class="btn app-btn-primary">Save Changes</button>
													</div>
												</form>
											</div>
											<!--//app-card-body-->
										</div>
										<!--//app-card-->
									</div>
								</div>
								<!--//row-->
								<hr class="my-4">
								<div class="row g-4 settings-section">
									<div class="col-12 col-md-4">
										<h3 class="section-title">Notifications</h3>
										<div class="section-intro">Settings section intro goes here. Duis velit massa, faucibus non hendrerit eget.</div>
									</div>
									<div class="col-12 col-md-8">
										<div class="app-card app-card-settings shadow-sm p-4">
											<div class="app-card-body">
												<form class="settings-form">
													<div class="form-check form-switch mb-3">
														<input class="form-check-input" type="checkbox" id="settings-switch-1" checked>
														<label class="form-check-label" for="settings-switch-1">Project notifications</label>
													</div>
													<div class="form-check form-switch mb-3">
														<input class="form-check-input" type="checkbox" id="settings-switch-2">
														<label class="form-check-label" for="settings-switch-2">Web browser push notifications</label>
													</div>
													<div class="form-check form-switch mb-3">
														<input class="form-check-input" type="checkbox" id="settings-switch-3" checked>
														<label class="form-check-label" for="settings-switch-3">Mobile push notifications</label>
													</div>
													<div class="form-check form-switch mb-3">
														<input class="form-check-input" type="checkbox" id="settings-switch-4">
														<label class="form-check-label" for="settings-switch-4">Lorem ipsum notifications</label>
													</div>
													<div class="form-check form-switch mb-3">
														<input class="form-check-input" type="checkbox" id="settings-switch-5">
														<label class="form-check-label" for="settings-switch-5">Lorem ipsum notifications</label>
													</div>
													<div class="mt-3">
														<button type="submit" class="btn app-btn-primary">Save Changes</button>
													</div>
												</form>
											</div>
											<!--//app-card-body-->
										</div>
										<!--//app-card-->
									</div>
								</div>
								<hr class="my-4">
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