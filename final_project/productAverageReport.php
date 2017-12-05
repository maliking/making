<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: loginPage.php");
    exit;
}

function productList() {
    include "../dbConnection.php";
    $conn = getDatabaseConnection();
    $sql = "SELECT
                productName,
                ROUND(AVG(orders.quantity)) AS avgNumSold
            FROM
                orders
            INNER JOIN
                products ON products.productID = orders.productID
            GROUP BY productName";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Product Average Report</title>
        <!-- HEADER TEMPLATE BEGIN -->
        <?php include 'templates/header.php'?>
        <!-- HEADER TEMPLATE END -->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header navbar-left">
                    <p class="navbar-text"><a href="reports.php"><i class="fa fa-long-arrow-left"></i> Go Back</a></p>
                </div>
                <div class="navbar-header navbar-right">
                    <p class="navbar-text">Signed in as <?=$_SESSION['username']?></p>
                    <a class="btn btn-primary navbar-btn productBtn" href="index.php"><i class="fa fa-files-o"></i> Inventory</a>
                    <a class="btn btn-info navbar-btn productBtn" href="orders.php"><i class="fa fa-files-o"></i> Orders</a>
                    <a class="btn btn-warning navbar-btn productBtn" href="customers.php"><i class="fa fa-users"></i> Customers</a>
                    <a class="btn btn-success navbar-btn productBtn" href="reports.php"><i class="fa fa-file-text-o"></i> Reports</a>
                    <a class="btn btn-default navbar-btn productBtn" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 text-center">
                    <h1>Product Average Report</h1>
                    <hr>
                    <table class="table" data-filtering="true">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Avg Sold</th>
                        </tr>
                        </thead>

                        <?php
                        $products = productList();
                        foreach ($products as $product) {
                            echo "<tr>";
                            echo "<td>" . $product["productName"] . "</td>";
                            echo "<td>" . $product["avgNumSold"] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- FOOTER TEMPLATE BEGIN -->
        <?php include 'templates/footer.php'?>
        <!-- FOOTER TEMPLATE END -->
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
