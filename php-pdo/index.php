<!DOCTYPE html>
<html>
<head>
  <title>Météo Table</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form method="post" action="delete.php">
  <h3>Insérér la température d'une ville:</h3>
    <input name="ville" placeholder="Ville">
    <input name="max" placeholder="max">
    <input name="min" placeholder="min">
    <button name="submit" type="submit">Add</button>
  </form>
  <form action="delete.php" method="post">
    <table>
      <thead>
        <tr>
          <th>Ville</th>
          <th>MAX</th>
          <th>MIN</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          include('connect.php');
          $result = $bd->query('SELECT * FROM météo');
            while ($donnees = $result->fetch())
            { 
        ?>
        <tr>
          <td><input name="ville" value="<?=$donnees["ville"]?>"></td>
          <td><input name="haut" value="<?=$donnees["haut"]. '°'?>"></td>
          <td><input name="bas" value="<?=$donnees["bas"]. '°'?>"></td>
          <td><input name="selector[]" type="checkbox" value="<?php echo $donnees["ville"]; ?>"></td>
        </tr>
        <?php } ?>
      </tbody>
      <th></th>
      <th></th>
      <th></th>
      <th><input type="submit" value="delete"/></th>
    </table>
  </form>
</body>
</html>