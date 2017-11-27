<?php
session_start();

// if (!isset($_SESSION["username"])) {
//     header("Location: index.php");
//     exit;
// }

function productList() {
    include "../dbConnection.php";
    $conn = getDatabaseConnection($dbname="sole_mates");
    $sql = "SELECT *
            FROM products
            ORDER BY productName";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="footable/css/footable.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">

    <style>
        body {
            font-family: 'Cabin', sans-serif;
        }
        th {
            text-align: center;
        }

        .brand {
            max-height: 30px;
            max-width: 70px;
        }
    </style>
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
                <div class="col-xs-8 col-xs-offset-2 text-center">
                    <h1>Sole Mates Inventory</h1>
                    <hr>
                    <table class="table" data-filtering="true">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th># in Stock</th>
                        </tr>
                        </thead>

                        <?php
                        $shoes = productList();
                        foreach ($shoes as $shoe) {
                            echo "<tr>";
                            echo "<td><img src='" . $shoe["img"] . "'></td>";
                            echo "<td>" . $shoe["productName"] . "<br><img class=\"brand\" src=\"img/" . $shoe["brand"] . ".jpg\"></td>";
                            echo "<td>" . "category" . "</td>";
                            echo "<td>" . $shoe["price"] . "</td>";
                            echo "<td>" . $shoe["quantity"] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript" src="footable/js/footable.min.js"></script>
        <script>
        /* global $ jQuery */
        jQuery(function($){
        	$('.table').footable({
        		"sorting": {
        			"enabled": true
        		},
        		"paging": {
        		    "enabled": true
        		}
        	});
        });
        </script>
    </body>
</html>
