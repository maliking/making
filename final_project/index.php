<?php
session_start();

function productList() {
    include "../dbConnection.php";
    $conn = getDatabaseConnection();
    $sql = "  SELECT *
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
        <title>Solemates</title>
        <!-- HEADER TEMPLATE BEGIN -->
        <?php include 'templates/header.php'?>
        <!-- HEADER TEMPLATE END -->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <?php
                    if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                    echo "<div class=\"navbar-left\">
                            <a href=\"viewAsUser.php\" class=\"btn navbar-btn productBtn\">View Page as User</a>
                          </div>";
                    }
                ?>
                <div class="navbar-header navbar-right">
                     <?php
                        if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                            echo "<p class=\"navbar-text\">Signed in as " . $_SESSION['username'] . "</p>";
                            echo "<a class=\"btn btn-primary navbar-btn productBtn\" href=\"index.php\"><i class=\"fa fa-files-o\"></i> Inventory</a>";
                            echo "<a class=\"btn btn-info navbar-btn productBtn\" href=\"orders.php\"><i class=\"fa fa-files-o\"></i> Orders</a>";
                            echo "<a class=\"btn btn-warning navbar-btn productBtn\" href=\"customers.php\"><i class=\"fa fa-users\"></i> Customers</a>";
                            echo "<a class=\"btn btn-success navbar-btn productBtn\" href=\"reports.php\"><i class=\"fa fa-file-text-o\"></i> Reports</a>";
                            echo "<a class=\"btn btn-default navbar-btn productBtn\" href=\"logout.php\"><i class=\"fa fa-sign-out\"></i> Logout</a>";
                        } else {
                            echo "<a class=\"btn btn-success navbar-btn productBtn\" href=\"loginPage.php\"><i class=\"fa fa-sign-in\"></i> Admin Login</a>";
                        }
                    ?>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 text-center">
                    <h1>Solemates <?= isset($_SESSION["username"]) ? "Inventory" : "Slipper Store"?></h1>
                    <hr>
                        <?php
                            if(isset($_SESSION['username'])) {
                                echo "<a id=\"addProduct\" class=\"btn btn-primary\" href=\"addProduct.php\"><i class=\"fa fa-plus\"></i> Add a New Product</a>";
                            }
                        ?>
                    <table class="table" data-filtering="true">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th># in Stock</th>
                            <?= isset($_SESSION["username"]) ? "<th></th>" : ""?>
                        </tr>
                        </thead>

                        <?php
                        $shoes = productList();
                        foreach ($shoes as $shoe) {
                            echo "<tr>";
                            echo "<td><img src='" . $shoe["img"] . "'></td>";
                            echo "<td>" . $shoe["productName"] . "<br><img class=\"brand\" src=\"img/" . $shoe["brand"] . ".jpg\"></td>";
                            echo "<td>$" . $shoe["price"] . "</td>";
                            echo "<td>" . $shoe["quantity"] . "</td>";
                            if(isset($_SESSION['username'])) {
                                echo "<td><a class=\"btn btn-warning productBtn\" href=\"editProduct.php?productID=" . $shoe["productID"] . "\"><i class=\"fa fa-pencil\"></i></a>
                                      <a class=\"btn btn-danger productBtn\" onClick=\"return confirm('Are you sure you want to delete " . $shoe["productName"] . "?')\" href='deleteProduct.php?productID=" . $shoe["productID"] . "'>
                                    <i class='fa fa-trash-o'></i></a></td>";
                            }
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
