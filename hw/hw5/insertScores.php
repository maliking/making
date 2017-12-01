<?php
session_start();
include '../../dbConnection.php';
$conn = getDatabaseConnection();

    function getAvg() {
        global $conn, $np;
        $sql = "SELECT AVG(score), COUNT(username)
                FROM games
                WHERE username = :username";

        $np[":username"] = $_SESSION["username"];

        $stmt = $conn -> prepare($sql);
        $stmt -> execute($np);

        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "Average: " . $record["AVG(score)"] . " <br>Count: " . $record["COUNT(username)"] . "<br>";
        }
    }

    getAvg();

    $sql = "INSERT INTO games(username, score)
            VALUES (:username, :score)";

    $np = array();
    $np[":username"] = $_SESSION["username"];
    $np[":score"] = $_GET["score"];

    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);

    echo json_encode($record);
?>

