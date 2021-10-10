<?php require "config.php"; ?>

<?php


if (isset($_GET["rubrikyUpdateId"])) {

	$rubrikyUpdateId = $_GET['rubrikyUpdateId'];
}


if (isset($_POST["rubrikySubmit"])) {
	$rubrikyId = $_POST["rubrikyId"];
	$rubrikyName = $_POST["rubrikyName"];



	// KONTROLA ZADÁVÁNÍ    
	$jmenoSouboru = basename($_SERVER['PHP_SELF'], '.php');


	// není-li prázdné pole
	if (empty($rubrikyName)) {
		header("Location: " . $jmenoSouboru . ".php?error=prazdne");
		exit();
	}


	// pouze písmena a čísla
	if (!preg_match("/^[a-zA-Z0-9]*$/", $rubrikyName)) {
		header("Location: " . $jmenoSouboru . ".php?error=invalid");
		exit();
	}



	// Vlož do databáze proměnné z formuláře
	$query = "UPDATE rubriky SET rubrikyName=?  WHERE rubrikyId=?";


	$stmt = $conn->stmt_init();
	$stmt->prepare($query);
	$stmt->bind_param('ss', $rubrikyName, $rubrikyId);

	if ($stmt->execute()) {
		header("Location: " . BASE_URL . RUBRIKY_VYPIS . ".php?odeslano=upravena" . "&rubrikyUpdateId=" . $rubrikyId);
		$stmt->close();
		$conn->close();
		exit;
	} else {
		die('Chyba : (' . $mysqli->errno . ') ' . $mysqli->error);
	}
}


require "header.php";
?>



<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Úprava rubriky</h1>
				</div>
				<div class="col-auto">
					<a class="btn app-btn-secondary" href="rubrikyVypis.php">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
						</svg>
						zpět na přehled uživatelů
					</a>
				</div>

				<!--//col-auto-->
			</div>
			<!--//row-->


			<hr class="my-4">


			<div class=" tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">


					<div class="app-content pt-3 p-md-3 p-lg-4">
						<div class="container-xl">

							<div class="row g-4 settings-section">




								<div class="col-12 col-md-8">
									<div class="app-card app-card-settings shadow-sm p-4">

										<div class="app-card-body">
											<form action="rubrikyUpdate.php" method="post" class="form-signup">



												<?php



												// GET ODESLÁNO
												if (isset($_GET["odeslano"])) {

													// Hláška z GET - účet vytvořen
													if ($_GET["odeslano"] == "upravana") {
														echo '<p class="btn btn-warning">
													
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
															
															Rubrika byla upravena</p>';
													}
												}

												// GET ODESLÁNO
												if (isset($_GET["error"])) {



													// Hláška z GET - účet vytvořen
													if ($_GET["error"] == "existujiciUcet") {
														echo '<p class="btn btn-warning">Štítek již existuje</p>';
													}


													// Hláška z GET - účet vytvořen
													if ($_GET["error"] == "prazdne") {
														echo '<p class="btn btn-warning">Nevyplňené pole</p>';
													}

													// Hláška z GET - účet vytvořen
													if ($_GET["error"] == "invalid") {
														echo '<p class="btn btn-warning">Zakázané znaky</p>';
													}
												}

												?>



												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Název upravovaného štítku</label>



													<?php






													$queryRubrikyUpdate = "SELECT rubrikyId, rubrikyName FROM rubriky WHERE rubrikyId = $rubrikyUpdateId";
													$resultRubrikyUpdate = $conn->query($queryRubrikyUpdate);

													if (!$resultRubrikyUpdate) {
														return false;
													}

													while ($row = $resultRubrikyUpdate->fetch_assoc()) {
														$rubrikyIdSelect = $row['rubrikyId'];
														$rubrikyNameSelect = $row['rubrikyName'];



													?>

														<input type="hidden" name="rubrikyId" placeholder="<?php echo $rubrikyIdSelect ?>" value="<?php echo $rubrikyIdSelect ?>">
														<input type="text" name="rubrikyName" class="form-control" placeholder="<?php echo $rubrikyNameSelect ?>" value="<?php echo $rubrikyNameSelect ?>">

													<?php 	} ?>



													<button type="submit" name="rubrikySubmit" class="btn app-btn-primary">Vytvořit nový štítek</button>




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