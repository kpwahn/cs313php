<?php
$favChar = "";
$favBook = "";
if (empty($_COOKIE["hasVisited"])) {
  //recieves what the user selected
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $favChar = $_POST["character"];
    $favBook = $_POST["book"];
    
  }
  
  //reads in the file
  $file = fopen("survey.txt", "r+");
  
  //Characters
  $snape = fgets($file);
  $hp = fgets($file);
  $fred = fgets($file);
  $dobby = fgets($file); 
  $hagrid = fgets($file);
  $mc = fgets($file);
  $dumbledore = fgets($file);
  
  //Books
  $sorcerer = fgets($file);
  $chamber = fgets($file);
  $prisioner = fgets($file);
  $goblet = fgets($file);
  $order = fgets($file);
  $prince = fgets($file);
  $death = fgets($file);
  
  //increments the given answer
  switch ($favChar) {
  case "0":  
  $snape+= 1;  
  break;
  case "1":
  $hp+= 1;
  break;
  case "2":
  $fred+= 1;
  break;
  case "3":
  $dobby+= 1;
  break;
  case "4":
  $hagrid+= 1;
  break;
  case "5":
  $mc+= 1;
  break;
  case "6":
  $dumbledore+= 1 ; 
  break;
  }
  
  switch ($favBook) {
  case "7":  
  $sorcerer+= 1;  
  break;
  case "8":
  $chamber+= 1;
  break;
  case "9":
  $prisioner+= 1;
  break;
  case "10":
  $goblet+= 1;
  break;
  case "11":
  $order+= 1;
  break;
  case "12":
  $prince+= 1;
  break;
  case "13":
  $death+= 1 ; 
  break;
  }
  
  //write back out to the file
  $file = fopen("survey.txt", "w");
  fwrite($file, "$snape" . ($favChar == 0 ? PHP_EOL : ""));
  fwrite($file, "$hp" . ($favChar == 1 ? PHP_EOL : ""));
  fwrite($file, "$fred" . ($favChar == 2 ? PHP_EOL : ""));
  fwrite($file, "$dobby" . ($favChar == 3 ? PHP_EOL : ""));
  fwrite($file, "$hagrid" . ($favChar == 4 ? PHP_EOL : ""));
  fwrite($file, "$mc" . ($favChar == 5 ? PHP_EOL : ""));
  fwrite($file, "$dumbledore" . ($favChar == 6 ? PHP_EOL : ""));
  fwrite($file, "$sorcerer" . ($favBook == 7 ? PHP_EOL : ""));
  fwrite($file, "$chamber" . ($favBook == 8 ? PHP_EOL : ""));
  fwrite($file, "$prisioner" . ($favBook == 9 ? PHP_EOL : ""));
  fwrite($file, "$goblet" . ($favBook == 10 ? PHP_EOL : ""));
  fwrite($file, "$order" . ($favBook == 11 ? PHP_EOL : ""));
  fwrite($file, "$prince" . ($favBook == 12 ? PHP_EOL : ""));
  fwrite($file, "$death" . ($favBook == 13 ? PHP_EOL : ""));
  fclose($file);

  //write the cookie so it won't fail again
  setcookie("hasVisited", "true", time() + 60*60*24);
} 
//display the contents of the file. a.k.a. the results
?>


<!DOCTYPE html>
<html>
<body>
<table border="1">
  <tr>
  <th colspan="2">Favorite Characters</th>
  </tr>
  <tr>
  <td>Severus Snape</td>
  <td><?php $file = fopen("survey.txt", "r+"); $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Harry Potter</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Fred Weasley</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Doby</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td> Rubeus Hagrid</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Minerva McGonagall </td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Albus Percival Wulfric Brian Dumbledore</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
</table>
  
  <table border="1">
  <tr>
  <th colspan="2">Favorite Books</th>
  </tr>
  <tr>
  <td>Sorcerer's Stone</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Chamber Of Secrets</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Prisioner Of Azkaban</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Goblet Of Fire</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Order Of The Pheonix</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Half-Blood Prince </td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
  <tr>
  <td>Deathly Hollows</td>
  <td><?php $snape = fgets($file); echo $snape; ?></td>
  </tr>
</table>
</body>
</html>

