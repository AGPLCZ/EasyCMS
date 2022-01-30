<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8" />
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        Vyberte soubor: <input name="soubor" type="file" />
        <input type="submit" value=" Odeslat " />
    </form>
</body>

</html>