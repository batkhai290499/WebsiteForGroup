<?php  
	// $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=GWCourses', 'postgres', '');
	// echo "done";

	$db = parse_url(getenv("DATABASE_URL"));
	$pdo = new PDO("pgsql:" . sprintf(
		"host=%s;port=%s;user=%s;password=%s;dbname=%s",
		$db["host"],
		$db["port"],
		$db["user"],
		$db["pass"],
		ltrim($db["path"], "/")
	));
	


	$stmt = $pdo->prepare($sql);
	//Thiết lập kiểu dữ liệu trả về
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
			
?>
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
