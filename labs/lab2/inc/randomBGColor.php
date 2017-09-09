<!DOCTYPE html>
<html>
    <head>
        <title> Random BG </title>
        <meta charset="utf-8"/>
        <style>
        body {
            <?php
                $red = rand(0, 255);
                $green = rand(0, 255);
                $blue = rand(0, 255);
                $alpha = rand(0, 10) / 10;
                echo "background-color: rgba(" . $red . "," . $green . "," . $blue . "," . $alpha . ")";
            ?>
        }
        h1 {
            <?php
                $red = rand(0, 255);
                $green = rand(0, 255);
                $blue = rand(0, 255);
                $alpha = rand(0, 10) / 10;
                echo "color: rgba(" . $red . "," . $green . "," . $blue . "," . $alpha . ")";
            ?>
        }
        </style>

    </head>
    <body>
        <h1>Hello, Welcome</h1>



    </body>
</html>

