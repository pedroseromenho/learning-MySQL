<?php
include("connect.php");
if(isset($_POST['edit']))
{ 
	$id = $_POST['id'];
    $name = $_POST['up_name'];
    $difficulty=$_POST['up_difficulty'];
    $distance=$_POST['up_distance'];
	$duration=$_POST['up_duration'];
	$height_difference=$_POST['up_height_difference'];
	 
if(empty($name) || empty($difficulty) || empty($distance) || empty($duration) || empty($height_difference)) {     
    if(empty($name)) {
        echo "<font color='red'>This field is empty.</font><br/>";
    }
    if(empty($difficulty)) {
        echo "<font color='red'>This field is empty.</font><br/>";
    } 
    if(empty($distance)) {
        echo "<font color='red'>This field is empty.</font><br/>";
	}
	if(empty($duration)) {
        echo "<font color='red'>This field is empty.</font><br/>";
    }
    if(empty($height_difference)) {
        echo "<font color='red'>This field is empty.</font><br/>";
    }       
    } else {    
        $sql = "UPDATE hiking SET name_r=:name_r, difficulty=:difficulty, distance=:distance, duration=:duration, height_difference=:height_difference WHERE id=:id";
        $query = $db->prepare($sql);
                
		$query->bindparam(':id', $id);
		$query->bindparam(':name_r', $name);
        $query->bindparam(':difficulty', $difficulty);
        $query->bindparam(':distance', $distance);
		$query->bindparam(':duration', $duration);
		$query->bindparam(':height_difference', $height_difference);
		

		$result = $query->execute();
		
        header("Location: read.php");
    }
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM hiking WHERE id=:id";
$query = $db->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $name = $row['name_r'];
    $difficulty = $row['difficulty'];
	$distance = $row['distance'];
	$duration = $row['duration'];
    $height_difference = $row['height_difference'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="update.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="up_name" value="<?php echo $name;?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="up_difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="up_distance" value="<?php echo $distance;?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="up_duration" value="<?php echo $duration;?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="up_height_difference" value="<?php echo $height_difference;?>">
		</div>
		<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
		<button type="submit" name="edit">Envoyer</button>
	</form>
</body>
</html>
