<?php 
	$sever = 'localhost';
	$server_user = 'root';
	$database = 'web';
	$server_pass = '';
	$connect = mysqli_connect($sever, $server_user, $server_pass, $database);
	require("../database.php");
	if(isset($_GET["id"]))
	{	
		$id = $_GET["id"];
		$sql = "DELETE FROM `file` WHERE fileId=" . $id;
		 //fucking awesome !!! I can do it :v
		mysqli_query($connect,$sql);
		header("Location: view.php ");
	}
?>