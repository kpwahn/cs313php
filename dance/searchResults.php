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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<a href='private.php'>Go Back</a><br/><br />";
  if (!empty($_POST["style"]) ) {
    //echo '<script type="text/javascript">alert("Searching by style"); </script>';
    $style = $_POST["style"];
    
    foreach($db->query("select style_id from style_table where style = '$style'") as $row) {
    $style_id = $row["style_id"];
      foreach($db->query("select * from move_table where style = '$style_id'") as $row1) {
      $url = $row1['url'];
      echo $row1["move_name"] . ": <br /> <iframe width='100%' height='500' src=\"$url\" frameborder='0' allowfullscreen></iframe><br />";
      }
    }   
  }
  else {
    //echo '<script type="text/javascript">alert("Searching by name"); </script>';
    $move = $_POST["move_name"];
    
    foreach($db->query("select * from move_table where move_name LIKE '%$move%'") as $row2) {
      $url1 = $row2["url"];
      echo $row2["move_name"] . ": <br /> <iframe width='100%' height='500' src=\"$url1\" frameborder='0' allowfullscreen></iframe><br /><br />";
  }
}
}

?>


<!DOCTYPE html>
<html>
<body>
  <a href="private.php">Go Back</a>
</body>
</html>