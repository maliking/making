<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

function authorList() {
    include "../../dbConnection.php";
    $conn = getDatabaseConnection();
    $sql = "SELECT *
            FROM q_author
            ORDER BY lastName";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section </title>
    </head>
    <body>
        <h1>Admin Section</h1>
        <h2>Welcome <?=$_SESSION[adminFullName]?>!</h2>
        <br>
        <form action="addAuthor.php">
            <input type="submit" value="Add New Author">
        </form>
        <?php
            $authors = authorList();
            foreach ($authors as $author) {
                echo $author["firstName"] . " " .
                     $author["lastName"] . " " .
                     $author['country'] . "<br>";
            }
        ?>
    </body>
</html>