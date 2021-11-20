<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>View Transaction</title>
</head>
<body>

    <header>
        <h1>Trust Bank</h1>
        <h3>WE ARE HERE, ONLY FOR YOU!</h3>
    </header>

    <nav>
        <a href="../index.php">Home</a>
        <a href="adduser.php">User</a>
        <a href="matransaction.php">Transaction</a>
        <a id="current" href="history.php">History</a>
    </nav>

    <hr>
        <h1 style="color:darkred;text-align:center;">TRANSACTION HISTORY</h1>
    <table>
        <tr>
            <th>Sr. No. </th>
            <th>Sender Account</th>
            <th>Receiver Account</th>
            <th>Transaction Amount</th>
        </tr> 

<?php
$servername = "sql111.unaux.com";
$username = "unaux_30357598";
$password = "63fgm2dmk9";

try {
  $conn = new PDO("mysql:host=$servername;dbname=unaux_30357598_spark", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = 'SELECT sender, receiver, amount FROM History ';
    $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute(); 
    $k=1;
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $data = "<tr style='background-color:skyblue;'><td style='text-align:center;'>" . $k . "</td><td style='text-align:center;'>" .$row[0] . "</td><td style='text-align:center;'>" . $row[1] . "</td><td style='text-align:center;'>" . $row[2] . "</td></tr>";
        print $data;
        $k=$k+1;
    }


} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
    </table>
</body>
</html>