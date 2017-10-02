<?php
    if (isset($_GET["keyword"]) ) {
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword'], $_GET['orientation']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    if (empty($_GET["keyword"]) || !isset($imageURLs)) {
        echo "<h2>Enter a keyword or select a preset to find an image";
    }

    for ($i = 0 ; $i < 7 ; $i++) {
        echo "<div class='item";
        if ($i == 0) {
            echo " active'>";
        } else if ($i > 0) {
            echo "'>";
        }
        echo "<img src='$imageURLs[$i]'>";
        echo "</div>";
    }
?>