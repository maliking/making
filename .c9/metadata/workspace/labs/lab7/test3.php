{"filter":false,"title":"test3.php","tooltip":"/labs/lab7/test3.php","undoManager":{"mark":6,"position":6,"stack":[[{"start":{"row":0,"column":0},"end":{"row":55,"column":2},"action":"insert","lines":["<?php","session_start(); //starts or resumes an existing session","","","//print_r($_POST); //displays values passed from login form","","//validates the username and password","include '../../dbConnection.php';","$conn = getDatabaseConnection();","","$username = $_POST['username'];","$password = sha1($_POST['password']);","","//echo $password;","","","//Following SQL works but it allows SQL Injection!!","// $sql = \"SELECT *","//         FROM q_admin","//         WHERE username = '$username' ","//         AND   password = '$password'\";","        ","$sql = \"SELECT *","        FROM q_admin","        WHERE username = :username ","        AND   password = :password\";   ","","$namedParameters  = array();","$namedParameters[':username']  = $username;","$namedParameters[':password']  = $password;","","$stmt = $conn->prepare($sql);","$stmt->execute($namedParameters);","$record = $stmt->fetch(PDO::FETCH_ASSOC);","","//print_r($record);","","if (empty($record)) {","    ","  echo \"Wrong credentials!\";  ","  ","} else {","    ","    $_SESSION['username'] = $record['username'];","    $_SESSION['adminFullName'] = $record['firstName'] . \" \" . $record['lastName'];","   // echo $_SESSION['adminFullName'];","   //echo \"Successful login!\";","   header('Location: admin.php'); //redirects users to admin page","   ","}","","","","","","?>"],"id":1}],[{"start":{"row":19,"column":39},"end":{"row":19,"column":40},"action":"remove","lines":[" "],"id":2},{"start":{"row":21,"column":0},"end":{"row":21,"column":8},"action":"remove","lines":["        "]},{"start":{"row":24,"column":34},"end":{"row":24,"column":35},"action":"remove","lines":[" "]},{"start":{"row":25,"column":36},"end":{"row":25,"column":39},"action":"remove","lines":["   "]},{"start":{"row":38,"column":0},"end":{"row":38,"column":4},"action":"remove","lines":["    "]},{"start":{"row":39,"column":28},"end":{"row":39,"column":30},"action":"remove","lines":["  "]},{"start":{"row":40,"column":0},"end":{"row":40,"column":2},"action":"remove","lines":["  "]},{"start":{"row":42,"column":0},"end":{"row":42,"column":4},"action":"remove","lines":["    "]},{"start":{"row":48,"column":0},"end":{"row":48,"column":3},"action":"remove","lines":["   "]}],[{"start":{"row":0,"column":0},"end":{"row":55,"column":2},"action":"remove","lines":["<?php","session_start(); //starts or resumes an existing session","","","//print_r($_POST); //displays values passed from login form","","//validates the username and password","include '../../dbConnection.php';","$conn = getDatabaseConnection();","","$username = $_POST['username'];","$password = sha1($_POST['password']);","","//echo $password;","","","//Following SQL works but it allows SQL Injection!!","// $sql = \"SELECT *","//         FROM q_admin","//         WHERE username = '$username'","//         AND   password = '$password'\";","","$sql = \"SELECT *","        FROM q_admin","        WHERE username = :username","        AND   password = :password\";","","$namedParameters  = array();","$namedParameters[':username']  = $username;","$namedParameters[':password']  = $password;","","$stmt = $conn->prepare($sql);","$stmt->execute($namedParameters);","$record = $stmt->fetch(PDO::FETCH_ASSOC);","","//print_r($record);","","if (empty($record)) {","","  echo \"Wrong credentials!\";","","} else {","","    $_SESSION['username'] = $record['username'];","    $_SESSION['adminFullName'] = $record['firstName'] . \" \" . $record['lastName'];","   // echo $_SESSION['adminFullName'];","   //echo \"Successful login!\";","   header('Location: admin.php'); //redirects users to admin page","","}","","","","","","?>"],"id":3},{"start":{"row":0,"column":0},"end":{"row":55,"column":7},"action":"insert","lines":["<?php","session_start();","","//print_r($_SESSION);","","if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in","    ","    header(\"Location: index.php\"); //redirects users to login page","    exit;","    ","}","","function authorList(){","    include '../../dbConnection.php';","    $conn = getDatabaseConnection();","    $sql = \"SELECT *","            FROM q_author","            ORDER BY lastName\";","    $stmt = $conn->prepare($sql);","    $stmt->execute();","    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);","    return $records;","}","","?>","<!DOCTYPE html>","<html>","    <head>","        <title> Admin Section  </title>","    </head>","    <body>","","        <h1> ADMIN SECTION</h1>","        <h2> Welcome <?=$_SESSION[adminFullName]?>!</h2>","","<br ><br >","","<form action=\"addAuthor.php\">","    <input type=\"submit\" value=\"Add New Author\" />","</form>","","","        <?php ","        ","        $authors =authorList();","        ","        foreach($authors as $author) {","            ","            echo $author['firstName'] . \"  \" . $author['lastName'] . \" \" . $author['country'] . \"<br>\";","        }","        ","        ","        ?>","","    </body>","</html>"]}],[{"start":{"row":6,"column":0},"end":{"row":6,"column":4},"action":"remove","lines":["    "],"id":4},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"remove","lines":["    "]},{"start":{"row":42,"column":13},"end":{"row":42,"column":14},"action":"remove","lines":[" "]},{"start":{"row":43,"column":0},"end":{"row":43,"column":8},"action":"remove","lines":["        "]},{"start":{"row":45,"column":0},"end":{"row":45,"column":8},"action":"remove","lines":["        "]},{"start":{"row":47,"column":0},"end":{"row":47,"column":12},"action":"remove","lines":["            "]},{"start":{"row":50,"column":0},"end":{"row":50,"column":8},"action":"remove","lines":["        "]},{"start":{"row":51,"column":0},"end":{"row":51,"column":8},"action":"remove","lines":["        "]}],[{"start":{"row":0,"column":0},"end":{"row":45,"column":0},"action":"remove","lines":["<?php","session_start();","","//print_r($_SESSION);","","if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in","","    header(\"Location: index.php\"); //redirects users to login page","    exit;","","}","","function authorList(){","    include '../../dbConnection.php';","    $conn = getDatabaseConnection();","    $sql = \"SELECT *","            FROM q_author","            ORDER BY lastName\";","    $stmt = $conn->prepare($sql);","    $stmt->execute();","    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);","    return $records;","}","","?>","<!DOCTYPE html>","<html>","    <head>","        <title> Admin Section  </title>","    </head>","    <body>","","        <h1> ADMIN SECTION</h1>","        <h2> Welcome <?=$_SESSION[adminFullName]?>!</h2>","","<br ><br >","","<form action=\"addAuthor.php\">","    <input type=\"submit\" value=\"Add New Author\" />","</form>","","","        <?php","","        $authors =authorList();",""],"id":5},{"start":{"row":0,"column":0},"end":{"row":51,"column":7},"action":"insert","lines":["<?php",""," "," if (isset($_GET['addForm'])) { //checks if form was submitted","     ","     //echo \"Form was submitted!\";","     INSERT INTO `q_author` (`authorId`, `firstName`, `lastName`, `gender`, `dob`, `dod`, `profession`, `country`, `picture`, `biography`) VALUES (NULL, 'a', 'a', 'm', '2017-10-01', '2017-10-02', 'a', 'a', 'a', 'a');","     $sql = ","     "," }","","","?>","","<!DOCTYPE html>","<html>","    <head>","        <title> Adding New Author</title>","    </head>","    <body>","","        <h1> Add New Author </h1>","        ","        <fieldset>","            ","            <legend> Adding New Author </legend>","            ","            <form>","                ","                First Name: <input type=\"text\" name=\"firstName\"/> <br />","                Last Name: <input type=\"text\" name=\"lastName\"/> <br />","                Gender: <input type=\"radio\" name=\"gender\" value=\"F\"","                            id=\"genderF\"/><label for=\"genderF\"></label>Female","                         <input type=\"radio\" name=\"gender\" value=\"M\"","                            id=\"genderM\"/><label for=\"genderF\"></label>Male <br />   ","                Birth Date: <input type=\"date\" name=\"dob\"/><br /> ","                Death Date: <input type=\"date\" name=\"dob\"/><br /> ","                Profession: <input type=\"text\" name=\"profession\"/><br /> ","                Country: <select name=\"country\">","                            <option>USA</option>","                            <option>Germany</option>","                            <option>China</option>","                            <option>India</option>","                        </select><br /> ","                Picture URL: <input type=\"text\" name=\"picture\"/>   <br>","                Biography: <br /> <textarea name=\"biography\" cols=\"55\" rows=\"5\"></textarea><br>","                <input type=\"submit\" value=\"Add Author\" name=\"addForm\">","            </form>","            ","        </fieldset>","    </body>","</html>"]}],[{"start":{"row":0,"column":0},"end":{"row":61,"column":7},"action":"remove","lines":["<?php",""," "," if (isset($_GET['addForm'])) { //checks if form was submitted","     ","     //echo \"Form was submitted!\";","     INSERT INTO `q_author` (`authorId`, `firstName`, `lastName`, `gender`, `dob`, `dod`, `profession`, `country`, `picture`, `biography`) VALUES (NULL, 'a', 'a', 'm', '2017-10-01', '2017-10-02', 'a', 'a', 'a', 'a');","     $sql = ","     "," }","","","?>","","<!DOCTYPE html>","<html>","    <head>","        <title> Adding New Author</title>","    </head>","    <body>","","        <h1> Add New Author </h1>","        ","        <fieldset>","            ","            <legend> Adding New Author </legend>","            ","            <form>","                ","                First Name: <input type=\"text\" name=\"firstName\"/> <br />","                Last Name: <input type=\"text\" name=\"lastName\"/> <br />","                Gender: <input type=\"radio\" name=\"gender\" value=\"F\"","                            id=\"genderF\"/><label for=\"genderF\"></label>Female","                         <input type=\"radio\" name=\"gender\" value=\"M\"","                            id=\"genderM\"/><label for=\"genderF\"></label>Male <br />   ","                Birth Date: <input type=\"date\" name=\"dob\"/><br /> ","                Death Date: <input type=\"date\" name=\"dob\"/><br /> ","                Profession: <input type=\"text\" name=\"profession\"/><br /> ","                Country: <select name=\"country\">","                            <option>USA</option>","                            <option>Germany</option>","                            <option>China</option>","                            <option>India</option>","                        </select><br /> ","                Picture URL: <input type=\"text\" name=\"picture\"/>   <br>","                Biography: <br /> <textarea name=\"biography\" cols=\"55\" rows=\"5\"></textarea><br>","                <input type=\"submit\" value=\"Add Author\" name=\"addForm\">","            </form>","            ","        </fieldset>","    </body>","</html>","        foreach($authors as $author) {","","            echo $author['firstName'] . \"  \" . $author['lastName'] . \" \" . $author['country'] . \"<br>\";","        }","","","        ?>","","    </body>","</html>"],"id":6},{"start":{"row":0,"column":0},"end":{"row":51,"column":7},"action":"insert","lines":["<?php",""," "," if (isset($_GET['addForm'])) { //checks if form was submitted","     ","     //echo \"Form was submitted!\";","     INSERT INTO `q_author` (`authorId`, `firstName`, `lastName`, `gender`, `dob`, `dod`, `profession`, `country`, `picture`, `biography`) VALUES (NULL, 'a', 'a', 'm', '2017-10-01', '2017-10-02', 'a', 'a', 'a', 'a');","     $sql = ","     "," }","","","?>","","<!DOCTYPE html>","<html>","    <head>","        <title> Adding New Author</title>","    </head>","    <body>","","        <h1> Add New Author </h1>","        ","        <fieldset>","            ","            <legend> Adding New Author </legend>","            ","            <form>","                ","                First Name: <input type=\"text\" name=\"firstName\"/> <br />","                Last Name: <input type=\"text\" name=\"lastName\"/> <br />","                Gender: <input type=\"radio\" name=\"gender\" value=\"F\"","                            id=\"genderF\"/><label for=\"genderF\"></label>Female","                         <input type=\"radio\" name=\"gender\" value=\"M\"","                            id=\"genderM\"/><label for=\"genderF\"></label>Male <br />   ","                Birth Date: <input type=\"date\" name=\"dob\"/><br /> ","                Death Date: <input type=\"date\" name=\"dob\"/><br /> ","                Profession: <input type=\"text\" name=\"profession\"/><br /> ","                Country: <select name=\"country\">","                            <option>USA</option>","                            <option>Germany</option>","                            <option>China</option>","                            <option>India</option>","                        </select><br /> ","                Picture URL: <input type=\"text\" name=\"picture\"/>   <br>","                Biography: <br /> <textarea name=\"biography\" cols=\"55\" rows=\"5\"></textarea><br>","                <input type=\"submit\" value=\"Add Author\" name=\"addForm\">","            </form>","            ","        </fieldset>","    </body>","</html>"]}],[{"start":{"row":2,"column":0},"end":{"row":2,"column":1},"action":"remove","lines":[" "],"id":7},{"start":{"row":4,"column":0},"end":{"row":4,"column":5},"action":"remove","lines":["     "]},{"start":{"row":7,"column":11},"end":{"row":7,"column":12},"action":"remove","lines":[" "]},{"start":{"row":8,"column":0},"end":{"row":8,"column":5},"action":"remove","lines":["     "]},{"start":{"row":22,"column":0},"end":{"row":22,"column":8},"action":"remove","lines":["        "]},{"start":{"row":24,"column":0},"end":{"row":24,"column":12},"action":"remove","lines":["            "]},{"start":{"row":26,"column":0},"end":{"row":26,"column":12},"action":"remove","lines":["            "]},{"start":{"row":28,"column":0},"end":{"row":28,"column":16},"action":"remove","lines":["                "]},{"start":{"row":34,"column":82},"end":{"row":34,"column":85},"action":"remove","lines":["   "]},{"start":{"row":35,"column":65},"end":{"row":35,"column":66},"action":"remove","lines":[" "]},{"start":{"row":36,"column":65},"end":{"row":36,"column":66},"action":"remove","lines":[" "]},{"start":{"row":37,"column":72},"end":{"row":37,"column":73},"action":"remove","lines":[" "]},{"start":{"row":43,"column":39},"end":{"row":43,"column":40},"action":"remove","lines":[" "]},{"start":{"row":48,"column":0},"end":{"row":48,"column":12},"action":"remove","lines":["            "]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":10,"column":0},"end":{"row":10,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":true,"wrapToView":true},"firstLineState":0},"timestamp":1509041045078,"hash":"d9fe7391a6d5da6d620f9da12c0d1eabc09cb499"}