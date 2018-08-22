<?php
try
{
  // Connexion to data base
	$bd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root');

  // Insert data on data base

  // First prepare statement with param as var from html form input.
  $stmt = $bd->prepare("INSERT INTO météo (ville, haut, 
  bas) 
  VALUES (:ville, :haut, :bas)");
      $stmt->bindParam(':ville', $ville);
      $stmt->bindParam(':haut', $max);
      $stmt->bindParam(':bas', $min);
  

      $ville = $_POST['ville'];
      $max = $_POST['max'];
      $min = $_POST['min'];
      $stmt->execute();
//End

}

// In case of error
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Select elements from data base
$resultat = $bd->query('SELECT * FROM météo');
$donnees = $resultat->fetch();


echo "<table border='1'>
<tr>
<th>Ville</th>
<th>MAX</th>
<th>MIN</th>
</tr>";

// Display data as html table
while ($donnees = $resultat->fetch())
{
  // print_r($donnees);
  // echo "ville: " . $donnees["ville"]. " - max: " . $donnees["haut"]. " / min: " . $donnees["bas"]. "<br>";
  echo "<tr>";
  echo "<td>" . $donnees["ville"] . "</td>";
  echo "<td>" . $donnees["haut"] . "°</td>";
  echo "<td>" . $donnees["bas"] . "°</td>";
  echo "</tr>";
}
echo "</table>";

// End of request
$resultat->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <br />
  <form action="index.php" method="post">
      <legend>Ajouter à base de données:</legend><br>
      Ville:<br>
      <input type="text" name="ville"><br><br>
      Température maximale:<br>
      <input type="text" name="max"><br><br>
      Température minimale:<br>
      <input type="text" name="min"><br><br>
      <input type="submit" value="Submit">
  </form>
</body>
</html>