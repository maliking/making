<?php
    function displayImages() {
        $folder = "gallery/";
        $results = scandir($folder, 1);

        foreach ($results as $result) {
            if ($results === '.' || $results === '..') {
                continue;
            }
            if (is_file($folder . $result)) {
                echo
                '<div class="col-md-1">
                    <div class="thumbnail">
                        <a href=' . $folder . $result . '><img src="' . $folder . $result.'" alt="image"></a>
                    </div>
                </div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: File Upload </title>
        <meta charset="utf-8" />
        <script src="../../bootstrap/js/jquery.min.js"></script>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-filestyle.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Lato" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
            <h1> <img id="camera" src='img/camera.png'>Photo Gallery </h1>
            <h4> Upload your images here! </h4>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                Upload file:
                <input type="file" name="image"/>
                <input class="btn btn-success btn-block" type="submit" name="submitForm" value="Upload!" />
            </form>
            </div>
        </div>
        <div class="row">
        <?=displayImages()?>
        </div>
    </div>

    <div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <p class="navbar-text">© 2017 - Mali King </p>
        </div>
    </div>

    <script>
        $(":file").filestyle();
    </script>
    </body>
</html>
