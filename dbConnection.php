<?php
function getDatabaseConnection($dbname='quotes') {
    // cloud9
    $host = 'localhost';
    $dbname = 'quotes';
    $username = 'maliking';
    $password = '';

    // Heroku Connection
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) { // if the server starts with making-cst352.herokuapp.com, run
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $server = $url["us-cdbr-iron-east-05.cleardb.net"];
        $username = $url["b7506be644b2df"];
        $password = $url["b8b7b36d"];
        $db = substr($url["heroku_ead1f57be8a54a6"], 1);
    }

    $dbConn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}
?>