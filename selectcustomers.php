<?php
include ('conn.php');
require ('function.php');

$customer = "SELECT *FROM customers";

if (isset($_POST["search"]))
{
    $customer = searchCustomer($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
</head>
<body>
    <h1>CUSTOMERS</h1>
    <?php
    $sqlcus = "SELECT * FROM customers";
    $result = mysqli_query($connect, $sqlcus);
    echo "<table border='1'>
        <tr>
            <th>Customer Number</th>
            <th>Customer Name</th>
            <th>Contact Last Name</th>
            <th>Contact First Name</th>
            <th>Phone</th>
            <th>Address Line 1</th>
            <th>Address Line 2</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
            <th>Country</th>
            <th>Sales Rep Employee Number</th>
            <th>Credit Limit</th>
        </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" .$row["customerNumber"] . "</td>";
        echo "<td>" .$row["customerName"] . "</td>";
        echo "<td>" .$row["contactLastName"] . "</td>";
        echo "<td>" .$row["contactFirstName"] . "</td>";
        echo "<td>" .$row["phone"] . "</td>";
        echo "<td>" .$row["addressLine1"] . "</td>";
        echo "<td>" .$row["addressLine2"] . "</td>";
        echo "<td>" .$row["city"] . "</td>";
        echo "<td>" .$row["state"] . "</td>";
        echo "<td>" .$row["postalCode"] . "</td>";
        echo "<td>" .$row["country"] . "</td>";
        echo "<td>" .$row["salesRepEmployeeNumber"] . "</td>";
        echo "<td>" .$row["creditLimit"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    ?>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>