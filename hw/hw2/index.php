<?php
    include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Build-a-Bot | Mali King </title>
        <link href="https://fonts.googleapis.com/css?family=Barrio|McLaren" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet"/>
    </head>
    <body>
        <div id="main">
                <h1>Build-a-Bot Machine</h1>
                <?php
                    play();
                ?>
                <form>
                    <input type="submit" value="Click to Build!"  />
                </form>
        </div>
    </body>
</html>

