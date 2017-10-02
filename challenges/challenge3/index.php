<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Chinese Zodiac Lists</title>
    </head>
    <body>
        <h1>Chinese Zodiac Lists</h1>
        <ul>
            <?php
            $yearSum = yearList(1500, 2000);
            ?>


            <?php

            $sum = 0;
            $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
            function yearList($startYear, $endYear) {
                for ($i = $startYear ; $i <= $endYear ; $i++) {
                    echo "<li>";
                    echo "Year " . $i;
                    if ($i == 1776) {
                        echo " <b>USA INDEPENDENCE!</b>";
                    } else if ($i % 100 == 0) {
                        echo " <b>Happy New Century!</b>";
                    }

                    echo "<img src='zodiac/$zodiac[$i]'>";

                    echo "</li>";
                    $sum = $sum + $i;
                }
                return $sum;

            }
            ?>
        </ul>
        <h1>Year Sum: <?=$yearSum?></h1>
    </body>
</html>

