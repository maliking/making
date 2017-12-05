<?php
include '../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT productName
          FROM products
         WHERE productName = :productName";

$stmt = $conn -> prepare($sql);
$stmt -> execute(array( ":productName" => $_GET["productName"] ));
$record = $stmt -> fetch(PDO::FETCH_ASSOC);

print_r($record);
?>