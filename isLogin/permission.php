<?php  
$con = mysqli_connect('localhost', 'root', '','web');
if(!$con){
	die('Could not connect: '.mysqli_connect_errno());
}
session_start();

function get_user($username, $password){
$con = mysqli_connect('localhost', 'root', '','web');
if(!$con){
	die('Could not connect: '.mysqli_connect_errno());
}
	$sql = mysqli_query($con,"SELECT * FROM account WHERE username= '$username' AND password= '$password' ");
		
	if(mysqli_num_rows($sql) > 0){

		$row = mysqli_fetch_array($sql, MYSQLI_ASSOC );
 		if ($row['roleID'] === '1') {
			$_SESSION['accountID'] = $row['accountID'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['studentID'] = $row['studentID'];
			
 			header("location: ../isStudent/view.php");
 		} 
 		else if($row['roleID'] === '2'){
			$_SESSION['accountID'] = $row['accountID'];
			$_SESSION['username'] = $row['username'];
			
 			header("location:../index.php");
 		}
 		else if($row['roleID'] === '3'){
			$_SESSION['accountID'] = $row['accountID'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['tutorId'] = $row['tutorId'];
 			header("location:../isTutor/view.php");
		 }
	} else{
		echo "<script> alert('Please log in again')</script>";
	}
}
