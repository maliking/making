<?php
session_start();
include '../dbConnection.php';
$conn = getDatabaseConnection();

$username = $_POST["username"];
$password = sha1($_POST["password"]);
echo $password;

$sql = "SELECT *
          FROM accounts
         WHERE username = :username
           AND password = :password";

$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $conn -> prepare($sql);
$stmt -> execute($np);
$record = $stmt -> fetch(PDO::FETCH_ASSOC);

if (empty($record)) {
    echo "Wrong credentials!";

} else {
    $_SESSION["username"] = $record["username"];
    $_SESSION["userType"] = $record["userType"];
    $_SESSION["adminFullName"] = $record["firstName"] . " " . $record["lastName"];
    header('Location: index.php');
}

?>