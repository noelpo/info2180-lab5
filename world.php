<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country']

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%country%'");


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php 
if (isset($_GET['context'])) {
 $stmtt = $conn->query("SELECT cities.name AS city,cities.district AS district,cities.population AS population1 FROM cities JOIN countries ON countries.code = cities.country_code WHERE countries.name = '$country'");
 $outcome = $stmtt->fetchAll(PDO::FETCH_ASSOC);
if ($_GET['context'] == 'cities') {
 
 echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th> Name</th>';
echo '<th> District</th>';
echo '<th> Population</th>';
echo '<thead/>';
echo '</tr>';
      foreach ($outcome as $roww) {
       echo '<tbody>';
       echo '<tr>';
       echo '<td>'; echo $roww['city'];  echo '</td>';
       echo '<td>'; echo $roww['district']; echo '</td>';
       echo '<td>'; echo $roww['population1']; echo '</td>';
    

       echo '</tr>';
       echo '<tbody/>';
      
   
   

      } 
  } 
 } else { 
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th> Country Name</th>';
    echo '<th> Continent</th>';
    echo '<th> Independence Year</th>';
    echo '<th> Head of State</th>';
    echo '<th> Population</th>';
    echo '<thead/>';
    echo '</tr>';
    foreach ($results as $row){
   echo '<tbody>';
   echo '<tr>';
    echo '<td>'; echo $row['name']; echo '</td>';
    echo '<td>'; echo $row['continent']; echo '</td>';
    echo '<td>'; echo $row['independence_year']; echo '</td>';
    echo '<td>' . $row['head_of_state'] . '</td>';
    echo '<td>' . $row['population'] . '</td>';
 
   echo '<tbody/>';
   '</tr>';
      } 
    }

echo '</table>';
?>
