<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: loginPage.php");
    exit;
}

if (isset($_GET["customerID"])) {
    include '../dbConnection.php';
    $conn = getDatabaseConnection();

    function getCustomerInfo() {
        global $conn;
        $sql = "SELECT *
                  FROM customers
                 WHERE customerID = " . $_GET["customerID"];

        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $record = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $record;
    }
}

if (isset($_GET["updateForm"])) {
    $sql = "UPDATE customers
               SET lastName = :lastName,
                   firstName = :firstName,
                   address = :address,
                   city = :city,
                   zip = :zip,
                   country = :country,
                   phone = :phone
             WHERE customerID = :customerID";

    $np = array();
    $np[":lastName"] = $_GET["lastName"];
    $np[":firstName"] = $_GET["firstName"];
    $np[":address"] = $_GET["address"];
    $np[":city"] = $_GET["city"];
    $np[":zip"] = $_GET["zip"];
    $np[":country"] = $_GET["country"];
    $np[":phone"] = $_GET["phone"];
    $np[":customerID"] = $_GET["customerID"];

    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);

}

if (isset($_GET["customerID"])) {
    $customerInfo = getCustomerInfo();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Updating Customer</title>
        <!-- HEADER TEMPLATE BEGIN -->
        <?php include 'templates/header.php'?>
        <!-- HEADER TEMPLATE END -->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header navbar-left">
                    <p class="navbar-text"><a href="customers.php"><i class="fa fa-long-arrow-left"></i> Go Back</a></p>
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
                        <h1>Update <?=$customerInfo["firstName"] . " " . $customerInfo["lastName"]?></h1>
                        <hr>
                            <form class="form-horizontal" onSubmit="return confirm('Customer has been updated!')">
                                <input type="hidden" name="customerID" value="<?=$customerInfo["customerID"]?>">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="firstName">First Name</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$customerInfo["firstName"]?>" class="form-control" type="text" name="firstName"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="lastName">Last Name</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$customerInfo["lastName"]?>" class="form-control" type="text" name="lastName"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="address">Address</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$customerInfo["address"]?>" class="form-control" type="text" name="address"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="city">City</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$customerInfo["city"]?>" class="form-control" type="text" name="city"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="zip">Zip</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$customerInfo["zip"]?>" class="form-control" type="text" name="zip"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="country">Country</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$customerInfo["country"]?>" class="form-control" type="text" name="country"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="phone">Phone</label>
                                    <div class="col-xs-9">
                                        <input value="<?=$customerInfo["phone"]?>" class="form-control" type="text" name="phone"/>
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
