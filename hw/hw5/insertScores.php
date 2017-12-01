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
            echo "Average: " . $record["AVG(score)"] . " <br> " . $record["COUNT(username)"];
        }
    }

    getAvg();

    if (isset($_GET["points"])) {
        $points = $_GET["points"];
        // echo $points;
    } else {
        echo "not set";
    }

    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        // echo $_SESSION["userId"];
    } else {
        echo "username not set";
    }

    $sql = "INSERT INTO games(username, score)
            VALUES ($username, $points)";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();


    echo json_encode($record);
?>

