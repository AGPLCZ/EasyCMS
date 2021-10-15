<?php
require "config.php";

?>

<?php
$cesta = BASE_URL;

if (isset($_GET["galerieUpdateId"])) {
	$galerieUpdateId = $_GET['galerieUpdateId'];






	$query2 = "SELECT rubrikyId,title,perex,href,howOpen,img FROM galerie WHERE id = ?";
	$stmt2 = $conn->stmt_init();
	$stmt2->prepare($query2);
	$stmt2->bind_param('s', $galerieUpdateId);
	$stmt2->execute();
	$stmt2->bind_result($rubrikyIdx, $title, $perex, $href, $howOpen, $img);

	while ($stmt2->fetch()) {
		$rubrikyIdx;
		$title;
		$perex;
		$href;
		$howOpen;
		$img;
	}
}






if (isset($_POST["galerieSubmit"])) {
	$id = $_POST["id"];
	$title = $_POST["title"];
	$rubrikyId = $_POST["rubrikyId"];
	$perex = $_POST["perex"];
	$href = $_POST["href"];
	$howOpen = $_POST["howOpen"];
	$img = $_POST["img"];


	// Vlož do databáze proměnné z formuláře
	$query = "UPDATE galerie SET rubrikyId=?,title=?,perex=?,href=?,howOpen=?,img=? WHERE id=?";

	$stmt = $conn->stmt_init();
	$stmt->prepare($query);
	$stmt->bind_param('issssss', $rubrikyId, $title, $perex, $href, $howOpen, $img, $id);

	if ($stmt->execute()) {
		header("Location: " . BASE_URL . GALERIE_VYPIS . ".php?odeslano=vytvorena" . "&galerieUpdateId=" . $id);
		$stmt->close();
		$conn->close();
		exit;
	} else {
		die('Chyba : (' . $mysqli->errno . ') ' . $mysqli->error);
	}




	// KONTROLA ZADÁVÁNÍ    


	// není-li prázdné pole
	if (empty($rubrikyId)) {
		header("Location: " . BASE_URL . namePage()  . ".php?error=prazdne");
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
					<h1 class="app-page-title mb-0">Upravit záznam</h1>





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
											<form action="galerieUpdate.php" method="post" class="form-signup">



												<?php




												// GET ODESLÁNO
												if (isset($_GET["odeslano"])) {

													// Hláška z GET - účet vytvořen
													if ($_GET["odeslano"] == "zapsano") {
														echo '<p class="btn btn-warning">
													
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
															
															Galerie byla upravena</p>';
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

													<label for="setting-input-1" class="form-label">Rubrika</label>


													<select type="select" name="rubrikyId" class="form-control">

														<option value="<?php echo $rubrikyIdx; ?>"><?php echo "id" . $rubrikyIdx . " - " . $title ?></option>
														<?php

														/*
 JOIN galerie ON rubriky.id = rubrikyId WHERE rubrikyId = galerieUpdateId
														*/
														$query2 = "SELECT id, title FROM rubriky ORDER BY id DESC";
														$stmt2 = $conn->stmt_init();
														$stmt2->prepare($query2);
														$stmt2->execute();
														$stmt2->bind_result($id, $title);

														while ($stmt2->fetch()) {
														?>


															<option value="<?php echo $id; ?>"><?php echo "id" . $id . " - " . $title; ?></option>

														<?php 	}  ?>


													</select>
												</div>






												<div class="mb-3">

													<?php


													$query2 = "SELECT rubrikyId,title,perex,href,howOpen,img FROM galerie WHERE id = ?";
													$stmt2 = $conn->stmt_init();
													$stmt2->prepare($query2);
													$stmt2->bind_param('i', $galerieUpdateId);
													$stmt2->execute();
													$stmt2->bind_result($rubrikyIdx, $title, $perex, $href, $howOpen, $img);





													while ($stmt2->fetch()) {
														$rubrikyIdx;
														$title;
														$perex;
														$href;
														$howOpen;
														$img;
													}



													?>

													<input type="hidden" name="id" class="form-control" placeholder="<?php echo $galerieUpdateId; ?>" value="<?php echo $galerieUpdateId;  ?>">
													<label for="setting-input-1" class="form-label">Nadpis</label>
													<input type="text" name="title" class="form-control" placeholder="<?php echo $title ?>" value="<?php echo $title ?>">
												</div>




												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Perex</label>
													<input type="text" name="perex" class="form-control" placeholder="<?php echo $perex ?>" value="<?php echo $perex ?>">

												</div>
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Odkaz na obrázek</label>
													<input type="text" name="img" class="form-control" placeholder="<?php echo $img ?>" value="<?php echo $img ?>">
												</div>
												<div class="mb-3">
													<label for="setting-input-1" class="form-label">Cesta odkazu</label>
													<input type="text" name="href" class="form-control" placeholder="<?php echo $href ?>" value="<?php echo $href ?>">
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

											<button type="submit" name="galerieSubmit" class="btn app-btn-primary">Upravit galerii</button>
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