<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add User</title>
</head>
<body>
<?php
$servername = "sql111.unaux.com";
$username = "unaux_30357598";
$password = "63fgm2dmk9";

try {
  $conn = new PDO("mysql:host=$servername;dbname=unaux_30357598_spark", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (isset($_POST['submit'])) {
   $name=$_POST['name'];
   $aadhar=$_POST['aadhar'];
   $address=$_POST['address'];
   $mob=$_POST['mob'];
   $balance=$_POST['balance'];
   $birth=$_POST['birth'];
   $sql = "INSERT INTO Tablename VALUES (:name,:aadhar,:address,:mob,:balance,:birth);";
	$query = $conn->prepare($sql);
	$inst = $query->execute(array(
		":name" => $name,
		":aadhar" => $aadhar,
		":address" => $address,
        ":mob" => $mob,
		":balance" => $balance,
		":birth" => $birth
	));
    echo "<h3 style='text-align:center;background-color:orange;padding:10px 10px 10px 10px;'>form submiteed succesfully</h3>";
}
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
    <header>
        <h1>Trust Bank</h1>
        <h3>WE ARE HERE, ONLY FOR YOU!</h3>
    </header>

    <nav>
        <a href="../index.php">Home</a>
        <a id="current" href="adduser.php">User</a>
        <a href="matransaction.php">Transaction</a>
        <a href="history.php">History</a>
    </nav>

    <hr>
    <h1 style="color:darkred;text-align:center;">NEW USER FORM</h1>
    <hr>
    <form method="POST">
        <h3>Enter the name</h3>
        <input type="text" name="name" placeholder="Enter the Name">
        <br>
        <h3>Enter the Aadhar Card Number</h3>
        <input type="number" name="aadhar" placeholder="Enter the Name">
        <br>
        <h3>Enter the Address</h3>
        <input type="text" name="address" placeholder="Enter the Address">
        <br>
        <h3>Enter the Mobile Number</h3>
        <input type="number" name="mob" placeholder="Enter the Mobile Number">
        <br>
        <h3>Enter the Opening Balance</h3>
        <input type="number" name="balance" placeholder="Enter the Opening Balance">
        <br>
        <h3>Enter the Birth Date</h3>
        <input type="date" name="birth" placeholder="Enter the Today Date">
        <br>
        <br>
        <input id="submitbutton" type="submit" name="submit" value="Create New User">
        <br>
        <br>
    </form>

    <hr>
    <h1 style="color:darkred;text-align:center;">ACCOUNT HOLDER DETAILS</h1>
    <table>
        <tr>
            <th>Sr. No. </th>
            <th>Account Holder Name</th>
            <th>Birth Date</th>
            <th>Balance</th>
        </tr>
        <?php
$servername = "sql111.unaux.com";
$username = "unaux_30357598";
$password = "63fgm2dmk9";

try {
    $conn = new PDO("mysql:host=$servername;dbname=unaux_30357598_spark", $username, $password);
  // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT Name,dob,balance FROM Tablename';
    $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(); 
    $k=1;
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $data = "<tr style='background-color:skyblue;' ><td style='text-align:center;'>" . $k . "</td><td style='text-align:center;'>" .$row[0] . "</td><td style='text-align:center;'>" . $row[1] . "</td><td style='text-align:center;'>" . $row[2] . "</td></tr>";
        print $data;
        $k=$k+1;
    }


} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
    </table>

    <br>
    <br>
    <br>
    <hr>
</body>
</html>