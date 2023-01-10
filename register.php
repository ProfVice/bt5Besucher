<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles.css">
        <title>Registrierung</title>
    </head>


    <body>
        <nav>
        <a href="./index.html" class="index active"> Jugendlichen registrieren</a>
        <a href="./login.php" class="login">Anwesenheit eintragen</a>
        <a href="./statistik.html" class="statistik">Statistik</a>
        </nav>
        <br><br><br>
        <div class="box">
            <h1>Registrierung</h1>
            <div class="erklaerung">
                <p class="description">
                Erklärung: Jugendliche die noch nicht im System sind, können hier mit Name, Alter und Geschlecht eingetragen werden. Wenn der Jugendliche schon im System ist wird seine Anwesenheit über die entsprechende Seite gemeldet.
                </p>
            </div>
            <div class="box2">
			<form action="register.php" method="post">
            <div id="register-box">
                <p>Name: <input type="text" name="name"></p>
                <p class="alter">Alter :    <select name="alterj" id="alter">
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                </select></p>
                <p>Geschlecht: 
                    <select name="jsex" id="geschlecht">
                        <option value="M">M</option>
                        <option value="W">W</option>
                        <option value="D">D</option>
                    </select>
                    
                    <br><br>
                <input type="submit" class="button" value="Absenden">
            </div>
            </div>
			</form>
        </div>
    </body>


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
header("127.0.0.1/bt5/index.html");
exit();
?>


</html>