<?php
if (isset($_GET["keyword"])) {

    $imageURLs = getImageURLs($_GET['keyword'], $_GET['orientation']);
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
}
if (empty($_GET["keyword"]) || !isset($imageURLs)) {
    echo "<h2>Enter a keyword or select a preset to find an image";
}


for ($i = 0 ; $i < 7 ; $i++) {
    echo "<div class='item ";
    echo ($i == 0)?"active":"";
    echo "'>";

    do {
        $randomIndex = rand(0, count($imageURLs));
    }
    while (!isset($imageURLs[$randomIndex]));

    echo "<img src='" . $imageURLs[$randomIndex] . "'>";
    echo "</div>";
    unset($imageURLs[$randomIndex]);
}