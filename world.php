<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);






  $country = $_GET['query'];
  if ($country == ""){
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row):
      echo "<li>{$row['name']}". "' is ruled by '" . "{$row['head_of_state']}</li>";
    endforeach; 
  }
  else{
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<ul>";
    foreach ($results as $row):
      echo "<li>".$row['name']. "' is ruled by '" . $row['head_of_state']. "</li>";
    endforeach; 
    echo "</ul>";
  }

?>
