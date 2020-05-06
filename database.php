<?php
$hostname = 'localhost';
$username = 'root'; //user and pass của phpmyadmin
$password = '';
$dbname = 'web'; // name of database
function query ($sql)

{	
	global $hostname;
	global $username;
	global $password;
	global $dbname;
	$conn = new mysqli($hostname, $username, $password, $dbname);
	
	if($conn -> connect_error)
	{
		//nếu như kết nối ko thành công thì dừng chương trình
		echo "Connection Fail";
		//dừng chương trình
		die ($conn -> connect_error);
	}
	
	//chạy câu lệnh truy vấn lấy kết quả
	$result = $conn->query($sql);
	if(!$result)
	{
		//Nếu không có kết quả ($result=null) thì dừng chương trình
		echo "SQL execution fail";
		die ($conn -> error);
	}
	//Lấy tất cả các bản ghi từ kết quả
	$rows = mysqli_fetch_all($result);
	return $rows;

	
}
?>

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
		


		$sql = "SELECT * FROM registercourse";
		$stmt = $pdo->prepare($sql);
		//Thiết lập kiểu dữ liệu trả về
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$resultSet = $stmt->fetchAll();
