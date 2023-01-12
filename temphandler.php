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


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Bis hierhin";
    $sql = "INSERT INTO tempBesucher (aDatum, jugName, jGeschlecht)
    VALUES ('$jDate', '$jugname', '$jSex')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = null;
header("Location: ./temporarySystem.php");
exit;
?>