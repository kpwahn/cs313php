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

<!DOCTYPE html> 
<html>
<body>
  <h1>Dance Library</h1>
  <br />
  
  <form action="searchResults.php" method="post">
    Select your style: 
    <select name="style">
    <?php
  foreach($db->query('select style from style_table') as $row) {
    $style = $row["style"];
    echo "<option value ='$style'>$style</option<br />";
  }
    ?>
      
    </select> <br /> <br />   
    <input type="submit" value="Search"/>
  </form>
  <br />
    <form action="searchResults.php" method="post">
    Or search by move: <input type="text" name="move_name"/>
    <input type="submit" value="Search"/>
  </form>
</body>
</html>