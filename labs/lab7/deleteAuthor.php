<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();
$sql = "DELETE FROM q_author
        WHERE authorId = " . $_GET["authorId"];
$stmt = $conn -> prepare($sql);
$stmt -> execute();

header("Location: admin.php");

?>