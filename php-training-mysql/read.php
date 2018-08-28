<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  <?php
    session_start();
    if(isset($_SESSION['success'])){ ?>
      <div class="success"><p>Success! :-)</p></div>
      <?php unset($_SESSION['success']);}?>
    <h1>Liste des randonnées</h1>
    <a href="create.php">Create New</a>
    <br><br>
    <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Difficulty</th>
        <th>Distance</th>
        <th>Duration</th>
        <th>Height Difference</th>
      </tr>
    </thead>
    <tbody>
     <?php include ('connect.php');
        $result = $db->query('SELECT * FROM hiking');
          while ($donnees = $result->fetch())
        {
     ?>
        <tr>
          <input name="id" value="<?=$donnees["id"]?>" type="hidden">
          <td><input name="name" value="<?=$donnees["name_r"]?>"></td>
          <td><input name="distance" value="<?=$donnees["distance"]?> km"></td>
          <td><input name="difficulty" value="<?=$donnees["difficulty"]?>"></td>
          <td><input name="duration" value="<?=$donnees["duration"]?>"></td>
          <td><input name="height_difference" value="<?=$donnees["height_difference"]?>m"></td>
          <td><a href="update.php?id=<?=$donnees["id"]?>">Edit</a></td>
          <td>/</td>
          <td><a href="delete.php?id=<?=$donnees["id"]?>" name="selector[]">Delete</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>
