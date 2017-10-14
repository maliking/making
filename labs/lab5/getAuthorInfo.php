<?php
include '../../dbConnection.php';
$dbConn = getDatabaseConnection();

function getAuthorId() {
    global $dbConn;
    $sql = "SELECT * FROM q_author WHERE authorId=" . $_GET['authorId'];
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $record = $stmt -> fetch();
    echo "<img src='" . $record['picture'] . "' alt='" . $record['firstName'] . " " . $record['lastName'] . "'>";
    echo "<p><b>Born: </b>" . $record['dob'] . "<br>";
    echo "<b>Died</b>: ". $record['dod'] . "<br>";
    echo "<b>Gender</b>: ". $record['gender'] . "<br>";
    echo "<b>Profession</b>: ". $record['profession'] . "<br>";
    echo "<b>Country</b>: ". $record['country'] . "</p>";
    echo "<div class='clearfix'></div>";
    echo "<p><b>Biography</b>: ". $record['biography'] . "<br>";
    echo "</p>";
}

?>

<!DOCTYPE html>
<html>
    <head>
            <title>Author Information</title>
            <link rel="stylesheet" href="css/style.css">
            <style>

            </style>
    </head>
    <body>
        <h1>Author Info</h1>
            <?=getAuthorId()?>
    </body>
</html>