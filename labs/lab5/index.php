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
    echo "<div id='author'>- " . "<a target='authorInfo' href='getAuthorInfo.php?authorId="
        . $record['authorId'] . "'><h2>" . $record['firstName']
        . " " . $record['lastName'] . "</h2></a></div>";
}

?>

<html>
    <head>
        <title> Lab 5 | Mali King </title>
    </head>
    <link rel="stylesheet" href="css/style.css">

    <style>

    </style>
    <body>
    <div class="wrapper">
        <h1 id="title">Quote Generator</h1>
        <?=getRandomQuote()?>
        <br>
        <iframe name="authorInfo" width="600" height="400"></iframe>
    </div>
    </body>
</html>