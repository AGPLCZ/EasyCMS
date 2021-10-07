<?php
require_once "header.php";
require_once "config.php";

$pageName = basename($_SERVER['PHP_SELF'], '.php');
?>

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Uživatelé</h1>
					<?php

					// GET ODESLÁNO - userNew
					if (isset($_GET["odeslano"])) {

						// Hláška z GET - účet vytvořen
						if ($_GET["odeslano"] == "zapsano") {
							echo '<span class="btn btn-warning">
							
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
							<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
						  </svg>

							Účet byl vytvořen</span>';
						}
					}
					?>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto" style="padding-right: 7px">
								<form action="<?php echo $pageName ?>.php" method="post" class="table-search-form row gx-1 align-items-center">
									<select name="hledanyTyp" class="form-select w-auto">

										<option value="userLogin">Uživatelské jméno</option>
										<option value="userEmail">Email</option>

									</select>


									<div class="col-auto">
										<div class="col-auto">
										</div>

										<div class="col-auto">
											<input type="text" name="hledanaFraze" id="search-orders" class="form-control search-orders" style="height: 38px;" placeholder="Hledaný výraz">
										</div>
									</div>

									<div class="col-auto">
									</div>
									<div class="col-auto">
										<button type="submit" name="userSubmitSearch" class="btn app-btn-secondary">Hledej</button>
									</div>
								</form>

							</div>
							<?php
							if (isset($_POST["userSubmitSearch"])) {

							?>


								<div class="col-auto">
									<a class="btn app-btn-secondary" href="<?php echo $pageName ?>.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
										</svg>
										zobrazit všechny uživatele
									</a>
								</div>

							<?php
							}
							?>

						</div>
					</div>
				</div>
			</div>

			<div class=" tab-content" id="orders-table-tab-content">
				<div class=" tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<form action="<?php echo $pageName ?>.php" method="post">
									<table class=" table app-table-hover mb-0 text-left">

										<thead>
											<tr>
											<tr>
												<td colspan="8">

													<div class="col-auto">
														<a class="btn app-btn-secondary" href="userNew.php">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
																<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
																<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
															</svg>
															Vytvořit nového uživatele
														</a>
													</div>
												</td>
												<td>

													<?php
													$seradit = "od_nejmensiho";

													if (isset($_GET["seradit"])) {
														$seradit = $_GET["seradit"];
													}


													if ($seradit == "od_nejmensiho") {


														echo '<a href="' . $pageName . '.php?seradit=od_nejvetsiho"> Seřadit od  nejnovějšího</a>';
													} else {

														echo '<a href="' . $pageName . '.php?seradit=od_nejmensiho"> Seřadit od nejstaršího</a>';
													}

													?>
												</td>
											</tr>

											<?php
											// vypis hledaných uživatelů
											if (isset($_POST["userSubmitSearch"])) {

												$hledanyTyp = $_POST['hledanyTyp'];
												$hledanaFraze = trim($_POST['hledanaFraze']);  // trim - odrstraní bílé znaky, " ", "\t", "\n", "\r", "\0", "\x0B".

												if (!$hledanyTyp or !$hledanaFraze) {
													echo '<p class="badge bg-danger">Nevyplnili jste některé údaje</p>';
												}

												switch ($hledanyTyp) {
													case 'userLogin':
													case 'userEmail':
														break;

													default:
														echo '<p class="badge bg-danger">Nevyplnili jste některé údaje</p>';
														exit;
												}

												$query = "SELECT userId, userLogin,userEmail,userNickName,userFirstName,userLastName FROM users WHERE $hledanyTyp LIKE ?";
												$stmt = $conn->prepare($query);
												$stmt->bind_param('s', $hledanaFraze); // s = string, i = integer, d = double, b = blob
												$stmt->execute();
												$stmt->store_result();
												$stmt->bind_result($userId, $userLogin, $userEmail, $userNickName, $userFirstName, $userLastName);
												echo '<tr><td colspan="9" class="cell">Počet nalezených záznamů:' . $stmt->num_rows . ' 	</td></tr>';
											?>

												<tr>
													<th class="cell"></th>
													<th class="cell">ID</th>
													<th class="cell">Login</th>
													<th class="cell">Email</th>
													<th class="cell">Nick</th>
													<th class="cell">Jméno</th>
													<th class="cell">Příjmení</th>
													<th class="cell">Práva</th>
													<th class="cell"></th>
												</tr>
										</thead>

										<tbody>

											<?php
												while ($stmt->fetch()) { ?>
												<tr>
													<td class=" cell"><input type="checkbox" name="userDel[]" value="<?php echo $userId; ?>"></td>
													<td class="cell"><span class="cell-data"> <?php echo $userId; ?></span><span class="note">userId</span></td>
													<td class="cell"><?php echo $userLogin; ?></td>
													<td class="cell"><?php echo $userEmail; ?></td>
													<td class="cell"><?php echo $userNickName ?></td>
													<td class="cell"><?php echo $userFirstName ?></td>
													<td class="cell"><?php echo $userLastName  ?></td>
													<td class="cell"><span class="badge bg-success">Admin</span></td>
													<td class="cell"><a class="btn btn-outline-secondary" href="userUpdate.php?userUpdateId=<?php echo $userId  ?>">

															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
																<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
																<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
															</svg> Upravit uživatele </a></td>
												</tr>
											<?php
												}
											?>
											<tr>
												<td class="cell" colspan="8"><button type="submit" class="btn app-btn-primary theme-btn mx-auto" name="userSubmitDel">Smazat uživatele</button></td>
											<tr>
											<?php
											}
											?>

											<?php

											// smazat uživatele
											if (isset($_POST["userSubmitDel"])) {

												if (isset($_POST['userDel'])) {

													foreach ($_POST['userDel'] as $userDel) {
														$query = ("DELETE FROM users WHERE userId=?");
														$stmt = $conn->stmt_init();
														$stmt->prepare($query);
														$stmt->bind_param('s', $userDel);
														$stmt->execute();
													}
												}
											}

											?>

											<?php
											// výpis uživatelů, nezobrazuje se když POST hledání  -----------------------------
											if (!isset($_POST["userSubmitSearch"])) {


											?>

											<tr>
												<th class="cell"></th>
												<th class="cell">ID</th>
												<th class="cell">Login</th>
												<th class="cell">Email</th>
												<th class="cell">Nick</th>
												<th class="cell">Jméno</th>
												<th class="cell">Příjmení</th>
												<th class="cell">Práva</th>
												<th class="cell"></th>
											</tr>
											</thead>
										<tbody>

											<?php



												$seradit = "od_nejmensiho";


												if (isset($_GET["seradit"])) {
													$seradit = $_GET["seradit"];
												}


												if ($seradit == "od_nejmensiho") {
													$query = "SELECT userId, userLogin,userEmail,userNickName,userFirstName,userLastName FROM users ORDER BY userId ASC";
												} else {
													$query = "SELECT userId, userLogin,userEmail,userNickName,userFirstName,userLastName FROM users ORDER BY userId DESC";
												}

												$stmt = $conn->stmt_init();
												$stmt->prepare($query);
												$stmt->execute();
												$stmt->bind_result($userId, $userLogin, $userEmail, $userNickName, $userFirstName, $userLastName);
												while ($stmt->fetch()) { ?>




												<tr>
													<td class="cell"><input type="checkbox" name="userDel[]" value="<?php echo $userId ?>"></td>
													<td class=" cell"><span class="cell-data"><?php echo $userId ?></span><span class="note">userId</span></td>
													<td class="cell"><?php echo $userLogin ?></td>
													<td class="cell"><?php echo $userEmail ?></td>
													<td class="cell"><?php echo $userNickName ?></td>
													<td class="cell"><?php echo $userFirstName ?></td>
													<td class="cell"><?php echo $userLastName ?></td>
													<td class="cell"><span class="badge bg-success">Admin</span></td>
													<td class="cell"><a class="btn btn-outline-secondary" href="userUpdate.php?userUpdateId=<?php echo $userId ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
																<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
																<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
															</svg> Upravit uživatele </a></td>
												</tr>


											<?php
												}
											?>

											<tr>
												<td class="cell" colspan="8"><button type="submit" class="btn app-btn-primary theme-btn mx-auto" name="userSubmitDel">Smazat uživatele</button></td>
											<tr>
											<?php
											}
											?>


											<?php
											$stmt->close();
											$conn->close();

											?>

										</tbody>

									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Javascript -->
<script src=" assets/plugins/popper.min.js">
</script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script>

</body>

</html>