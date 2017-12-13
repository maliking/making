<?php
session_start();
include '../../../../dbConnection.php';
$conn = getDatabaseConnection();

    // function getLastScore() {
    //     global $conn, $np;
    //     $sql = "SELECT email, lastScore, COUNT(attempts) AS numAttempts
    //             FROM users
    //             WHERE email = :email";

    //     $np[":email"] = $_GET["email"];

    //     $stmt = $conn -> prepare($sql);
    //     $stmt -> execute($np);

    //     $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    //     foreach ($records as $record) {
    //         echo "Number of Attempts: " . $record["numAttempts"];
    //     }
    // }

    // getLastScore();

    $sql = "UPDATE users
            SET attempts = attempts + 1, lastScore = :lastScore
            WHERE email = :email;
            SELECT lastScore
            FROM users
            WHERE email = :email;";

    $np = array();
    $np[":email"] = $_GET["email"];
    $np[":lastScore"] = $_GET["lastScore"];

    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    echo json_encode($record);
?>

