<?php
include("connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM hiking WHERE id=:id";
$query = $db->prepare($sql);
$query->execute(array(':id' => $id));

header("Location:read.php");
?>
