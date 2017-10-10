<?php
    if (isset($_GET["animal"])) {
        $backgroundImage = "img/" . $_GET['animal'] . ".jpg";
    } else {
        $backgroundImage = "img/dog.jpg";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> HW3 | Monterey Adoptable Pet Search </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC|Lato|Patua+One" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <style>
            body {
                background-image: url("<?=$backgroundImage?>");
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <form method="GET" class="form-horizontal">
                <h2>The Monterey County</h2><h1>Adoptable Pet Search</h1>
                <div class="col-xs-12 col-lg-4 col-lg-offset-4">
                    <div class="form-group">
                        <select name="animal" class="form-control">
                            <option selected="true" disabled="disabled">- Select an Animal Type -</option>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                            <option value="horse">Horse</option>
                            <option value="bird">Bird</option>
                            <option value="reptile">Reptile</option>
                            <option value="smallfurry">Small Furry</option>
                            <option value="barnyard">Barnyard</option>
                        </select>
                    </div>
                </div>
            </div> <!-- end dropdown row -->
            <div class="row">
                <div class="col-xs-12 col-lg-4 col-lg-offset-4 top">
                    <h5>Gender</h5>
                    <div class="form-group text-center">
                        <div class="radio-inline">
                            <label><input type="radio" name="sex" value="M">Male</label>
                        </div>
                        <div class="radio-inline">
                            <label><input type="radio" name="sex" value="F">Female</label>
                        </div>
                    </div>
                </div>
            </div> <!-- end gender row -->
            <div class="row">
                <div class="col-xs-12 col-lg-4 col-lg-offset-4 bottom">
                    <h5>Animal Size</h5>
                    <div class="form-group text-center">
                        <div class="radio-inline">
                            <label><input type="radio" name="size" value="S">Small</label>
                        </div>
                        <div class="radio-inline">
                            <label><input type="radio" name="size" value="M">Medium</label>
                        </div>
                        <div class="radio-inline">
                            <label><input type="radio" name="size" value="L">Large</label>
                        </div>
                        <div class="radio-inline">
                            <label><input type="radio" name="size" value="XL">X-Large</label>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-xs-12 col-lg-4 col-lg-offset-4">
                        <input type="submit" class="btn btn-warning btn-block" value="Submit">
                    </div>
                    <div class="col-xs-12 col-lg-4 col-lg-offset-4">
                        <input type="reset" class="btn btn-default btn-block" value="Reset">
                    </div>
                </div>
                 </form>
        </div> <!-- end container -->

    <div class="container-fluid" id="pets_container">
        <?php
            if (isset($_GET["animal"])) { // if form submitted, continue
                $animal = $_GET["animal"];

                include 'api/petfinderAPI.php';

                $pets = getImageURLs($animal, $_GET["age"], $_GET["size"], $_GET["sex"]);

                foreach($pets as $value){
                    echo "<div class='row pet_row'>";
                        echo "<div class='col-lg-6 col-lg-offset-3 pet_column'>";
                            echo "<div class='col-lg-2'>";
                                echo "<a href='" . $value['url'] . "'><img class='pet_image' src='". $value['img_url'] . "'></a>";
                            echo "</div>"; // col-lg-2
                            echo "<div class='col-lg-10'>";
                                echo "<a href='" . $value['url'] . "'><h4>" . $value['name'] . "</h4></a>";
                                echo "<h5>Age: " . $value['age'] . "</h5>";
                                if ($value['sex'] == "F") {
                                    echo "<h5 class='female'>Gender: Female</h5>";
                                } else if ($value['sex'] == "M") {
                                    echo "<h5 class='male'>Gender: Male</h5>";
                                }
                                switch ($value["size"]) {
                                    case 'S':
                                        echo "<h5>Size: Small</h5>";
                                        break;
                                    case 'M':
                                        echo "<h5>Size: Medium</h5>";
                                        break;
                                    case 'L':
                                        echo "<h5>Size: Large</h5>";
                                        break;
                                    case 'XL':
                                        echo "<h5>Size: X-Large</h5>";
                                        break;
                                }

                                echo "<p>";
                                echo $value['description'];
                                echo "</p>";
                            echo "</div>"; // col-lg-10
                        echo "</div>"; // col-lg-6 col-lg-offset-3 pet_column
                    echo "</div>"; // row pet_row
                }
            } else {  // if the form has not been submitted, echo the directions
                echo "<h1> Please select an animal type to begin!</h1>";
            }
        ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>