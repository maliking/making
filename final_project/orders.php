<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: loginPage.php");
    exit;
}

include "../dbConnection.php";
$conn = getDatabaseConnection();

function getCustomerOrderList() {
    global $conn;
    $sql = "SELECT
                orderID,
                price * orders.quantity AS totalPrice,
                date_format(date, '%m/%d/%y') AS dateTime,
                productName,
                orders.quantity AS numSold
            FROM
                orders
            INNER JOIN
                customers ON customers.customerID = orders.customerID
            INNER JOIN
                products ON products.productID = orders.productID
            WHERE orders.customerID = :customerID";

    $np[":customerID"] = $_GET["customerID"];
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function getOrderList() {
    global $conn;
    $sql = "SELECT orderID,
                   firstName,
                   lastName,
                   price * orders.quantity AS totalPrice,
                   date_format(date, '%m/%d/%y') AS dateTime,
                   productName,
                   orders.quantity AS numSold
              FROM orders
                   INNER JOIN customers
                   ON customers.customerID = orders.customerID

                   INNER JOIN products
                   ON products.productID = orders.productID
          ORDER BY dateTime";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $records;
}




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Orders</title>
        <!-- HEADER TEMPLATE BEGIN -->
        <?php include 'templates/header.php'?>
        <!-- HEADER TEMPLATE END -->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header navbar-left">
                    <p class="navbar-text"><a href="index.php"><i class="fa fa-long-arrow-left"></i> Go Back</a></p>
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
                    <h1>Orders</h1>
                    <hr>
                    <table class="table" data-paging="true">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <?php
                                if (!isset($_GET["customerID"])) {
                                    echo "<th>Customer</th>";
                                }
                            ?>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>

                        <?php
                            if (isset($_GET["customerID"])) {
                                $orders = getCustomerOrderList();
                                foreach ($orders as $order) {
                                    echo "<tr>";
                                    echo "<td>" . $order["dateTime"] . "</td>";
                                    echo "<td>" . $order["productName"] . "</td>";
                                    echo "<td>" . $order["numSold"] . "</td>";
                                    echo "<td>$" . number_format($order["totalPrice"]) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                $orders = getOrderList();
                                foreach ($orders as $order) {
                                    echo "<tr>";
                                    echo "<td>" . $order["dateTime"] . "</td>";
                                    echo "<td>" . $order["firstName"] . " " . $order["lastName"] . "</td>";
                                    echo "<td>" . $order["productName"] . "</td>";
                                    echo "<td>" . $order["numSold"] . "</td>";
                                    echo "<td>$" . number_format($order["totalPrice"]) . "</td>";
                                    echo "</tr>";
                                }
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
