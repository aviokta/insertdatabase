<?php
include ('conn.php')
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
    <H1>PRODUCTS</H1>
<?php

$sqlpro = "SELECT * FROM products";
$result = mysqli_query($connect, $sqlpro);
echo "<table border='1'>
<tr>
    <th>Product Code</th>
    <th>Product Name</th>
    <th>Product Line</th>
    <th>Product Scale</th>
    <th>Product Vendor</th>
    <th>Product Description</th>
    <th>Quangigy In Stock</th>
    <th>Buy Price</th>
    <th>MSRP</th>
</tr>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" .$row["productCode"] . "</td>";
echo "<td>" .$row["productName"] . "</td>";
echo "<td>" .$row["productLine"] . "</td>";
echo "<td>" .$row["productScale"] . "</td>";
echo "<td>" .$row["productVendor"] . "</td>";
echo "<td>" .$row["productDescription"] . "</td>";
echo "<td>" .$row["quantityInStock"] . "</td>";
echo "<td>" .$row["buyPrice"] . "</td>";
echo "<td>" .$row["MSRP"] . "</td>";
echo "</tr>";
}
echo "</table>";
?>
    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
