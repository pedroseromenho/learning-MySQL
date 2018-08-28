<?php
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root'); 
  }
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }
  if (isset($_POST['submit']))
  {
    $stmt = $db->prepare("INSERT INTO hiking (id, name_r, difficulty, distance, duration, height_difference) VALUES (:id, :name_r, :difficulty, :distance, :duration, :height_difference)");
      $stmt->bindParam(':id', $_POST['id']);
      $stmt->bindParam(':name_r', $_POST['name']);
      $stmt->bindParam(':difficulty', $_POST['difficulty']);
      $stmt->bindParam(':distance', $_POST['distance']);
      $stmt->bindParam(':duration', $_POST['duration']);
      $stmt->bindParam(':height_difference', $_POST['height_difference']);
        
      $stmt->execute();
      // header("Location: read.php");

      session_start();
      if(true){
        $_SESSION['success'] = 1;
        header("Location: read.php");
      }
  }
?>