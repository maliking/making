<?php
include '../../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT
            date_format(lastLogin, '%m/%d/%y %h:%m%p') AS dateTime,
            lastLoginStatus
          FROM fp_login
         WHERE username = :username";

$np = array();
$np[":username"] = $_GET["username"];

$stmt = $conn -> prepare($sql);
$stmt -> execute($np);

$record = $stmt -> fetch(PDO::FETCH_ASSOC);
echo json_encode($record);

?>