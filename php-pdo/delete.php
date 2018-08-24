<?php
  include('connect.php');
  $edittable=$_POST['selector'];
  $N = count($edittable);
  for($i=0; $i < $N; $i++)
  {
    $result = $bd->prepare("DELETE FROM météo WHERE ville = :ville");
    $result->bindParam(':ville', $edittable[$i]);
    $result->execute();
  }
  header("location: index.php");
  mysql_close($con);
?>