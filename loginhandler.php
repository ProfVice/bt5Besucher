<html>
<?php
$servername = "localhost";
$username = "bt5";
$password = "bt5pw";
$dbname = "bt5";
//$besuchTag = $_POST['date']
$besuchTag = "2023-01-01";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("UPDATE besuchStatistikTaglich SET anzahl = anzahl +1 WHERE besuchTag=$besuchTag");
  $stmt->execute();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
$conn = null;
header("Location:http://127.0.0.1/bt5/login.php"); 
exit;
?>
</html>