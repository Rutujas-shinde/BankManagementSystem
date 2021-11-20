<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Make Transaction</title>
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
   $sender=$_POST['sender'];
   $receiver=$_POST['receiver'];
   $money=$_POST['money'];
   $sql = "INSERT INTO History VALUES (:sender, :receiver, :money);";
	$query = $conn->prepare($sql);
	$inst = $query->execute(array(
		":sender" => $sender,
		":receiver" => $receiver,
		":money" => $money
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
        <a href="adduser.php">User</a>
        <a id="current" href="matransaction.php">Transaction</a>
        <a href="history.php">History</a>
    </nav>

    <hr>
    <h1 style="color:darkred;text-align:center;">TRANSACTION FORM</h1>
    <hr>
    <br>

    <form method="post" >
        <h3>Enter the sender account</h3>
        <input type="number" name="sender" placeholder="Enter the sender account">
        <br>
        <h3>Enter the receiver account</h3>
        <input type="number" name="receiver" placeholder="Enter the receiver account">
        <br>
        <h3>Enter the Transaction amount</h3>
        <input type="number" name="money" placeholder="Enter the Transaction amount">
        <br>
        <br>
        <input id="submitbutton"name="submit" type="Submit" value="Make Transaction">
        <br>
        <br>
    </form>

</body>
</html>