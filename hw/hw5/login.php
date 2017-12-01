<?php
session_start();
include '../../dbConnection.php';
$conn = getDatabaseConnection();

$username = $_POST["username"];
$password = sha1($_POST["password"]);

$sql = "SELECT *
        FROM games
        WHERE username = :username
        AND password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$stmt = $conn -> prepare($sql);
$stmt -> execute($namedParameters);
$record = $stmt -> fetch(PDO::FETCH_ASSOC);

if (empty($record)) {
    echo "Wrong credentials!";
} else {
    $_SESSION["username"] = $record["username"];
    header('Location: quiz.php');
}

?>