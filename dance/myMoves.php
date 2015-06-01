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
    //use this to pull up only the moves of the specific user

echo "<h2> Your Moves </h2> <br />";
  $user = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');

  foreach($db->query("select user_id from user_table where username = '$user' ") as $row) {
    //echo $user . " is user_id: " . $row["user_id"];
    $user_id = $row["user_id"];

    foreach ($db->query("select move_id from user_move_table where user_id = '$user_id'") as $row1) {
      $move_id = $row1["move_id"];
      
      foreach ($db->query("select * from move_table where move_id = '$move_id'") as $row3) {
        $moveurl = $row3["url"];
        echo $row3["move_name"] . ": <br /> <iframe width='100%' height='500' src=\"$moveurl\" frameborder='0' allowfullscreen></iframe><br />";
        
      }
    }  
  }
?> 

<!DOCTYPE html>
<html>
<body>

</body>
</html>