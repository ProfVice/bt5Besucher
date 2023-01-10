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
 if ($jsex == $man) {
echo "DIES GESCHLECHT: $jsex !!";
$sql = "UPDATE geschlecht SET man = man+1 "; }
if ($jsex == $wman)
echo "WEIBLICH!";

$conn = null;
?> 


</html>