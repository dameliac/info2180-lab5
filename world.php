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
    echo '<table class = "table">';
    echo "<thead>";
      echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Continent</th>";
        echo "<th>Indepence</th>";
        echo "<th>Head of State</th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
      foreach ($results as $row):
      echo "<tr>";
        echo "<td>".$row['name']."</td>"; 
        echo "<td>".$row['continent']."</td>";
        echo "<td>".$row['independence_year']."</td>";
        echo "<td>".$row['head_of_state']."</td>";
      echo "</tr>";
      endforeach; 
    echo "</tbody>";
    echo "</table>";
    
  }

?>
