<!DOCTYPE html>
<html>
    <head>
        <title>Mali King CST352</title>
    </head>
    <body>
        <h1>Mali King's CST-352</h1>
        <h3>Homework</h3>
        <ul>
        <?php
        for ($i = 1; $i < 6; $i++) {
            echo "<li>";
            echo "<a href='https://making-cst352.herokuapp.com/hw/hw" . $i . "/index.php'>";
            echo "Homework " . $i . "</a>";
            echo "</li>";
        }
        ?>
        </ul>
        <h3>Labs</h3>
        <ul>
        <?php
        for ($i = 1; $i < 10; $i++) {
            echo "<li>";
            echo "<a href='https://making-cst352.herokuapp.com/labs/lab" . $i . "/index.php'>";
            echo "Lab " . $i . "</a>";
            echo "</li>";
        }
        ?>
        </ul>

    </body>
</html>