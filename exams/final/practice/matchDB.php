<?php
include '../../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT username, password, lastLogin, lastLoginStatus
          FROM fp_login
         WHERE username = :username
         AND password = :password";


$np[":username"] = $_POST["username"];
$np[":password"] = sha1($_POST["password"]);

$stmt = $conn -> prepare($sql);
$stmt -> execute($np);
$record = $stmt -> fetch(PDO::FETCH_ASSOC);

echo json_encode($record);
?>