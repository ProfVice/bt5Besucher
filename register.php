<html>

<?php
$servername = "localhost";
$username = "bt5";
$password = "bt5pw";
$dbname = "bt5";
$jname = $_POST['name'];
$jage = $_POST['alterj'];
$jsex = $_POST['jsex'];
$man = "M";
$wman = "W";
$jahr = date("Y");

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO jugendliche (jName, age)
  VALUES ('$jname', '$jage')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

/*
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($jsex == $man) {
  echo "DIES GESCHLECHT: $jsex !!";
  $sql2 = "UPDATE geschlecht SET man = man+1 WHERE ID = 2023"; }
  $stmt= $pdo->prepare($sql2);
  $stmt->execute($data);
  echo "New record created successfully";
  if ($jsex == $wman)
  echo "WEIBLICH!";
}
*/

if ($jsex == $man) {
$sql = "UPDATE geschlecht SET man = man +1 WHERE ID=$jahr";

$statement = $conn->prepare($sql);

if($statement->execute($data)) {
  echo "Post updated successfully!";
}
else {
  $sql = "INSERT INTO `geschlecht`(`ID`, `woman`, `man`, `diverse`) VALUES ('2024','0','0','0')";

$statement = $conn->prepare($sql);
}
}
if ($jsex == $wman) {
  $sql = "UPDATE geschlecht SET woman = woman +1 WHERE ID=$jahr";
  
  $statement = $conn->prepare($sql);
  
  if($statement->execute($data)) {
    echo "Post updated successfully!";
  }
  else {
    $sql = "INSERT INTO `geschlecht`(`ID`, `woman`, `man`, `diverse`) VALUES ('2024','0','0','0')";
  
  $statement = $conn->prepare($sql);
  }
}
 

$conn = null;
?> 

<?php
header("Location:https://127.0.0.1/bt5/index.html");
exit();
?>


</html>