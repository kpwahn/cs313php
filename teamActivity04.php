<?php

$server = $OPENSHIFT_scriptures_DB_HOST
$database = 'scriptures';
$username = 'adminSPemDYX';
$password = 'tnefpMRrBe7g';

$sdb = new PDO("mysql: host=$server; dbname=$database", $username, $password);

echo "<h2> Scripture Resources </h2>";

foreach($sdb->query('select * from scripture_table') as $row) {
 echo "<b>" . $row["book"] . " " . $row["chapter"] . ":" . $row["verse"] . "</b>" . " - \"" . $row["content"] . "\"<br />";
}

?>

<!DOCTYPE html>
<html>
<body>
  <form name="myForm" method="post" action="<?php $_SERVER["PHP_SELF"];?>">
  <input type="text" name="search"/>
  <input type="submit" value="Search"/>
  </form>
</body>
</html>
<?php
$search = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = $_POST["search"];
  
  foreach($sdb->query("select * from scripture_table where book = \"$search\" ") as $row) {
     echo "<b>" . $row["book"] . " " . $row["chapter"] . ":" . $row["verse"] . "</b>" . " - \"" . $row["content"] . "\"<br />";
  }
} 
?>