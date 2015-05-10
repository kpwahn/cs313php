<?php
$fav = "";
if (empty($_COOKIE["hasVisited"])) {
  //recieves what the user selected
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fav = $_POST["character"];
  }
  
  //reads in the file
  $file = fopen("survey.txt", "r+");
  $nl = "";
  
  $snape = fgets($file);
  $hp = fgets($file);
  $fred = fgets($file);
  $dobby = fgets($file); 
  $hagrid = fgets($file);
  $mc = fgets($file);
  $dumbledore = fgets($file);

  //increments the given answer
  switch ($fav) {
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
  
  //write back out to the file
  $file = fopen("survey.txt", "w");
  /*
  if ($fav == 0) {
    fwrite($file, "$snape" . PHP_EOL);
  } else {
    fwrite($file, "$snape");
  }*/
  fwrite($file, "$snape" . ($fav == 0 ? PHP_EOL : ""));
  fwrite($file, "$hp" . ($fav == 1 ? PHP_EOL : ""));
  fwrite($file, "$fred" . ($fav == 2 ? PHP_EOL : ""));
  fwrite($file, "$dobby" . ($fav == 3 ? PHP_EOL : ""));
  fwrite($file, "$hagrid" . ($fav == 4 ? PHP_EOL : ""));
  fwrite($file, "$mc" . ($fav == 5 ? PHP_EOL : ""));
  fwrite($file, "$dumbledore" . ($fav == 6 ? PHP_EOL : ""));
  fclose($file);

  //write the cookie so it won't fail again
  setcookie("hasVisited", "true", time() + 60*60*24);
} 
//display the contents of the file. a.k.a. the results
?>


<!DOCTYPE html>
<html>
<body>
<table>
  <tr>
  <th>Favorite Characters</th>
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
</body>
</html>

