<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: loginPage.php");
}

include '../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "DELETE
          FROM products
         WHERE productID = " . $_GET["productID"];

$stmt = $conn -> prepare($sql);
$stmt -> execute();

header("Location: index.php");

?>