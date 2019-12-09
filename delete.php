<?php/*
$mysql = new mysqli('localhost','root','','lb1');

$id = $_POST['deleteuserid'];
$mysql -> query("DELETE FROM users WHERE id = '$id'");
$mysql->close();
header("Location: index.php");*/
?>

<?php
	
	$json = file_get_contents('php://input');
	$data = json_decode($json);

	if(!$data){
 		die('No Post Variables');
	}
	$link = mysqli_connect('localhost','root','','lb1')
		or die("Error" . mysqli_error($link));
	$id = $data->id;
	echo $id;
	$query = "DELETE FROM users WHERE id = $id";
	$result = mysqli_query($link, $query) 
		or die("Ошибка " . mysqli_error($link));	
	
	mysqli_close($link);
		
	?>