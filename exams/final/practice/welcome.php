<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: program1.php");
    exit;
}

echo "<h1>Welcome, " . $_SESSION["username"] . "</h1>";
?>