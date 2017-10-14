<?php
include '../../dbConnection.php';
$dbConn = getDatabaseConnection();

function getRandomQuote () {
    global $dbConn;
    $sql = "SELECT quoteId FROM q_quote";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll();
    $randomIndex = array_rand($records);
    $quoteId = $records[$randomIndex]['quoteId'];
    $sql = "SELECT quote, firstName, lastName, authorId
            FROM q_quote
            NATURAL JOIN q_author
            WHERE quoteId = $quoteId";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $record = $stmt -> fetch();

    echo "<em>" . $record['quote'] . "</em><br>";
    echo "<a target='authorInfo' href='getAuthorInfo.php?authorId=" . $record['authorId'] . "'>-" . $record['firstName'] . " " . $record['lastname'] . "</a>";

}
// $connection = mysql_connect($servername, $username, $password);
// if (!$connection) {
//     die("Unable to connect to MySQL: " . mysql_error());
// }

// mysql_select_db($dbname)
//     or die("Unable to select database: " . mysql_error());

// $query = "SELECT quote, firstName, lastName FROM q_quote INNER JOIN q_author ON q_quote.authorId=q_author.authorId ORDER BY rand()";
// $result = mysql_query($query);
// if (!$result) die ("Database access failed: " . mysql_error());

// $row = mysql_fetch_assoc($result);
// echo $row['quote'] . "<br>";
// echo "- <a href='#'>" . $row['firstName'] . " " . $row['lastName'] . "</a>";

?>

<html>
    <head>
        <title> Lab 5 | Mali King </title>
    </head>
    <style>

    </style>
    <body>


    </body>
</html>