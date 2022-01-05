<?php
require "config.php";

?>

<?php
$cesta = BASE_URL;

$query2 = "SELECT id, rubrikyId FROM galerie WHERE id";
$result2 = $conn->query($query2);

if (!$result2) {
	return false;
}

while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
	$id = $row2['id'];
	$rubrikyId = $row2['rubrikyId'];
}



if (isset($_POST["galerieSubmit"])) {
	$rubrikyId = $_POST["rubrikyId"];
	$title = $_POST["title"];
	$perex = $_POST["perex"];
	$href = $_POST["href"];
	$howOpen = $_POST["howOpen"];
	$img = $_POST["img"];


	// Vlož do databáze proměnné z formuláře
	$query = "INSERT INTO galerie(rubrikyId,title,perex,href,howOpen,img) VALUES(?,?,?,?,?,?)";
	$stmt = $conn->stmt_init();
	$stmt->prepare($query);
	$stmt->bind_param('isssss', $rubrikyId, $title, $perex, $href, $howOpen, $img);

	if ($stmt->execute()) {
		header("Location: " . BASE_URL . GALERIE_VYPIS . ".php?odeslano=vytvorena");
		$stmt->close();
		$conn->close();
		exit;
	} else {
		die('Chyba : (' . $mysqli->errno . ') ' . $mysqli->error);
	}




	// KONTROLA ZADÁVÁNÍ    


	// není-li prázdné pole
	if (empty($rubrikyId)) {
		header("Location: " . BASE_URL . name_page()  . ".php?error=prazdne");
		exit();
	}
}








require "header.php";
?>



<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Nový záznam galerie</h1>





				</div>
				<div class="col-auto">
					<a class="btn app-btn-secondary" href="galerieVypis.php">
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
											<form action="galerieNew.php" method="post" class="form-signup">



												<?php




												// GET ODESLÁNO
												if (isset($_GET["odeslano"])) {

													// Hláška z GET - účet vytvořen
													if ($_GET["odeslano"] == "zapsano") {
														echo '<p class="btn btn-warning">
													
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
															
															Účet byl vytvořen</p>';
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
													<label for="setting-input-1" class="form-label">Nadpis</label>
													<input type="text" name="title" class="form-control" placeholder="Název galerie">
												</div>


												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Štítek</label>
													<select type="select" name="rubrikyId" class="form-select w-auto">


														<?php
														$query2 = "SELECT id, title FROM rubriky ORDER BY id DESC";
														$stmt2 = $conn->stmt_init();
														$stmt2->prepare($query2);
														$stmt2->execute();
														$stmt2->bind_result($id, $title);

														while ($stmt2->fetch()) {
														?>
															<option value="<?php echo $id ?>"><?php echo $title ?></option>

														<?php 	}  ?>
													</select>
												</div>


												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Perex</label>
													<input type="text" name="perex" class="form-control" placeholder="Perex">

												</div>
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Odkaz na obrázek</label>
													<input type="text" name="img" class="form-control" placeholder="img/article/1.png" value="img/article/1.png">
												</div>
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Cesta odkazu</label>
													<input type="text" name="href" class="form-control" placeholder="Cesta odkazu" value="https://dobrodruzi.club/sekce-pro-dobrodruhy/">
												</div>
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Cesta odkazu</label>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="howOpen" id="exampleRadios1" value='target=" _blank"' checked>
														<label class="form-check-label" for="exampleRadios1">Otevřít v novém okně</label>
													</div>

													<div class="form-check">
														<input class="form-check-input" type="radio" name="howOpen" id="exampleRadios2" value="">
														<label class="form-check-label" for="exampleRadios2">Otevřív v okně</label>
													</div>

												</div>

										</div>
										<div class="mb-3">

											<button type="submit" name="galerieSubmit" class="btn app-btn-primary">Vytvořit novou galerii</button>
										</div>




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