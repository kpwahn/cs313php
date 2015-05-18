<?php


define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
$sdb = new PDO($dsn, DB_USER, DB_PASS);

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