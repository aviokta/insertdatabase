<?php
    include ('conn.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //select daftar salesRepEmployeeNumber dari database employee
    $sql = "SELECT employeeNumber, CONCAT(firstname,' ',lastName) AS fullname FROM employees WHERE jobTitle = 'Sales Rep'";
    $result = mysqli_query($connect, $sql);

    //Cek form
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //menyimpan data form
        $customerNumber = $_POST["customerNumber"];
        $customerName = $_POST["customerName"];
        $contactLastName = $_POST["contactLastName"];
        $contactFisrtName = $_POST["contactFirstName"];
        $phone = $_POST["phone"];
        $addressLine1 = $_POST["addressLine1"];
        $addressLine2 = $_POST["addressLine2"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $postalCode = $_POST["postalCode"];
        $country = $_POST["country"];
        $creditLimit = $_POST['creditLimit'];
        $salesRepEmployeeNumber = $_POST["salesRepEmployeeNumber"];

        //query memasukkan data baru ke tabel customer didatabase
        $query = "INSERT INTO customers 
        (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, creditLimit,salesRepEmployeeNumber)
                VALUES ('$customerNumber','$customerName','$contactLastName','$contactFirstName','$phone','$addressLine1','$addressLine2','$city','$state','$postalCode','$country','$creditLimit','$salesRepEmployeeNumber')";

        //menjalankan query
        if (mysqli_query($connect, $query)){
            echo "<b>Data berhasil ditambahkan ke Database</b>";
        } else {
            echo "<b>Data gagal ditambahkan ke Database!!</b>";
            echo "Error: ".$query. "<br>".mysqli_error($connect);
        }
    }
    ?>

    <!-- Form memasukkan data baru -->
    <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br> <label>Customer Number : </label>
                <input type="number" name="customerNumber"><br><br>
             <label>Customer Name : </label> 
                <input type="text" name="customerName" > <br><br>
             <label>Contact Last Name : </label> 
                <input type="text" name="contactLastName"> <br><br>
             <label>Contact First Name : </label> 
                <input type="text" name="contactFirstName"> <br><br>
             <label>  Phone:</label> 
                <input type="number" name="phone"><br><br>
             <label>Address Line 1:</label>  
                <input type="textarea" name="addressLine1"><br><br>
             <label> Address Line 2:</label> 
                <input type="textarea" name="addressLine2"><br><br>
             <label> City:</label> 
                <input type="text" name="city"><br><br>
             <label> State:</label>
                <input type="text" name="state"><br><br>
             <label> Postal Code:</label>
                <input type="number" name="postalCode"><br><br>
             <label> Country:</label>
                <input type="text" name="country"><br><br>
             <label>  Sales Rep Employee Number:  </label>
                <br><select name="salesRepEmployeeNumber">
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['employeeNumber'] . "'>" . $row['fullName'] . "</option>";
                } ?>
                </select><br><br>
             <label> Credit Limit: </label>
                <input type="text" name="creditLimit"><br><br>
                <input type="submit" value="Submit"><br>
    </form>
    </form>
</body>
</html>