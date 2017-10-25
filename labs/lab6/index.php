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
                NATURAL JOIN q_quote
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

        $stmt = $conn -> prepare($sql);
        $stmt -> execute($namedParameters);
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        foreach ($records as $record) {
            echo "<em>" . $record["quote"] . "</em>" . $record["firstName"] . " "  . $record["lastName"] . "<br>";
        }

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6 | Quote Finder</title>
    </head>
    <body>
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

            Order by:
            <input type="radio" name="orderBy" id="orderByAuthor" value="orderByAuthor">
            <label for="orderByAuthor">Author</label>
            <input type="radio" name="orderBy" id="orderByQuote" value="orderByQuote">
            <label for="orderByQuote">Quote</label>
            <br>
            <br>
            <input type="submit" value="Filter" name="submit">
        </form>
        <hr>
        <div class="quotes">
            <?=displayQuotes()?>
        </div>
    </body>
</html>