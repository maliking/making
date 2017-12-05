<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: loginPage.php");
    exit;
}

if (isset($_GET["productID"])) {
    include '../dbConnection.php';
    $conn = getDatabaseConnection();

    function getProductInfo() {
        global $conn;
        $sql = "SELECT *
                  FROM products
                 WHERE productID = " . $_GET["productID"];

        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $record = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $record;
    }
}

if (isset($_GET["updateForm"])) {
    $sql = "UPDATE products
               SET productName = :productName,
                   quantity = :quantity,
                   price = :price,
                   img = :img,
                   brand = :brand
             WHERE productID = :productID";

    $np = array();
    $np[":productName"] = $_GET["productName"];
    $np[":quantity"] = $_GET["quantity"];
    $np[":price"] = $_GET["price"];
    $np[":img"] = $_GET["img"];
    $np[":brand"] = $_GET["brand"];
    $np[":productID"] = $_GET["productID"];

    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
}

if (isset($_GET["productID"])) {
    $productInfo = getProductInfo();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Updating Product</title>
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
                    <div class="col-xs-6 col-xs-offset-3">
                        <h1>Update <?=$productInfo["productName"]?></h1>
                        <hr>
                            <form class="form-horizontal" onSubmit="return confirm('Product has been updated!')">
                                <input type="hidden" name="productID" value="<?=$productInfo["productID"]?>">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="productName">Name</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$productInfo["productName"]?>" id="productName" class="form-control" type="text" name="productName"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="brand">Brand</label>
                                    <div class="col-xs-9">
                                        <label class="radio-inline"><input <?=($productInfo["brand"] == "Acorn") ? " checked":"" ?> type="radio" name="brand" value="Acorn">Acorn</label>
                                        <label class="radio-inline"><input <?=($productInfo["brand"] == "Foamtreads") ? " checked":"" ?> type="radio" name="brand" value="Foamtreads">Foamtreads</label>
                                        <label class="radio-inline"><input <?=($productInfo["brand"] == "Haflinger") ? " checked":"" ?> type="radio" name="brand" value="Haflinger">Haflinger</label>
                                        <label class="radio-inline"><input <?=($productInfo["brand"] == "UGG") ? " checked":"" ?> type="radio" name="brand" value="UGG">UGG</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="quantity">Quantity</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$productInfo["quantity"]?>" class="form-control" type="number" name="quantity"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="price">Price</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$productInfo["price"]?>" class="form-control" type="text" name="price"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="img">Image URL</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$productInfo["img"]?>" class="form-control" placeholder="http://" type="text" name="img"/>
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

        <!-- FOOTER TEMPLATE BEGIN -->
        <?php include 'templates/footer.php'?>
        <!-- FOOTER TEMPLATE END -->
    </body>
</html>
