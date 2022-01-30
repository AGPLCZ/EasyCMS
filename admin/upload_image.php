<?php require "config.php"; ?>

<?php



require "header.php";
?>



<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Upload</h1>
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


                                            <?php
                                            if (isset($_POST["submit"])) {

                                                $target_dir = "../img/blog/";
                                                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                                $uploadOk = 1;
                                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                                // Check if image file is a actual image or fake image
                                                if (isset($_POST["submit"])) {
                                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                                    if ($check !== false) {
                                                        echo "File is an image - " . $check["mime"] . ".";
                                                        $uploadOk = 1;
                                                    } else {
                                                        echo "File is not an image.";
                                                        $uploadOk = 0;
                                                    }
                                                }

                                                // Check if file already exists
                                                if (file_exists($target_file)) {
                                                    echo "Sorry, file already exists.";
                                                    $uploadOk = 0;
                                                }

                                                // Check file size
                                                if ($_FILES["fileToUpload"]["size"] > 50000000) {
                                                    echo "Sorry, your file is too large.";
                                                    $uploadOk = 0;
                                                }

                                                // Allow certain file formats
                                                if (
                                                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                                    && $imageFileType != "gif"
                                                ) {
                                                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                                    $uploadOk = 0;
                                                }

                                                // Check if $uploadOk is set to 0 by an error
                                                if ($uploadOk == 0) {
                                                    echo "Sorry, your file was not uploaded.";
                                                    // if everything is ok, try to upload file
                                                } else {
                                                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                                        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                                                    } else {
                                                        echo "Sorry, there was an error uploading your file.";
                                                    }
                                                }







                                                function load_image($filename, $type)
                                                {
                                                    if ($type == IMAGETYPE_JPEG) {
                                                        $image = imagecreatefromjpeg($filename);
                                                    } elseif ($type == IMAGETYPE_PNG) {
                                                        $image = imagecreatefrompng($filename);
                                                    } elseif ($type == IMAGETYPE_GIF) {
                                                        $image = imagecreatefromgif($filename);
                                                    }
                                                    return $image;
                                                }

                                                function resize_image($new_width, $new_height, $image, $width, $height)
                                                {
                                                    $new_image = imagecreatetruecolor($new_width, $new_height);
                                                    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                                    return $new_image;
                                                }

                                                function resize_image_to_width($new_width, $image, $width, $height)
                                                {
                                                    $ratio = $new_width / $width;
                                                    $new_height = $height * $ratio;
                                                    return resize_image($new_width, $new_height, $image, $width, $height);
                                                }



                                                function save_image($new_image, $new_filename, $new_type = 'jpeg', $quality = 100)
                                                {
                                                    if ($new_type == 'jpeg') {
                                                        imagejpeg($new_image, $new_filename, $quality);
                                                    } elseif ($new_type == 'png') {
                                                        imagepng($new_image, $new_filename);
                                                    } elseif ($new_type == 'gif') {
                                                        imagegif($new_image, $new_filename);
                                                    }
                                                }


                                                $filename = $target_file;
                                                //$filename = "uploads/ja3.jpg";
                                                list($width, $height, $type) = getimagesize($filename);
                                                $old_image = load_image($filename, $type);



                                                $image_width_fixed = resize_image_to_width(800, $old_image, $width, $height);
                                                save_image($image_width_fixed, '../img/blog/sm-' . basename($filename), 'jpeg', 100);
                                            }

                                            ?>



                                            <form action="upload_image.php" method="post" class="form-signup" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="setting-input-1" class="form-label">Fotogalerie</label>



                                                </div>

                                                Vyberte obrázek:
                                                <input type="file" name="fileToUpload" class="btn app-btn-secondary" id="fileToUpload">
                                                <input type="submit" value="Upload Image" class="btn app-btn-primary" name="submit">
                                            </form>




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