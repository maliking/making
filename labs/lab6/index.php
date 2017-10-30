<?php
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();

    function displayCountryOptions() {
        global $conn;
        $sql = "SELECT DISTINCT(country)
                FROM `q_author`
                ORDER BY country";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        foreach ($records as $record) {
            echo "<option ";
            if ($record["country"] == $_GET["country"]) {
                echo "selected";
            }

            echo ">" . $record["country"] . "</option>";
        }
    }

    function displayCategoryOptions() {
        global $conn;
        $sql = "SELECT *
                FROM `q_category`
                ORDER BY category";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        foreach ($records as $record) {
            echo "<option>" . $record["category"] . "</option>";
        }
    }

    function displayQuotes() {
        global $conn;
        $sql = "SELECT firstName, lastName, quote
                FROM q_author
                JOIN q_quote

                WHERE 1";

        $namedParameters = array();

        if (!empty($_GET["content"])) {
            $sql = $sql . " AND quote LIKE :quoteContent";
            $namedParameters[":quoteContent"] = "%" . $_GET["content"] . "%";
        }

        if (isset($_GET["gender"])) {
            $sql = $sql . " AND gender = :gender ";
            $namedParameters[":gender"] = $_GET["gender"];
        }

        if (isset($_GET["orderBy"])) {
            if ($_GET["orderBy"] == "orderByAuthor") {
                $sql = $sql . " ORDER BY lastName";
            } else {
                $sql = $sql . " ORDER BY quote";
            }
         }

         if (isset($_GET["country"])) {
            $sql = $sql . " AND country = :country ";
            $namedParameters[":country"] = $_GET["country"];
         }

         if (isset($_GET["category"])) {
            $sql = $sql . " AND category = :category ";
            $namedParameters[":category"] = $_GET["category"];
         }

        $stmt = $conn -> prepare($sql);
        $stmt -> execute($namedParameters);
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        foreach ($records as $record) {
            echo "<em>\"" . $record["quote"] . "\"</em> -<span class='author-name'>" . $record["firstName"] . " "  . $record["lastName"] . "</span><br>";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6 | Quote Finder</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather|Ubuntu" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-10">
                    <h1>Quote Finder</h1>
                    <form method="get">
                        <strong>Quote Content: </strong>
                        <input type="text" name="content" value="<?=$_GET["content"]?>"><br><br>
                        <strong>Author's Gender: </strong>
                        <input type="radio" name="gender" id="female" value="F"
                        <?php
                            if ($_GET["gender"] == 'F') {
                                echo "checked";
                            }
                        ?>
                        >

                        <label for="female">Female</label>
                        <input type="radio" name="gender" id="male" value="M"

                        <?php
                            if ($_GET["gender"] == 'M') {
                                echo "checked";
                            }
                        ?>
                        >

                        <label for="male">Male</label><br><br>
                        <strong>Author's Birthplace: </strong>
                        <select name="country">
                            <option value="">Select a Country</option>
                            <?=displayCountryOptions()?>
                        </select>
                        <br>
                        <br>
                        <strong>Category: </strong>
                        <select name="category">
                            <option value="">Select a Category</option>
                            <?=displayCategoryOptions()?>
                        </select>
                        <br>
                        <br>

                        <strong>Order by: </strong>
                        <input type="radio" name="orderBy" id="orderByAuthor" value="orderByAuthor">
                        <label for="orderByAuthor">Author</label>
                        <input type="radio" name="orderBy" id="orderByQuote" value="orderByQuote">
                        <label for="orderByQuote">Quote</label>
                        <br>
                        <br>
                        <input type="submit" value="Filter" name="submit">
                        <input type="reset" value="Reset">

                    </form>

                    <hr>
                    <div class="quotes">
                        <?=displayQuotes()?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>