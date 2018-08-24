<?php
  try
  {
    $bd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root'); 
  }
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }
  if (isset($_POST['submit']))
  {
    $stmt = $bd->prepare("INSERT INTO météo (ville, haut, bas) VALUES (:ville, :haut, :bas)");
      $stmt->bindParam(':ville', $_POST['ville']);
      $stmt->bindParam(':haut', $_POST['max']);
      $stmt->bindParam(':bas', $_POST['min']);
        
      $stmt->execute();
      header("Location: index.php");
  }
?>