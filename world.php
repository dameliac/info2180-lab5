<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);






  $country = $_GET['query'];
  $cities = $_GET['lookup'];


 if($cities=='cities'){
  
  $stmt = $conn->prepare("SELECT c.name as Name, c.district as District, c.population as Population FROM cities
   c join countries cs on c.country_code = cs.code WHERE cs.name LIKE '%$country%'");
   
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '<table class="content-table">';;
  echo "<thead>";
    echo "<tr>";
      echo "<th>NAME</th>";
      echo "<th>DISTRICT</th>";
      echo "<th>POPULATION</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($results as $row){
    echo "<tr>";
      echo "<td>".$row['Name']."</td>";
      echo "<td>".$row['District']."</td>";
      echo "<td>".$row['Population']."</td>";
    echo "</tr>";
  }
  echo "</tbody>";
echo "</table>";
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
