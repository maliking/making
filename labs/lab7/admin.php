<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

function authorList() {
    include "../../dbConnection.php";
    $conn = getDatabaseConnection();
    $sql = "SELECT *
            FROM q_author
            ORDER BY lastName";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed|Source+Sans+Pro" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
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
                <div class="col-xs-6 col-xs-offset-3 text-center">
                    <h1>Admin Section</h1>
                    <h2>Welcome <?=$_SESSION[adminFullName]?>!</h2>
                    <hr>
                    <form class="form-horizontal" action="addAuthor.php">
                    <div class="form-group">
                        <div class="col-xs-1 col-xs-offset-8">
                            <input class="btn btn-primary" type="submit" value="Add New Author">
                        </div>
                    </div>
                    </form>
                    <br>
                    <table class="table table-striped">
                        <tr>
                            <th>First</th>
                            <th>Last</th>
                            <th>Country</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        $authors = authorList();
                        foreach ($authors as $author) {
                            echo "<tr>";
                            echo "<td>" . $author["firstName"] . "</td>";
                            echo "<td>" . $author["lastName"] . "</td>";
                            echo "<td>" . $author["country"] . "</td>";
                            echo "<td>";
                            echo "<a class='btn btn-warning' href='updateAuthor.php?authorId=" . $author["authorId"] . "'>
                                    <i class='fa fa-pencil'></i></a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a class='btn btn-danger' onClick=\"return confirm('Are you sure you want to delete this author?')\" href='deleteAuthor.php?authorId=" . $author["authorId"] . "'>
                                    <i class='fa fa-trash-o'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>

                </div>
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
</html>