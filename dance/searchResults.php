<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: index.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to index.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 
?> 

<?php

$style = $move = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $style = $_POST["style"];
  //$move = $_POST["move_name"];
}

$server = '127.0.0.1';
$database = 'dance';
$username = 'root';
$password = '';

//$sdb = new PDO("mysql:host=" . DB_HOST . ";dbname={$dbname};charset=utf8", DB_USER, DB_PASS, $options); 
//$sdb = new PDO("mysql: host=$server; dbname=$database", $username, $password);

foreach($db->query("select style_id from style_table where style = '$style'") as $row) {
  $temp = $row["style_id"];
  foreach($db->query("select * from move_table where style = '$temp'") as $row1) {
    $temp2 = $row1['url'];
    echo $row1["move_name"] . ": <br /> <iframe width='854' height='510' src=\"$temp2\" frameborder='0' allowfullscreen></iframe>";
  }
}
?>


<!DOCTYPE html>
<html>
<body>
</body>
</html>