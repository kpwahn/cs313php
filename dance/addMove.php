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

    echo "<h2>Add a move</h2>";
?> 
<!DOCTYPE html>
<html>
<body>
  <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
    Select the style: 
    <select name="style" required>
    <?php
  foreach($db->query('select style from style_table') as $row) {
    $style = $row["style"];
    echo "<option value ='$style' name='style[]'>$style</option<br />";
  }
    ?>
    </select><br />
    Name of the Move:
    <input type="text" name="move_name" required/> <br />
    YouTube EMBEDDED src:
    <input type="text" name="url" required/> <br />  
    <input type="submit" value="Search" required/>

</form>  
  
  <?php
$search = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $move_name = $_POST["move_name"];
  $url = $_POST["url"];
  $style = $_POST["style"];
  $user = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');
  
  foreach ($db->query("select user_id from user_table where username = '$user' ") as $row){
    $user_id = $row["user_id"];  
  }
  
  foreach ($db->query("select style_id from style_table where style = '$style' ") as $row1){
    $style_id = $row1["style_id"];
  }
  
  echo "move_name: " . $move_name;
  //echo $move_id;
  
  
$query = "insert into move_table(style, move_name, url) values (:style, :move_name, :url)";
$query2 = "insert into user_move_table(user_id, move_id) values (:user_id, :move_id)";

$statement = $db->prepare($query);

$statement->bindParam(':style', $style_id);
$statement->bindParam(':move_name', $move_name);
$statement->bindParam(':url', $url);
  
  $statement1 = $db->prepare($query2);
  $statement1->bindParam(':user_id', $user_id);
  $statement1->bindParam(':move_id', $move_id);

$statement->execute();
  
  foreach ($db->query("select * from move_table where move_name = '$move_name' ") as $row2){
    $move_id = $row2["move_id"];
  }
  
  echo $move_id;
$statement1->execute();
echo "Successfully added to database<br/>";

  //insert into user_move_table(user_id, move_id) values (:user_id, :move_id)
} 
?>
</body>
</html>

