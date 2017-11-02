
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
}

if (isset($_GET["authorId"])) {
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();

    function getAuthorInfo() {
        global $conn;

        $sql = "SELECT *
                FROM q_author
                WHERE authorId = " . $_GET["authorId"];

        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $record = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $record;
    }
}


    if (isset($_GET["updateForm"])) {
        $sql = "UPDATE q_author SET
                    firstName = :fName,
                    lastName = :lName,
                    gender = :gender,
                    dob = :dob,
                    dod = :dod,
                    profession = :profession,
                    country = :country,
                    picture = :picture,
                    biography = :biography
                WHERE authorId = :authorId";
        $np = array();
        $np[":fName"] = $_GET["firstName"];
        $np[":lName"] = $_GET["lastName"];
        $np[":gender"] = $_GET["gender"];
        $np[":dob"] = $_GET["dob"];
        $np[":dod"] = $_GET["dod"];
        $np[":profession"] = $_GET["profession"];
        $np[":country"] = $_GET["country"];
        $np[":picture"] = $_GET["picture"];
        $np[":biography"] = $_GET["biography"];
        $np[":authorId"] = $_GET["authorId"];
        $stmt = $conn -> prepare($sql);
        $stmt -> execute($np);
    }

    if (isset($_GET["authorId"])) {
        $authorInfo = getAuthorInfo();
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding New Author</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed|Source+Sans+Pro" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header navbar-left">
                    <p class="navbar-text"><a href="admin.php"><i class="fa fa-long-arrow-left"></i> Go Back</a></p>
                </div>
                <div class="navbar-header navbar-right">
                        <?php
                            if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                                echo "<p class=\"navbar-text\">Signed in as " . $_SESSION[adminFullName] . "</p>";
                                echo "<a class=\"btn btn-default navbar-btn\" href=\"logout.php\">Logout</a>";
                            } else {
                                echo "<a class=\"btn btn-success navbar-btn\" href=\"index.php\">Login</a>";
                            }
                        ?>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <h1>Update Author</h1>
                    <hr>
                        <form class="form-horizontal" onSubmit="return confirm('Author has been updated!')" >
                            <input type="hidden" name="authorId" value="<?=$authorInfo["authorId"]?>">
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="firstName">First Name</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="text" name="firstName" value="<?=$authorInfo["firstName"]?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Last Name</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="text" name="lastName" value="<?=$authorInfo["lastName"]?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="gender">Gender</label>
                                <div class="col-xs-9">
                                    <label class="radio-inline"><input type="radio" name="gender" value="M"
                                    <?=($authorInfo["gender"] == "M") ? " checked":"" ?>
                                    >Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="F"
                                    <?=($authorInfo["gender"] == "F") ? " checked":"" ?>
                                    >Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="dob">Date of Birth</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="date" name="dob" value="<?=$authorInfo["dob"]?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="dod">Date of Death</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="date" name="dod" value="<?=$authorInfo["dod"]?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="profession">Profession</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="text" name="profession" value="<?=$authorInfo["profession"]?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="country">Country</label>
                                <div class="col-xs-9">
                                    <select class="form-control" id="country" name="country">
                                        <option value="">Select a Country</option>
                                        <option value="USA" <?=($authorInfo["country"] == "USA") ? " selected":"" ?>>USA</option>
                                        <option value="Germany" <?=($authorInfo["country"] == "Germany") ? " selected":"" ?>>Germany</option>
                                        <option value="China" <?=($authorInfo["country"] == "China") ? " selected":"" ?>>China</option>
                                        <option value="India" <?=($authorInfo["country"] == "India") ? " selected":"" ?>>India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="picture">Picture URL</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="text" placeholder="http://" name="picture" value="<?=$authorInfo["picture"]?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="biography">Biography</label>
                                <div class="col-xs-9">
                                      <textarea name="biography" class="form-control" rows="5" id="biography"><?=$authorInfo["biography"]?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-1 col-xs-offset-9">
                                    <input class="btn btn-warning" type="submit" value="Update" name="updateForm">
                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
</html>
