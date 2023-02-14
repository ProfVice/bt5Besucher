<!DOCTYPE html>
<html lang="de">

<head>
  <title>temphandler</title>
</head>

<body> aaaa 
</body>
</html>

<?php
$servername = "localhost";
$username = "bt5";
$password = "bt5pw";
$dbname = "bt5";
$jugname = $_POST['name'];
$jDate = $_POST['date'];
$jSex = $_POST['jsex'];
$jAge = $_POST['jAge'];
$jahr = date("Y");


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Bis hierhin";
    $sql = "INSERT INTO tempBesucher (aDatum, jugName, jGeschlecht, jAlter)
    VALUES ('$jDate', '$jugname', '$jSex', '$jAge')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  if ($jSex=='M') {
    $sql = "UPDATE geschlecht SET man = man +1 WHERE ID=$jahr";
    $conn->exec($sql);
  }
  if ($jSex=='W') {
    $sql = "UPDATE geschlecht SET man = man +1 WHERE ID=$jahr";
    $conn->exec($sql);
  }
  
  $conn = null;
header("Location: ./temporarySystem.php");
exit;
?>