<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles.css">
        <title>Login</title>
    </head>


    <body>
    <nav>
      <div id="nav-desktop">
        <a href="./statistik.php" class="navlink statistik active">Statistik</a>
        <a href="./temporarySystem.php" class="navlink tempo">Besucherliste</a>
    </div>
    <div id="nav-mobil">
      <label for="hamburger">&#9776;</label>
      <input type="checkbox" id="hamburger">   
      <div id="hamitems">   
      <a href="./statistik.php" class="navlink statistik active">Statistik</a>
      <a href="./temporarySystem.php" class="navlink tempo">Besucherliste</a>
      </div>
    </div>  
    </nav>
<div class="box2">
<?php
                

                $servername = "localhost";
                $username = "bt5";
                $password = "bt5pw";
                $dbname = "bt5";

                try {
                  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  //SELECT COUNT(DISTINCT jugName) AS total FROM tempBesucher WHERE salary > 50000;
                 
                  $sql = "SELECT COUNT(DISTINCT jugName) FROM tempBesucher";
                  $res = $conn->query($sql);
                  $count = $res->fetchColumn();

                  print "Besucher Gesamt: " .  $count . " .";
                  echo "<br>";

                  $sql2 = "SELECT COUNT(*) FROM tempBesucher";
                  $res2 = $conn->query($sql2);
                  $count2 = $res2->fetchColumn();
                  print "\n\r Besuche gesamt: " .  $count2 . " .";
                  echo "<br>";
                
                  $sql3 = "SELECT COUNT(DISTINCT case when jGeschlecht = 'M' then jugName end) FROM tempBesucher ";
                  $res3 = $conn->query($sql3);
                  $count3 = $res3->fetchColumn();
                  print "Besucher Männlich gesamt: " .  $count3 . " .";
echo "<br>";

                  $sql4 = "SELECT COUNT(DISTINCT case when jGeschlecht = 'W' then jugName end) FROM tempBesucher ";
                  $res4 = $conn->query($sql4);
                  $count4 = $res4->fetchColumn();
                  print "Besucher Weiblich gesamt: " .  $count4 . " .";
                  echo "<br>";

                  $sql5 = "SELECT COUNT(DISTINCT case when jAlter = '0' then jugName end) FROM tempBesucher ";
                  $res5 = $conn->query($sql5);
                  $count5 = $res5->fetchColumn();
                  print "Besucher Altersgruppe 10-13 gesamt: " .  $count5 . " .";
echo "<br>";

                  $sql6 = "SELECT COUNT(DISTINCT case when jAlter = '1' then jugName end) FROM tempBesucher ";
                  $res6 = $conn->query($sql6);
                  $count6 = $res6->fetchColumn();
                  print "Besucher Altersgruppe 14-17 gesamt: " .  $count6 . " .";
                  echo "<br>";

                  $sql7 = "SELECT COUNT(DISTINCT case when jAlter = '2' then jugName end) FROM tempBesucher ";
                  $res7 = $conn->query($sql7);
                  $count7 = $res7->fetchColumn();
                  print "Besucher Altersgruppe 18-24 gesamt: " .  $count7 . " .";
                  echo "<br>";

                  }
                 catch(PDOException $e) {
                  echo "Error: " . $e->getMessage();
                }
                $conn = null;
                //echo $result;
                
                ?>
</div>
</html>