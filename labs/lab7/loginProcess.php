<?php
// start or resume a session
session_start();

// validate username and password
include '../../dbConnection.php';
$conn = getDatabaseConnection();

$username = $_POST["username"];
$password = sha1($_POST["password"]);

$sql = "SELECT *
        FROM q_admin
        WHERE username = '$username'
        AND password = '$password'";
$stmt = $conn -> prepare($sql);
$stmt -> execute();
$record = $stmt -> fetch(PDO::FETCH_ASSOC);

if (empty($record)) {
    echo "Wrong credentials!";
} else {
    $_SESSION["username"] = $record["username"];
    $_SESSION["adminFullName"] = $record["firstName"] . " " . $record["lastName"];
    header('Location: admin.php'); // redirects to admin page
}

