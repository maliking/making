<?php
// start or resume a session
session_start();

// validate username and password
include '../../../dbConnection.php';
$conn = getDatabaseConnection();

$username = $_POST["username"];
$password = sha1($_POST["password"]);

$sql = "SELECT *
        FROM   fp_login
        WHERE  username = :username
        AND    password = :password";

$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $conn -> prepare($sql);
$stmt -> execute($np);
$record = $stmt -> fetch(PDO::FETCH_ASSOC);

if (empty($record)) {
    header('Location: program1.php');
    echo "Wrong credentials";
} else {
    $sql = "UPDATE fp_login
            SET lastLogin = CURRENT_TIMESTAMP
            WHERE username = :username";

    $np = array();
    $np[':username'] = $record["username"];
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);

    $_SESSION["username"] = $record["username"];
    header('Location: welcome.php'); // redirects to admin page
}

?>