<?php
function getDatabaseConnection($dbname='quotes') {
    // cloud9
    $host = 'localhost';
    $username = 'maliking';
    $password = '';

    // // Heroku Connection
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) { // if the server starts with making-cst352.herokuapp.com, run
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $server = $url["us-cdbr-iron-east-05.cleardb.net"];
        $username = $url["b7506be644b2df"];
        $password = $url["506d2632bfcd11c"];
        $db = substr($url["heroku_ead1f57be8a54a6"], 1);
    }

    $conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}
?>