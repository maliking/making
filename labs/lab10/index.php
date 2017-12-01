<?php

function checkSize() {
    $size = filesize("gallery/" . $file);

    if ($size > 1048576) {
        echo "image is a good size";
    } else {
        echo "image is too big";
    }
}
function displayImages() {
    if (isset($_POST['submitForm'])) { //checks whether the form has been submitted
        move_uploaded_file($_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name'] );
        $files = scandir("gallery/", 1);

        for ($i = 0; $i < count($files)-2; $i++) {
          echo "<a href='gallery/" . $files[$i] . "'><img src='gallery/".  $files[$i] . "' width='35' ></a> <br />";
        }
    } //endIf
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 10: File Upload </title>
        <meta charset="utf-8" />
        <script src="../../bootstrap/js/jquery.min.js"></script>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>


    <h1> Photo Gallery </h1>

    <form action="upload.php" method="POST" enctype="multipart/form-data">

        Upload file:

        <input type="file" name="myFile"/>

        <input type="submit" name="submitForm" value="Upload!" />

    </form>

    <br />

    <?=displayImages()?>


    </body>
</html>
