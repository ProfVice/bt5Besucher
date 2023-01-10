<html>
<!-- <body>
Hallo <?php echo $_POST['name']; ?> ! Wie geht es dir? <br>
Du hast dieses Datum gewählt: <?php echo $_POST["date"]; ?>
</body>
-->



<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles.css">
        <title>Login</title>
    </head>


    <body>
        <nav>
            <a href="./index.html" class="index"> Jugendlichen registrieren</a>
            <a href="./login.php" class="login active">Anwesenheit eintragen</a>
            <a href="./statistik.html" class="statistik">Statistik</a>
        </nav>
        <br><br><br>
        <div class="box">
        <h1>Anwesenheitsliste</h1>
            <div class="box2">
			<form action="login.php" method="post">
					Person: <br> 
					Name: <input type="text" name="name">
					Datum: <input type="date" name="date" id="dateId">
					<br><br><br>
				
					<input type="submit" class="button">
				
			</form>	
            </div>
            <div class="box2">
                <h2>Anwesend:</h2>
                <?php
                    echo "<table style='border: solid 1px black;'>";
                    echo "<tr><th>Id</th><th>Vorname</th><th>Alter</th></tr>";

                    class TableRows extends RecursiveIteratorIterator {
                    function __construct($it) {
                    parent::__construct($it, self::LEAVES_ONLY);
                    }

                function current() {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                }
                
                function beginChildren() {
                echo "<tr>";
                }
                
                function endChildren() {
                echo "</tr>" . "\n";
                }
                }

                $servername = "localhost";
                $username = "bt5";
                $password = "bt5pw";
                $dbname = "bt5";

                try {
                  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $stmt = $conn->prepare("SELECT ID, jName, age FROM jugendliche");
                  $stmt->execute();
                
                  // set the resulting array to associative
                  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                  }
                } catch(PDOException $e) {
                  echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo "</table>";
                ?> 
            </div>
		
        </div>
    </body>


<?php
$servername = "localhost";
$username = "bt5";
$password = "bt5pw";
$dbname = "bt5";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } 
    catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>




</html>