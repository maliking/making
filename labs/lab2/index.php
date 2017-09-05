<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
            $symbol = "grapes";
            $randomNumber = rand(0,2);

            if ($randomNumber == 0) {
                $symbol = "cherry";
            }
            else if ($randomNumber == 1) {
                $symbol = "seven";
            }
            else {
                $symbol = "lemon";
            }

            echo "<img src='img/$symbol.png' alt=$symbol title=$symbol width='70' />";
        ?>

    </body>
</html>